<template>
	<div>
		<section class="content-header">
			<h1>
				Thêm mới<small>Sản phẩm</small>
			</h1>
			<ol class="breadcrumb">
				<li><router-link :to="{name : 'home'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
				<li><router-link :to="{name : 'listProduct'}">Sản phẩm</router-link></li>
				<li class="active">Thêm mới</li>
			</ol>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Thông tin</h3>
						</div>
						<form role="form">
							<div class="box-body">
								<div class="form-group">
									<label>Tên</label>
									<input type="text" class="form-control" placeholder="tên">
								</div>
								<div class="row">
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>Thương hiệu</label>
											<select class="form-control">
												<option>Dell</option>
												<option>Asus</option>
												<option>HP</option>
												<option>MSI</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>Giá bán (đ)</label>
											<input type="text" class="form-control" placeholder="giá bán">
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>Giá sale (đ)</label>
											<input type="text" class="form-control" placeholder="giá sale">
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>CPU</label>
											<input type="text" class="form-control" placeholder="cpu">
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>Ram</label>
											<select class="form-control">
												<option value="2">2 GB</option>
												<option value="4" selected>4 GB</option>
												<option value="8">8 GB</option>
												<option value="16">16 GB</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>SSD (GB)</label>
											<select class="form-control">
												<option value="" selected>Không</option>
												<option value="120">120</option>
												<option value="256">256</option>
												<option value="500">500</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>HDD (GB)</label>
											<select class="form-control">
												<option value="250">250</option>
												<option value="320">320</option>
												<option value="500" selected>500</option>
												<option value="750">750</option>
												<option value="1000">1000</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>Màn hình (inch)</label>
											<select class="form-control">
												<option value="14" selected>14</option>
												<option value="15.6">15.6</option>
												<option value="17">17</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div class="form-group">
											<label>Hệ điều hành</label>
											<select class="form-control">
												<option value="window" selected>Window</option>
												<option value="mac os">Mac OS</option>
											</select>
										</div>
									</div>
								</div>

								<div class="checkbox">
									<label><input type="checkbox"> Duyệt</label>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">SEO</h3>
						</div>
						<form class="form">
							<div class="box-body">
								<div class="form-group">
									<label>SEO title</label>
									<input type="text" class="form-control" placeholder="seo title">
								</div>
								<div class="form-group">
									<label>Meta keyword</label>
									<input type="text" class="form-control" placeholder="meta keyword">
								</div>
								<div class="form-group">
									<label>Meta description</label>
									<textarea onkeyup="textAreaAdjust(this)" class="form-control" placeholder="meta description"></textarea>
								</div>
							</div>

							<div class="box-footer">
								<center>
									<a class="btn btn-success" ><i class="fa fa-plus"></i> Thêm mới</a>
									<router-link :to="{name : 'listProduct'}" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách</router-link>
								</center>
							</div>
							<!-- /.box-footer -->
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