import pagination from './Pagination'

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
			keyword : '',
			checkedId : [],
			allSelected: false,
		}
	},
	created() {
		this.getListData(this.pagination.current_page);
	},
	methods: {
		getListData(page) {
			axios.get(BASE_URL + 'admin/'+ this.prefix_url +'/index', {
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
		searchKeyword() {
			this.getListData(1)
		},
		deleteItem(id) {
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
					axios.delete(BASE_URL + 'admin/'+ this.prefix_url +'/delete', {
						params: { id: id }
					}).then(res => {
						if(res.data.status == 'OK') {
							this.listRecord = res.data.user.data
							this.pagination = res.data.user
							Vue.swal(
								'Đã xóa !',
								'Dữ liệu của bạn đã được xóa !',
								'success'
								)
						} else if(res.data.status == 'IS_ME') {
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
		},
		deleteMulti() {
			if(this.checkedId != '') {
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
						axios.delete(BASE_URL + 'admin/'+ this.prefix_url +'/deleteMulti', {
							params: { id: this.checkedId }
						}).then(res => {
							if(res.data.status == 'OK') {
								this.listRecord = res.data.user.data
								this.pagination = res.data.user
								Vue.swal(
									'Đã xóa !',
									'Dữ liệu của bạn đã được xóa !',
									'success'
									)
							} else if(res.data.status == 'IS_ME') {
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
			} else {
				Vue.swal(
					'Thông báo', 
					'Bạn chưa chọn bản ghi nào', 
					'info'
					)
			}
		},
		selectAll() {
			this.allSelected = !this.allSelected
			this.checkedId = []
			if (this.allSelected) {
				for(let i = 0; i < this.listRecord.length; i++) {
					this.checkedId.push(this.listRecord[i].id)
				}
			}
		},
		checkboxes(){
			this.allSelected = this.checkedId.length == this.listRecord.length ? true : false
		}
	}
}