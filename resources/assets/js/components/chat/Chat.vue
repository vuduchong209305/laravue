<template>
	<div>
		<section class="content-header">
			<h1>
				Chat<small>Room</small>
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
							<div class="panel-heading">{{ name }}</div>
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item">
										<h4>
											<font color="#0881ff">Name</font>
											<font color="grey">Message</font>
										</h4>
										<small>Time</small>
									</li>
								</ul>
							</div>
							<div class="panel-footer">
								<NewMessage :name="name" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
	import NewMessage from './NewMessage'
	export default {
		props: ['name'],
		components: { NewMessage }
	}
</script>