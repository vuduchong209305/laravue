<template>
	<form class="form-horizontal" action="">

		<div class="form-group">
			<label class="col-sm-2 control-label">Your Name <font color="red">*</font></label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="name" v-model="data_detail.name">

			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Your Email <font color="red">*</font></label>
			<div class="col-sm-10">
				<input type="email" class="form-control" placeholder="email" v-model="data_detail.email">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Comment <font color="red">*</font></label>

			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="comment" v-model="data_detail.comment">

			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="button" class="btn btn-danger" v-on:click="update">Update</button>
			</div>
		</div>
	</form>
</template>

<script>
	export default {
		data() {
			return {
				data_detail: {}
			}
		},
		methods: {
			update() {
				axios.post(BASE_URL + 'admin/send-email', {
					data : this.data_detail
				}).then(res => {
					console.log(res)
				}).catch(e => {
					console.log(e)
				})
			}
		}
	}
</script>