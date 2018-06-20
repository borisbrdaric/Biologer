<template>
<div class="sidebar" :class="{'is-active': active}">
    <div class="sidebar-header">
        <div class="buttons has-addons">
            <button
                type="button"
                class="button"
                :class="[activeTab === 'notifications' ? 'is-link' : '']"
                @click="activeTab = 'notifications'">
                {{ trans('buttons.notifications') }}
            </button>

            <button
                type="button"
                class="button"
                :class="{'is-link': activeTab === 'announcements', 'badge is-badge-danger': hasUnreadAnnouncements}"
                data-badge=""
                @click="activeTab = 'announcements'"
            >
                {{ trans('buttons.announcements') }}
            </button>
        </div>
    </div>
    <div class="sidebar-body">
        <template v-if="activeTab === 'announcements'">
            <template v-if="currentAnnouncements.length">
                <b-collapse
                    class="sidebar-block"
                    v-for="announcement in currentAnnouncements"
                    :key="announcement.id"
                    :open="false"
                >
                    <div slot="trigger" @click="markAnnouncementAsRead(announcement)">
                        <span
                            class="pull-right is-clickable"
                            v-if="!announcement.is_read"
                        >
                            <b-icon icon="circle" size="is-small" class="has-text-info"/>
                        </span>

                        <span>{{ announcement.title }}</span>
                    </div>

                    <hr>

                    {{ announcement.message }}
                </b-collapse>
            </template>

            <div class="sidebar-block is-fullheight" v-else>
                There are no new announcements at the moment.
            </div>
        </template>
        <template v-else>
            <template v-if="currentNotifications.length">
                <div class="sidebar-block"
                    v-for="notification in currentNotifications">
                    Dummy notification
                </div>
            </template>

            <div class="sidebar-block is-fullheight" v-else>
                You don't have new notifications at the moment.
            </div>
        </template>
    </div>

    <footer class="sidebar-footer">
        <button type="button" class="button is-text" @click="markAllAsRead">Mark all as read</button>

        <button type="button" class="button" @click="hide">{{ trans('buttons.close') }}</button>
    </footer>
</div>
</template>

<script>
export default {
  name: 'nzSidebar',

  props: {
    active: Boolean,

    announcements: {
      type: Array,
      default: () => []
    },

    notifications: {
      type: Array,
      default: () => []
    }
  },

  data() {
    return {
      activeTab: 'notifications',
      currentAnnouncements: this.announcements,
      currentNotifications: this.notifications,
    };
  },

  computed: {
    unreadAnnouncements() {
      return this.currentAnnouncements.filter((announcement) => !announcement.is_read)
    },

    hasUnreadAnnouncements() {
        return this.unreadAnnouncements.length > 0
    }
  },

  created () {
    if (typeof window !== 'undefined') {
      document.addEventListener('keyup', this.keyPress)
    }

    this.$root.$on('announcement-read', this.handleReadAnnouncement)
  },

  beforeDestroy() {
    if (typeof window !== 'undefined') {
      document.removeEventListener('keyup', this.keyPress)
    }
    this.$root.$off('announcement-read', this.handleReadAnnouncement)
  },

  methods: {
    hide() {
      this.$emit('close');
    },

    keyPress(event) {
        // Esc key
      if (event.keyCode === 27) this.hide();
    },

    markAllNotificationsAsRead() {

    },

    markAllAnnouncementsAsRead() {
      if (!this.currentAnnouncements.length) return

      return axios.post(route('api.read-announcements-batch.store'), {
        announcement_ids: this.unreadAnnouncements.map((unreadAnnouncement) => unreadAnnouncement.id)
      }).then(() => {
        this.unreadAnnouncements.forEach((announcement) => {
            announcement.is_read = true

            this.$root.$emit('announcement-read', announcement);
        })
      });
    },

    markAllAsRead() {
      if (this.activeTab === 'notifications') {
          return this.markAllNotificationsAsRead()
      }

      return this.markAllAnnouncementsAsRead()
    },

    markAnnouncementAsRead(announcement) {
      if (announcement.is_read) return;

      return axios.post(route('api.read-announcements.store'), {
          announcement_id: announcement.id
      }).then(() => {
          announcement.is_read = true;

          this.$root.$emit(
            'announcement-read',
            this.currentAnnouncements.indexOf(announcement) === 0 ? announcement : null
          );
      });
    },

    handleReadAnnouncement(announcement) {
      const readAnnouncement = _.find(this.currentAnnouncements, (currentAnnouncement) => {
        return currentAnnouncement.id === _.get(announcement, 'id')
      })

      if (readAnnouncement) {
        readAnnouncement.is_read = true
      }
    }
  }
}
</script>
