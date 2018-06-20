<?php

namespace App;

use App\Events\NewAnnouncement;

use Illuminate\Support\Carbon;

class Announcement extends Model
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'reads' => '[]',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'creator_id' => 'integer',
        'reads' => 'collection',
        'expires_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['is_read'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['reads', 'creator_id'];

    /**
     * The user that created the announcements.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Scope the query to get only unexpired announcements.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrent($query)
    {
        return $query->where('expires_at', '>', Carbon::now());
    }

    /**
     * Accessor to check if user has read the announcement.
     *
     * @return bool
     */
    public function getIsReadAttribute()
    {
        return $this->isRead();
    }

    /**
     * Publish an announcements.
     *
     * @param  array  $data
     * @param  \App\User  $creator
     * @return self
     */
    public static function publish(array $data, User $creator)
    {
        return tap(static::create(array_merge($data, [
            'creator_id' => $creator->id,
        ])), function ($announcement) {
            NewAnnouncement::broadcast($announcement->markAsRead())->toOthers();
        });
    }

    /**
     * Mark the announcement as read by current user.
     *
     * @return self
     */
    public function markAsRead()
    {
        $this->reads = $this->reads->push(auth()->id())->unique()->values();

        return tap($this)->save();
    }

    /**
     * Check if announcement has been read by given user.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function isReadBy(User $user)
    {
        return $this->reads->contains($user->id);
    }

    /**
     * Check if announcement has been read by current user.
     *
     * @return bool
     */
    public function isRead()
    {
        return $this->isReadBy(auth()->user());
    }

    /**
     * Check if announcement has been read by current user.
     *
     * @return bool
     */
    public function isNotRead()
    {
        return ! $this->isRead();
    }

    /**
     * Check if announcement has expired.
     *
     * @return bool
     */
    public function hasExpired()
    {
        return $this->expires_at->lt(Carbon::now());
    }
}
