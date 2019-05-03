$('body').on('click', '.btn-login', function(){
	var email = $("input[name = email]").val();
	var password = $("input[name = password]").val();
	console.log({email, password});
	if(email=="" || password=="") {
		toastr.warning('Chưa điền đầy đủ thông tin.', 'Lỗi!');
	} else {
		$.ajax({
			type : 'post',
			url : "?mod=login&act=separation",
			data : {
				email : email,
				password : password
			},
			success:(function(response){
				console.log(response);
				var data = JSON.parse(response);
				if(data.success == 'true') {
					var url1 = '?mod=admin&act=customer'; 
					document.location = url1;
				}else {
					toastr.error('Sai thông tin đăng nhập.', 'Lỗi!');
					toastr.options.timeOut = 3000;
				}
			}),

		});
	}
	
});