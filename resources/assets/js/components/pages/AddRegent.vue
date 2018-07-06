<template>
	<div>
		<section class="content-header">
			<h1>
				Thêm mới
				<small>Ban quản trị</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Ban quản trị</a></li>
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

												<span v-if="!avatar">
													<input type="file" class="form-control hidden" id="fileInput" v-on:change="onImageChange" ref="avatar" accept=".png, .jpg, .jpeg">
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
											<select class="form-control" name="role" v-validate="'required'">
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
								<button type="button" class="btn btn-primary" v-on:click="submit">Submit</button>
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
				preview : '',
				avatar : '',
				data_detail : {
					name : '',
					email : '',
					password : '',
					phone : '',
					address : ''
				}
			}
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
						formData.append('image', this.avatar)
						formData.append('name', this.data_detail.name)
						formData.append('email', this.data_detail.email)
						formData.append('password', this.data_detail.password)
						formData.append('phone', this.data_detail.phone)
						formData.append('address', this.data_detail.address)

						axios.post(BASE_URL + 'admin/addRegent', formData,
							{
								headers: {
									'Content-Type': 'multipart/form-data'
								}
							}
						).then(res => {
							console.log(res)
							if(res.data == 'OK') {
								
								this.$notify({
									group: 'foo',
									title: 'Thông báo',
									text: 'Thêm mới thành công !',
									type: 'success',
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

					this.avatar = this.$refs.avatar.files[0]
				}
			},
			remove() {
				this.avatar = ''
			}
		}
	}
</script>