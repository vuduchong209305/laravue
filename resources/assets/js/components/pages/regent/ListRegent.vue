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
							<router-link :to="{name : 'addRegent'}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> <span class="hidden-xs">Thêm</span></router-link>
							<a class="btn btn-sm btn-danger" v-on:click="deleteMulti"><i class="fa fa-close"></i> <span class="hidden-xs">Xóa</span></a>
							<div class="box-tools">
								<div class="input-group input-group-sm" style="width: 200px;">
									<input v-on:keypress.enter.prevent="searchKeyword" v-model="keyword" type="text" name="table_search" class="form-control pull-right" placeholder="Search" >
									<div class="input-group-btn">
										<button v-on:click="searchKeyword" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</div>
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th width="5%">
											<input @click="selectAll" v-model="allSelected" type="checkbox" class="checkall" />
										</th>
										<th width="10%">Avatar</th>
										<th width="15%">Name</th>
										<th width="20%">Email</th>
										<th width="15%">Phone</th>
										<th width="5%">Role</th>
										<th width="20%">Address</th>
										<th width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="item, index in listRecord" v-if="listRecord.length > 0" :key="index">
										<td><input type="checkbox" :value="item.id" v-model="checkedId" @change="checkboxes"/></td>
										<td><img :src="item.avatar" alt="" class="w100"></td>
										<td>{{ item.name }}</td>
										<td>{{ item.email }}</td>
										<td>{{ item.phone }}</td>
										<td>
											<span :class="['label', item.role == 'admin' ? 'label-danger' : 'label-success']">{{ item.role }}</span>
										</td>
										<td>{{ item.address }}</td>
										<td>
											<span class="block-button">
												<router-link :to="{ name : 'editRegent', params: { id: item.id }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></router-link>
												<a v-on:click="deleteItem(item.id)" class="btn btn-xs btn-danger"><i class="fa fa-close"></i></a>
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
	import custom from '../../include/custom'
	export default {
		mixins: [custom],
		data() {
			return {
				prefix_url : 'regent'
			}
		}
	}

</script>