<template>
	<div>
		<section class="content-header">
		    <h1>
		        User Profile
		    </h1>
		    <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li><a href="#">Examples</a></li>
		        <li class="active">User profile</li>
		    </ol>
		</section>

		<!-- Main content -->
		<section class="content">

		    <div class="row">
		        <div class="col-md-3">

		            <!-- Profile Image -->
		            <div class="box box-primary">
		                <div class="box-body box-profile">

	                        <img :src="!avatar ? '/public/admin/img/no-image.png' : avatar" title="Thay ảnh đại diện" class="profile-user-img img-responsive img-circle preview" data-toggle="tooltip" onclick="document.getElementById('fileInput').click()">

	                        <input type="file" id="fileInput" class="hidden" ref="avatar" accept=".png, .jpg, .jpeg" v-on:change="onImageChange">

		                    <h3 class="profile-username text-center">{{ data_detail.name }}</h3>

		                    <p class="text-muted center-block label label-danger">{{ data_detail.role }}</p>

		                    <ul class="list-group list-group-unbordered">
		                        <li class="list-group-item">
		                            <b>Followers</b> <a class="pull-right">1,322</a>
		                        </li>
		                        <li class="list-group-item">
		                            <b>Following</b> <a class="pull-right">543</a>
		                        </li>
		                        <li class="list-group-item">
		                            <b>Friends</b> <a class="pull-right">13,287</a>
		                        </li>
		                    </ul>

		                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
		                </div>
		                <!-- /.box-body -->
		            </div>
		            
		        </div>
		        <!-- /.col -->
		        <div class="col-md-9">
		            <div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li><a href="#activity" data-toggle="tab">Activity</a></li>
		                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
		                    <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane" id="activity">
		                        <!-- Post -->
		                        <div class="post">
		                            <div class="user-block">
		                                <img class="img-circle img-bordered-sm" src="public/admin/img/user1-128x128.jpg" alt="user image">
		                                <span class="username">
		                                  <a href="#">Jonathan Burke Jr.</a>
		                                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
		                              </span>
		                                <span class="description">Shared publicly - 7:30 PM today</span>
		                            </div>
		                            <!-- /.user-block -->
		                            <p>
		                                Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
		                            </p>
		                            <ul class="list-inline">
		                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
		                                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
		                                </li>
		                                <li class="pull-right">
		                                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
		                                (5)</a></li>
		                            </ul>

		                            <input class="form-control input-sm" type="text" placeholder="Type a comment">
		                        </div>
		                        <!-- /.post -->

		                        <!-- Post -->
		                        <div class="post clearfix">
		                            <div class="user-block">
		                                <img class="img-circle img-bordered-sm" src="public/admin/img/user7-128x128.jpg" alt="User Image">
		                                <span class="username">
		                                  <a href="#">Sarah Ross</a>
		                                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
		                              </span>
		                                <span class="description">Sent you a message - 3 days ago</span>
		                            </div>
		                            <!-- /.user-block -->
		                            <p>
		                                Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
		                            </p>

		                            <form class="form-horizontal">
		                                <div class="form-group margin-bottom-none">
		                                    <div class="col-sm-9">
		                                        <input class="form-control input-sm" placeholder="Response">
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
		                                    </div>
		                                </div>
		                            </form>
		                        </div>
		                        <!-- /.post -->

		                        <!-- Post -->
		                        <div class="post">
		                            <div class="user-block">
		                                <img class="img-circle img-bordered-sm" src="public/admin/img/user6-128x128.jpg" alt="User Image">
		                                <span class="username">
		                              <a href="#">Adam Jones</a>
		                              <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
		                          </span>
		                                <span class="description">Posted 5 photos - 5 days ago</span>
		                            </div>
		                            <!-- /.user-block -->
		                            <div class="row margin-bottom">
		                                <div class="col-sm-6">
		                                    <img class="img-responsive" src="public/admin/img/photo1.png" alt="Photo">
		                                </div>
		                                <!-- /.col -->
		                                <div class="col-sm-6">
		                                    <div class="row">
		                                        <div class="col-sm-6">
		                                            <img class="img-responsive" src="public/admin/img/photo2.png" alt="Photo">
		                                            <br>
		                                            <img class="img-responsive" src="public/admin/img/photo3.jpg" alt="Photo">
		                                        </div>
		                                        <!-- /.col -->
		                                        <div class="col-sm-6">
		                                            <img class="img-responsive" src="public/admin/img/photo4.jpg" alt="Photo">
		                                            <br>
		                                            <img class="img-responsive" src="public/admin/img/photo1.png" alt="Photo">
		                                        </div>
		                                        <!-- /.col -->
		                                    </div>
		                                    <!-- /.row -->
		                                </div>
		                                <!-- /.col -->
		                            </div>
		                            <!-- /.row -->

		                            <ul class="list-inline">
		                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
		                                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
		                                </li>
		                                <li class="pull-right">
		                                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
		                            (5)</a></li>
		                            </ul>

		                            <input class="form-control input-sm" type="text" placeholder="Type a comment">
		                        </div>
		                        <!-- /.post -->
		                    </div>
		                    <!-- /.tab-pane -->
		                    <div class="tab-pane" id="timeline">
		                        <sendemail></sendemail>
		                    </div>
		                    <!-- /.tab-pane -->

		                    <div class="active tab-pane" id="settings">
		                        <form class="form-horizontal" action="">
		                            
		                            <div class="form-group">
		                                <label class="col-sm-2 control-label">Name</label>
		                                <div class="col-sm-10">
		                                    <input type="text" class="form-control" placeholder="name" v-model="data_detail.name" v-validate="'required'" name="name">
		                                	<font color="red">{{ errors.first('name') }}</font>
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <label class="col-sm-2 control-label">Password</label>
		                                <div class="col-sm-10">
		                                    <input type="password" class="form-control" placeholder="password" v-model="data_detail.password">
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <label class="col-sm-2 control-label">Email <font color="red">*</font></label>
		                                <div class="col-sm-10">
		                                    <input type="email" class="form-control" placeholder="email" readonly v-model="data_detail.email">
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <label class="col-sm-2 control-label">Phone <font color="red">*</font></label>
		                                <div class="col-sm-10">
		                                    <input type="text" class="form-control" placeholder="phone" v-model="data_detail.phone" v-validate="'required'" name="phone">
		                                    <font color="red">{{ errors.first('phone') }}</font>
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <label class="col-sm-2 control-label">Address <font color="red">*</font></label>

		                                <div class="col-sm-10">
		                                    <input type="text" class="form-control" placeholder="address" v-model="data_detail.address" v-validate="'required'" name="address">
		                                    <font color="red">{{ errors.first('address') }}</font>
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <div class="col-sm-offset-2 col-sm-10">
		                                    <button type="button" class="btn btn-danger" v-on:click="update">Update</button>
		                                </div>
		                            </div>
		                        </form>
		                    </div>

		                </div>

		            </div>

		        </div>

		    </div>

		</section>
	</div>
