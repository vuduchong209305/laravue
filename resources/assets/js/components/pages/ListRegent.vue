<template>
	<div>
		<section class="content-header">
			<h1>
				Danh sách
				<small>Ban quản trị</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Ban quản trị</a></li>
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
									<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

									<div class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
										<th width="25%">Email</th>
										<th width="20%">Role</th>
										<th width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="item in listRecord" v-if="listRecord.length > 0">
										<td><input type="checkbox" /></td>
										<td><img :src="item.avatar" alt="" class="w100"></td>
										<td>{{ item.name }}</td>
										<td>{{ item.email }}</td>
										<td><span :class="['label', item.role == 'admin' ? 'label-danger' : 'label-success']">{{ item.role }}</span></td>
										<td>
											<span class="block-button">
												<a class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
												<a class="btn btn-xs btn-danger"><i class="fa fa-close"></i></a>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
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
				listRecord : {}
			}
		},
		created() {
			axios.get(BASE_URL + 'admin/getAllRegent', {
				
			}).then(res => {
				this.listRecord = res.data
			}).catch(e => {
				console.log(e)
			})
		}
	}

</script>