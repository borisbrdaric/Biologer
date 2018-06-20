<template>
  <b-message :title="newAnnouncement.title" :type="typeClass" @close="markAsRead" v-if="newAnnouncement" class="shadow">
    {{ newAnnouncement.message }}
  </b-message>
</template>

<script>
export default {
  name: 'nzAnnouncement',

  props: {
    announcement: Object
  },

  data() {
    return {
      newAnnouncement: this.announcement
    }
  },

  computed: {
    typeClass() {
      if (!this.newAnnouncement) return null

      return `is-${this.newAnnouncement.type}`
    }
  },

  created() {
    this.$root.$on('announcement-read', this.handleReadAnnouncement)
  },

  beforeDestroy() {
    this.$root.$off('announcement-read', this.handleReadAnnouncement)
  },

  methods: {
    markAsRead() {
      axios.post('/api/read-announcements', {
        announcement_id: this.newAnnouncement.id,
      }).then(() => {
        this.$root.$emit('announcement-read', this.newAnnouncement)
      });
    },

    handleReadAnnouncement(announcement) {
      if (_.get(this.newAnnouncement, 'id') === _.get(announcement, 'id')) {
        this.newAnnouncement = null;
      }
    }
  }
}
</script>

<style>

</style>
