<template>
	<div>
		<section class="content-header">
			<h1>
				Chat<small>Online</small>
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
						<div class="panel panel-primary">
							<div class="panel-heading">Panel with panel-primary class</div>
							<div class="panel-body">
								<form @submit.prevent="enterChat">
									<label>Enter your name</label>
									<input type="text" v-model="name" class="form-control">
									<font color="red" v-if="feedback"><i>{{ feedback }}</i></font><br>
									<button class="btn btn-primary">Enter Chat</button>
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
	export default {
		data() {
			return {
				name : '',
				feedback : ''
			}
		},
		methods: {
			enterChat() {
				if(this.name) {
					this.$router.push({ name : 'chatroom', params: { name : this.name } })
				} else {
					this.feedback = 'Bạn phải nhập tên'
				}
			}
		}
	}
</script>