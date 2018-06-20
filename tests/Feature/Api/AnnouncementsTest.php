<?php

namespace Tests\Feature\Api;

use App\User;
use Tests\TestCase;
use App\Announcement;
use Laravel\Passport\Passport;
use Illuminate\Support\Carbon;
use App\Events\NewAnnouncement;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnnouncementsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->seed('RolesTableSeeder');
    }

    /** @test */
    public function guest_cannot_publish_announcements()
    {
        $this->postJson('/api/announcements', [
            'body' => [
                app()->getLocale() => 'Announcement',
            ],
            'action_text' => [
                app()->getLocale() => 'Read more',
            ],
            'action_url' => 'https://example.com',
        ])->assertUnauthorized();
    }

    /** @test */
    public function regular_users_cannot_publish_announcements()
    {
        Passport::actingAs(factory(User::class)->create());

        $this->postJson('/api/announcements', [
            'body' => [
                app()->getLocale() => 'Announcement',
            ],
            'action_text' => [
                app()->getLocale() => 'Read more',
            ],
            'action_url' => 'https://example.com',
        ])->assertForbidden();
    }

    /** @test */
    public function admin_can_publish_announcement()
    {
        Event::fake();
        $announcementsCount = Announcement::count();
        $creator = factory(User::class)->create();
        $creator->assignRoles('admin');

        Passport::actingAs($creator);

        $this->postJson('/api/announcements', [
            'body' => [
                app()->getLocale() => 'Announcement',
            ],
            'action_text' => [
                app()->getLocale() => 'Read more',
            ],
            'action_url' => 'https://example.com',
        ])->assertCreated()->assertJson(['data' => [
            'body' => [
                app()->getLocale() => 'Announcement',
            ],
            'action_text' => [
                app()->getLocale() => 'Read more',
            ],
            'action_url' => 'https://example.com',
        ]]);

        Announcement::assertCount($announcementsCount + 1);
        $announcement = Announcement::latest()->first();

        $this->assertTrue($announcement->creator->is($creator));
        $this->assertFalse($announcement->isReadBy(factory(User::class)->create()));

        Event::assertDispatched(NewAnnouncement::class, function ($event) use ($announcement) {
            return $event->announcement->is($announcement);
        });
    }


}
