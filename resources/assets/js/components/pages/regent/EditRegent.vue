<template>
	<div>
		<section class="content-header">
			<h1>
				Cập nhật
				<small>Ban quản trị</small>
			</h1>
			<ol class="breadcrumb">
				<li><router-link :to="{name : 'home'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
				<li><router-link :to="{name : 'listRegent'}">Ban quản trị</router-link></li>
				<li class="active">Cập nhật</li>
			</ol>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">

						<form role="form">
							<div class="box-body">
								<div class="row">
									<div class="col-md-2 col-xs-12">
										<div class="form-group">
											<center>
												<label>Avatar</label><br>

												<span v-if="!data_detail.avatar">
													<input type="file" class="form-control hidden" id="fileInput" v-on:change="onImageChange" ref="avatar" accept="image/*">
													<img src="public/admin/img/no-image.png" class="w100"><br><br>
													<a class="btn btn-sm btn-info" onclick="document.getElementById('fileInput').click()">
														<i class="fa fa-upload"> Chọn ảnh</i>
													</a>
												</span>
												
												<span v-else>
													<img :src="preview" class="w100"><br><br>
													<a class="btn btn-sm btn-danger" v-on:click="remove">
														<i class="fa fa-close"> Xóa</i>
													</a>
												</span>
												<div class="checkbox">
													<label>
														<input type="checkbox" v-model="data_detail.status"> Kích hoạt
													</label>
												</div>
											</center>
										</div>
									</div>
									<div class="col-md-5 col-xs-12 col-sm-6">
										
										<div class="form-group">
											<label>Email <font color="red">*</font></label>
											<input type="email" class="form-control" placeholder="email" v-model="data_detail.email" readonly="">
										</div>
										<div class="form-group">
											<label>Password <font color="red">*</font></label>
											<input type="password" class="form-control" placeholder="password" v-model="password">
										</div>
										<div class="form-group">
											<label>Role <font color="red">*</font></label>
											<select v-model="data_detail.role" class="form-control" name="role" v-validate="'required'">
												<option value="" selected disabled>chọn</option>
												<option value="admin">admin</option>
												<option value="mod">mod</option>
											</select>
											<font color="red">{{ errors.first('role') }}</font>
										</div>
									</div>
									<div class="col-md-5 col-xs-12 col-sm-6">
										<div class="form-group">
											<label>Name <font color="red">*</font></label>
											<input type="text" class="form-control" placeholder="username" v-validate="'required'" name="name" v-model="data_detail.name">
											<font color="red">{{ errors.first('name') }}</font>
										</div>
										<div class="form-group">
											<label>Phone <font color="red">*</font></label>
											<input type="text" class="form-control" placeholder="phone" v-validate="'required'" name="phone" v-model="data_detail.phone">
											<font color="red">{{ errors.first('phone') }}</font>
										</div>
										<div class="form-group">
											<label>Address <font color="red">*</font></label>
											<input type="text" class="form-control" placeholder="address" v-validate="'required'" name="address" v-model="data_detail.address">
											<font color="red">{{ errors.first('address') }}</font>
										</div>

									</div>
								</div>
							</div>
							<div class="box-footer">
								<center>
									<a class="btn btn-success" v-on:click="submit"><i class="fa fa-plus"></i> Cập nhật</a>
									<router-link :to="{name : 'listRegent'}" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách</router-link>
								</center>
							</div>
						</form>
					</div>

				</div>
				
			</div>
		</section>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				data_detail : {},
				password : '',
				preview : '',
			}
		},
		created() {
			axios.get(BASE_URL + 'admin/regent/getDetail', {
				params: {id : this.$route.params.id}
			}).then(res => {
				this.data_detail = res.data
				this.preview = res.data.avatar
			}).catch(e => {
				console.log(e)
			})
		},
		methods: {
			submit() {
				this.$validator.validate().then(result => {
					if (!result) {
						this.$notify({
							group: 'foo',
							title: 'Thông báo',
							text: 'Bạn cần nhập đủ thông tin bắt buộc !',
							type: 'warn',
						})

					} else {
						let formData = new FormData()
						formData.append('id', this.data_detail.id)
						formData.append('image', this.data_detail.avatar)
						formData.append('name', this.data_detail.name)
						formData.append('password', this.password)
						formData.append('phone', this.data_detail.phone)
						formData.append('address', this.data_detail.address)
						formData.append('role', this.data_detail.role)
						formData.append('status', this.data_detail.status ? 1 : 0)

						axios.post(BASE_URL + 'admin/regent/update', formData,
							{
								headers: {
									'Content-Type': 'multipart/form-data'
								}
							}
						).then(res => {
							if(res.data == 'OK') {
								this.$notify({
									group: 'foo',
									title: 'Thông báo',
									text: 'Cập nhật thành công !',
									type: 'success',
								})
								this.$router.push({name: 'listRegent'}) 
							} else {
								this.$notify({
									group: 'foo',
									title: 'Thông báo',
									text: 'Thất bại ! Đã có lỗi xảy ra !',
									type: 'warn',
								})
							}

						}).catch(error => {
							console.log(error)
						})
					}
				})
			},
			onImageChange(e) {
				if(e.target.files && e.target.files[0]) {
					var reader = new FileReader()
					reader.onload = (e) => {
						this.preview = e.target.result
					}
					reader.readAsDataURL(e.target.files[0])

					this.data_detail.avatar = this.$refs.avatar.files[0]
				}
			},
			remove() {
				this.data_detail.avatar = ''
				this.preview = ''
			}
		}
	}
</script>