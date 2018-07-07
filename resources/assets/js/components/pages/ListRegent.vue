<template>
	<div>
		<section class="content-header">
			<h1>
				Danh sách
				<small>Ban quản trị</small>
			</h1>
			<ol class="breadcrumb">
				<li><router-link :to="{name : 'home'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
				<li><router-link :to="{name : 'listRegent'}">Ban quản trị</router-link></li>
				<li class="active">Danh sách</li>
			</ol>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<router-link :to="{name : 'addRegent'}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Thêm</router-link>
							<router-link :to="{name : 'addRegent'}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Xóa</router-link>
							<div class="box-tools">
								<div class="input-group input-group-sm" style="width: 200px;">
									<input v-on:keypress.enter.prevent="searchKeyword" v-model="keyword" type="text" name="table_search" class="form-control pull-right" placeholder="Search" >
									<div class="input-group-btn">
										<button v-on:click="searchKeyword" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th width="5%"><input type="checkbox" class="checkall" /></th>
										<th width="15%">Avatar</th>
										<th width="25%">Name</th>
										<th width="20%">Email</th>
										<th width="10%">Phone</th>
										<th width="15%">Role</th>
										<th width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="item, index in listRecord" v-if="listRecord.length > 0">
										<td><input type="checkbox" /></td>
										<td><img :src="item.avatar" alt="" class="w100"></td>
										<td>{{ item.name }}</td>
										<td>{{ item.email }}</td>
										<td>{{ item.phone }}</td>
										<td><span :class="['label', item.role == 'admin' ? 'label-danger' : 'label-success']">{{ item.role }}</span></td>
										<td>
											<span class="block-button">
												<a class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
												<a class="btn btn-xs btn-danger" v-on:click="deleteItem(index,item.id)"><i class="fa fa-close"></i></a>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="box-footer clearfix">
							<div class="pull-right">
								<div>Hiển thị {{pagination.from}} đến {{pagination.to}} của {{pagination.total}} dữ liệu</div>
								<pagination v-bind:pagination="pagination" v-on:click.native="getListData(pagination.current_page)" :offset="4"></pagination>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
	import pagination from '../include/Pagination'
	export default {
		components : { pagination },
		data() {
			return {
				listRecord : {},
				pagination: {
					total: 0,
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 4,
				keyword : ''
			}
		},
		created() {
			this.getListData(this.pagination.current_page);
		},
		methods: {
			getListData(page) {
				axios.get(BASE_URL + 'admin/regent/index', {
					params : {
						page : page,
						keyword : this.keyword
					}
				}).then(res => {
					this.listRecord = res.data.data
					this.pagination = res.data
				}).catch(e => {
					console.log(e)
				})
			},
			searchKeyword(e) {
				this.getListData(1)
			},
			deleteItem(index, id) {
				Vue.swal({
					title: 'Bạn chắc chắn muốn xóa?',
					text: "Dữ liệu sẽ không thể khôi phục lại được!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Đồng ý!',
					cancelButtonText: 'Hủy!'
				}).then((result) => {
					if (result.value) {
						axios.delete(BASE_URL + 'admin/regent/delete', {
							params: { id: id }
						}).then(res => {
							console.log(res)
							if(res.data == 'OK') {
								this.listRecord.splice(index, 1);
								Vue.swal(
									'Đã xóa !',
									'Dữ liệu của bạn đã được xóa !',
									'success'
									)
							} else if(res.data == 'is_me') {
								Vue.swal(
									'Xóa thất bại', 
									'Bạn không được xóa chính mình', 
									'info'
									)
							} else {
								Vue.swal(
									'Xóa thất bại', 
									'Đã xảy ra lỗi', 
									'info'
									)
							}
						}).catch(e => {
							console.log(e)
						});
					}
				})
			}
		}
	}

</script>