</template>

<script>

import SendEmail from './SendEmail'

export default {
	components: { 'sendemail' : SendEmail },
	data() {
		return {
			data_detail: {
				id : '',
				name : '',
				password : '',
				email : '',
				phone : '',
				address : '',
				role : ''
			},
			avatar : ''
		}
	},
	created() {
		this.data_detail.id = _id
		this.data_detail.name = _name
		this.data_detail.email = _email
		this.data_detail.phone = _phone
		this.data_detail.address = _address
		this.data_detail.role = _role
		this.avatar = _avatar
	},
	methods: {
		update() {
			this.$validator.validate().then(result => {
				if (!result) {
					this.$notify({
						group: 'foo',
						title: 'Thông báo',
						text: 'Bạn cần nhập đủ thông tin bắt buộc !',
						type: 'warn',
					})

				} else {

					axios.post(BASE_URL + 'admin/updateProfile', {
						data : this.data_detail
					}).then(res => {
						if(res.data == 'OK') {
							this.$notify({
								group: 'foo',
								title: 'Thông báo',
								text: 'Cập nhật thành công !',
								type: 'success',
							})

						} else {

							this.$notify({
								group: 'foo',
								title: 'Thông báo',
								text: 'Bạn cần nhập đủ thông tin bắt buộc !',
								type: 'warn',
							});
						}
					}).catch(e => {
						console.log(e)
					})
				}
			})
		},
		onImageChange(e) {
            this.avatar = this.$refs.avatar.files[0]
            let formData = new FormData()
            formData.append('image', this.avatar)

            axios.post(BASE_URL + 'admin/updateAvatar', formData,
            	{
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}
            ).then(res => {
            	if(res.data == 'OK') {
            		if(e.target.files && e.target.files[0]) {
		                var reader = new FileReader()
		                reader.onload = (e) => {
		                    this.avatar = e.target.result
		                }
		                reader.readAsDataURL(e.target.files[0])
		            }

		            this.$notify({
						group: 'foo',
						title: 'Thông báo',
						text: 'Cập nhật thành công !',
						type: 'success',
					})
            	}
	            
            }).catch(error => {
            	console.log(error)
            })
        }
	}
}
</script>