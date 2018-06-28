$(document).ready(function(){
	$('body').on('change', '.avatar', function(e) {

		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.preview').attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		}

		var form = new FormData();
		form.append('image', this.files[0]);

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "admin/upload-avatar",
			type: "post",
			data: form,
			processData: false,
			contentType: false,
			beforeSend:function() {
				$(".loader").show()
			},
			success:function(data) {

				if(data == 'IMAGE INVALID') {
					$.toast({
						heading: 'Có lỗi xảy ra',
						text: 'Ảnh upload không hợp lệ, vui lòng chọn lại',
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'error',
						hideAfter: 3500

					});
				} else {
					$.toast({
						heading: 'Thành công',
						text: 'Bạn đã thay avatar thành công',
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'success',
						hideAfter: 3500, 
						stack: 6
					});
				}

				$(".loader").hide()
			},
			error:function(e) {
				console.log(e)
			}
		});
	});
});