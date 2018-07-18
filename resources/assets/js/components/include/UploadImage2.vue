<template>
	<div>
		<span v-if="!avatar">
			<input type="file" class="form-control hidden" id="fileInput" v-on:change="onImageChange" ref="avatar" accept="image/*">
			<img src="public/admin/img/no-image.png" class="w100"><br><br>
			<a class="btn btn-sm btn-info" onclick="document.getElementById('fileInput').click()">
				<i class="fa fa-upload"> Chọn ảnh</i>
			</a>
		</span>

		<span v-else>
			<img :src="avatar" class="w100"><br><br>
			<a class="btn btn-sm btn-danger" v-on:click="remove">
				<i class="fa fa-close"> Xóa</i>
			</a>
		</span>
	</div>
</template>

<script>
	export default {
		props: ['avatar'],
		computed: {
			image() {
				return this.avatar
			}
		},
		methods : {
			onImageChange(e) {
				if(e.target.files && e.target.files[0]) {
					var reader = new FileReader()
					reader.onload = (e) => {
						this.preview = e.target.result
					}
					reader.readAsDataURL(e.target.files[0])

					this.image = this.$refs.avatar.files[0]

					this.$emit('imageUpload', this.image)
				}
			},
			remove() {
				this.image = ''
				this.preview = ''
			}
		}
	}
</script>