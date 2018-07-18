<template>
	<div>
		<form @submit.prevent="addMessage">
			<label for="">New Message (enter to add) :</label>
			<input v-model="newMessage" type="text" class="form-control">
		</form>
	</div>
</template>

<script>
	export default {
		props: ['name'],
		data() {
			return {
				newMessage: ''
			}
		},
		methods: {
			addMessage() {
				console.log(this.name, this.newMessage, Date.now())
			}
		}
	}
</script>