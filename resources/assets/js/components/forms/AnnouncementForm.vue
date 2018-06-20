<template>
    <div class="announcement-form">
        <form @submit.prevent="submit">
            <b-field :label="trans('labels.announcements.title')" class="is-required">
                <b-input v-model="formData.title" autofocus />
            </b-field>

            <b-field :label="trans('labels.announcements.message')" class="is-required">
                <b-input type="textarea" v-model="formData.message" />
            </b-field>

            <div class="columns">
                <div class="column">
                    <b-field :label="trans('labels.announcements.published_at')" class="is-required">
                        <nz-datetime-picker v-model="formData.published_at" />
                    </b-field>
                </div>

                <div class="column">
                    <b-field :label="trans('labels.announcements.expires_at')" class="is-required">
                        <nz-datetime-picker v-model="formData.expires_at" />
                    </b-field>
                </div>

                <div class="column">
                    <b-field :label="trans('labels.announcements.type')" class="is-required">
                        <b-select v-model="formData.type">
                            <option v-for="type in types" :value="type">{{ trans(`labels.announcements.types.${type}`) }}</option>
                        </b-select>
                    </b-field>
                </div>
            </div>

            <hr>

            <button type="submit" class="button is-primary">{{ trans('buttons.save') }}</button>

            <a :href="cancelUrl" class="button">{{ trans('buttons.cancel') }}</a>
        </form>
    </div>
</template>

<script>
import Form from 'form-backend-validation';

export default {
    name: 'nzAnnouncementForm',

    props: {
        action: String,
        method: {
            type: String,
            default: 'post'
        },
        types: {
            type: Array,
            default: () => []
        },
        announcement: {
            type: Object,
            default() {
                return {
                    title: '',
                    message: '',
                    published_at: moment().format('YYYY-MM-DD HH:mm:ss'),
                    expires_at: null,
                    type: null,
                };
            }
        },
        redirectUrl: String,
        cancelUrl: String
    },

    data() {
        const publishedAt = moment(this.announcement.published_at);
        const expiresAt = moment(this.announcement.expires_at);

        return {
            formData: {
                title: this.announcement.title,
                message: this.announcement.message,
                published_at: publishedAt.isValid() ? publishedAt.toDate() : null,
                expires_at: expiresAt.isValid() ? expiresAt.toDate() : null,
                type: this.announcement.type,
            },
            form: new Form({}, {
                resetOnSuccess: false
            })
        };
    },

    methods: {
        submit() {
            if (this.form.processing) return;

            const publishedAt = moment(this.formData.published_at);
            const expiresAt = moment(this.formData.expires_at);

            let formData = {
                title: this.formData.title,
                message: this.formData.message,
                published_at: publishedAt.isValid() ? publishedAt.format('YYYY-MM-DD HH:mm:ss') : null,
                expires_at: expiresAt.isValid() ? expiresAt.format('YYYY-MM-DD HH:mm:ss') : null,
                type: this.formData.type,
            };

            this.form.withData(formData)[this.method.toLowerCase()](this.action)
                .then(this.onSuccessfulSubmit)
                .catch(this.onFailedSubmit);
        },

        /**
         * Handle successful form submit.
         */
        onSuccessfulSubmit() {
            this.form.processing = true

            this.$toast.open({
                message: this.trans('Saved successfully'),
                type: 'is-success'
            });

            // We want to wait a bit before we send the user to redirect route
            // so we can show the message that the action was successful.
            setTimeout(() => {
                this.form.processing = false;

                window.location.href = this.redirectUrl;
            }, 500);
        },

        /**
         * Handle failed form submit.
         *
         * @param {Error} error
         */
        onFailedSubmit(error) {
            this.$toast.open({
                duration: 2500,
                message: _.get(error, 'response.data.message', error.message),
                type: 'is-danger'
            });
        },
    }
}
</script>
