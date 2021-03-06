<template>
	<b-field v-if="!haveImage" :message="error || null" :type="error ? 'is-danger' : null" expanded>
		<b-upload @input="onInput" drag-drop type="is-fullwidth">
			<section class="section">
				<div class="has-text-centered">
					<div>
						<b-icon
							icon="upload"
							size="is-medium">
						</b-icon>
					</div>

					<progress class="progress is-primary is-small" :value="progress" max="100" v-if="uploading">{{ progress }}%</progress>

					<div v-else>{{ text }}</div>
				</div>
			</section>
		</b-upload>
	</b-field>

	<div class="card" v-else>
		<div class="card-image">
			<figure class="image has-magnifier is-4by3" @click="showModal = true">
				<img :src="thumbnailUrl" alt="Uploaded photo">
				<div class="image-magnifier">
					<b-icon icon="expand" size="is-medium" />
				</div>
			</figure>
	  </div>

		<footer class="card-footer" v-if="haveImage">
			<div class="card-footer-item flex-col">
				<div class="mb-4 w-full flex justify-between">
					<button type="button" class="button is-outlined is-small mr-2" @click="openCropModal" @close="closeCropModal"><b-icon icon="crop" /></button>
					<button type="button" class="delete is-danger is-medium" @click="remove" v-if="image.path"></button>
				</div>

				<div class="w-full">
					<b-select :value="image.license" @input="handleLicenseChanged" expanded>
						<option :value="null">{{ trans('labels.field_observations.default') }}</option>
						<option v-for="(label, value) in licenses" :value="value" v-text="label"></option>
					</b-select>
				</div>
			</div>
		</footer>

		<nz-image-crop-modal :active.sync="showCropModal" :crop.sync="image.crop" :image-url="image.url" v-if="haveImage"/>

		<nz-image-modal :items="[thumbnailUrl]" v-if="showModal" @close="showModal = false"/>
	</div>
</template>

<script>
export default {
	name: 'nzPhotoUpload',

  props: {
		imageUrl: {
			type: String,
			default: null
		},
		imagePath: {
			type: String,
			default: null
		},
		imageLicense: {
			type: [Number, String],
			default: null
		},
		licenses: {
			type: Object,
			required: true
		},
		text: String
	},

  data() {
    return {
    	image: {
				url: this.imageUrl,
				path: this.imagePath,
				crop: null,
				license: this.imageLicense
			},
			croppedImageUrl: null,
			reader: null,
			uploading: false,
			progress: 0,
			hasExisting: !!this.imageUrl,
			error: null,
			showCropModal: false,
			showModal: false
    };
  },

	watch: {
		'image.crop': function (value) {
			this.$emit('cropped', this.image);

			if (!value) {
				this.croppedImageUrl = null;
				return;
			}

			this.cropThumbnail(value);
		}
	},

	computed: {
		haveImage() {
			return !!this.image.url;
		},

		thumbnailUrl() {
			return this.croppedImageUrl || this.image.url;
		}
	},

	created() {
		this.initFileReader();
	},

	methods: {
		initFileReader() {
			this.reader = new FileReader();

			this.reader.addEventListener('load', () => {
				this.image.url = this.reader.result;
			});
		},

		selectImage() {
			this.$refs.input.click();
		},

		onInput(files) {
			this.error = null;

			let file = files[0];

			if (!file) {
				return;
			}

			this.upload(file)
		},

		upload(file) {
			this.uploading = true
			return axios.post(route('api.photo-uploads.store'), this.makeForm(file), {
				headers: {
					'Content-Type': 'multipart/form-data',
					Accept: 'application/json'
				},
				onUploadProgress: progressEvent => {
				   this.progress = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
				}
			}).then(response => {
				this.image.path = response.data.file;
				this.image.exif = response.data.exif;
				this.image.license = null;
				this.uploading = false;
				this.progress = 0;

				this.$emit('uploaded', this.image);

				this.reader.readAsDataURL(file)
			}).catch(this.handleError);
		},

		makeForm(file) {
			let form = new FormData();

			form.append('file', file);

			return form;
		},

		remove() {
			if (this.hasExisting) {
				this.hasExisting = false;
				return this.clearPhoto();
			}

			axios.delete(route('api.photo-uploads.destroy', this.image.path)).then(() => {
				this.clearPhoto();
			})
		},

		clearPhoto() {
			this.$emit('removed', this.image);

			this.image.path = null;
			this.image.url = null;
			this.image.crop = null;
			this.image.license = null;
			this.croppedImageUrl = null;
		},

		handleError(error) {
			this.uploading = false;
			this.progress = 0;
			this.image.url = null
			// Clear the input so we can select the same image if needed.
			this.$el.querySelector('input[type="file"]').value = '';

			if (!error.response) {
				return this.$toast.open({
					duration: 5000,
					message: error.message,
					position: 'is-top',
					type: 'is-danger'
				})
			}

			this.error = error.response.data.errors.file[0] || this.trans('Error');
		},

		openCropModal() {
			this.showCropModal = true;
		},

		closeCropModal() {
			this.showCropModal = false;
		},

		cropThumbnail(crop) {
			// Create image
			const image = document.createElement('img');
			image.src = this.image.url;

			// Draw canvas
			const canvas = document.createElement('canvas');

  		canvas.setAttribute('width', crop.width);
  		canvas.setAttribute('height', crop.height);

  		const context = canvas.getContext('2d');
  		context.drawImage(image, -crop.x, -crop.y);

			this.croppedImageUrl = canvas.toDataURL();
		},

		/**
		 * Handle license change.
		 *
		 * @param {String|Number} license
		 */
		handleLicenseChanged(license) {
			this.image.license = license;
			this.$emit('license-changed', license);
		}
	}
}
</script>
