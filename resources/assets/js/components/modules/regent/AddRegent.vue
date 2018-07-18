<template>
	<div>
		<section class="content-header">
			<h1>
				Thêm mới<small>Ban quản trị</small>
			</h1>
			<ol class="breadcrumb">
				<li><router-link :to="{name : 'home'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
				<li><router-link :to="{name : 'listRegent'}">Ban quản trị</router-link></li>
				<li class="active">Thêm mới</li>
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

												<upload-image v-on:imageUpload="uploadImage($event)"></upload-image>

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
											<input type="email" class="form-control" placeholder="email" v-validate="'required|email'" name="email" v-model="data_detail.email">
											<font color="red">{{ errors.first('email') }}</font>
										</div>
										<div class="form-group">
											<label>Password <font color="red">*</font></label>
											<input type="password" class="form-control" placeholder="password" v-validate="'required'" name="password" v-model="data_detail.password">
											<font color="red">{{ errors.first('password') }}</font>
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
									<a class="btn btn-success" v-on:click="submit"><i class="fa fa-plus"></i> Thêm mới</a>
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
	import UploadImage from './../../include/UploadImage'
	export default {
		components : { 'upload-image' : UploadImage },
		data() {
			return {
				data_detail : {
					name : '',
					email : '',
					password : '',
					phone : '',
					address : '',
					role : '',
					avatar : '',
					status : 1
				}
			}
		},
		methods: {
			uploadImage(image) {
				this.data_detail.avatar = image
			},
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
						formData.append('image', this.data_detail.avatar)
						formData.append('name', this.data_detail.name)
						formData.append('email', this.data_detail.email)
						formData.append('password', this.data_detail.password)
						formData.append('phone', this.data_detail.phone)
						formData.append('address', this.data_detail.address)
						formData.append('role', this.data_detail.role)
						formData.append('status', this.data_detail.status)

						axios.post(BASE_URL + 'admin/regent/add', formData,
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
									text: 'Thêm mới thành công !',
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
			}
		}
	}
</script>