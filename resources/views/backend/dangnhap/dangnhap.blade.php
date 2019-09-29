<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from gitapp.top/demo/authfy/demo/login-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Apr 2019 06:16:33 GMT -->

<head>
    <!-- Basic Page Needs
        ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- For Search Engine Meta Data  -->
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="yoursite.com" />

        <title>Nice Salon - Đăng Nhập</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/icon" href="{{asset('theme/backend/login/images/brand-logo.jpg')}}" />

        <!-- Main structure css file -->
        <link rel="stylesheet" href="{{asset('theme/backend/login/css/login1-style.css')}}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if IE]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <!-- Start Preloader -->
    <div id="preload-block">
        <div class="square-block"></div>
    </div>
    <!-- Preloader End -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">
                <!-- brand-logo start -->
                <div class="brand-logo text-center">
                    <img src="{{asset('theme/backend/login/images/brand-logo.jpg')}}" width="120" alt="brand-logo">
                </div>
                <!-- ./brand-logo -->
                <!-- authfy-login start -->
                <div class="authfy-login">
                    <!-- panel-login start -->
                    <div class="authfy-panel panel-login text-center active">
                        <div class="authfy-heading">
                            <h3 class="auth-title">ĐĂNG NHÂP</h3>
                        </div>
                        <form>
                         <input type="text" class="form-control email" name="txtUserA" id="txtUserA">
                         <div class="pwdMask">
                            <input type="password" class="form-control password" name="txtPassA" id="txtPassA">
                            <span class="fa fa-eye-slash pwd-toggle"></span>
                        </div><p></p>
                        <div class="form-group">
                            <button id="login-admin" class="btn btn-lg btn-primary btn-block" type="button">Đăng Nhập</button>
                        </div>
                        <p><a class="lnk" id="btnChangePass" href="#"> Đổi mật khẩu!</a>
                                    </p>
                    </div>
<!--                    <div class="authfy-panel panel-signup text-center">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="authfy-heading">
                                    <h3 class="auth-title">ĐỔI MẬT KHẨU</h3>
                                </div>
                                <form>
                                   <input type="text" class="form-control email" name="txtUserName" id="txtUserName">
                                   <div class="pwdMask">
                                    <input type="password" class="form-control password" name="txtPassA" id="txtPassA">
                                    <span class="fa fa-eye-slash pwd-toggle"></span>
                                </div>
                                <div class="form-group">
                                    <button id="login-admin" class="btn btn-lg btn-primary btn-block" type="button">Đăng Nhập</button>
                                </div>
                            </form>
                            <a class="lnk-toggler" data-panel=".panel-login" href="#">Đăng Nhập Người Dùng</a>
                        </div>
                    </div>
                </div>-->
                <!-- ./panel-signup -->
                
            </div>
            <!-- ./authfy-login -->
        </div>
    </div>
    <!-- ./row -->
</div>
    <div class="modal fade" id="Sua">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Đổi mật khẩu</h4>
			</div>

			<div class="modal-body">
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="qt_TenDangNhap-edit" class="control-label">Tên Đăng Nhập</label>
							<input type="text" class="form-control" id="qt_TenDangNhap-edit" name="qt_TenDangNhap-edit" >
						</div>
						<div class="form-group">
							<label for="qt_MatKhauMoi-edit" class="control-label">Mật Khẩu Cũ</label>
							<input type="password" class="form-control" id="qt_MatKhauCu-edit" name="qt_MatKhauCu-edit" >
						</div>	
						<div class="form-group">
							<label for="qt_MatKhauMoi-edit" class="control-label">Mật Khẩu Mới</label>
							<input type="password" class="form-control" id="qt_MatKhauMoi-edit" name="qt_MatKhauMoi-edit" >
						</div>	
					</div>
					
				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				<button type="button" class="btn btn-info" id="btnSua">Cập Nhật</button>
			</div>
		</div>
	</div>
</div>
<!-- ./container -->

<!-- Javascript Files -->

<!-- initialize jQuery Library -->
<script src="{{asset('theme/backend/login/js/jquery-2.2.4.min.js')}}"></script>

<!-- for Bootstrap js -->
<script src="{{asset('theme/backend/login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/sweetalert.min.js')}}"></script>
<!-- Custom js-->
<script src="{{asset('theme/backend/login/js/custom.js')}}"></script>

</body>

<!-- Mirrored from gitapp.top/demo/authfy/demo/login-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Apr 2019 06:16:36 GMT -->
}
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnChangePass').click(function(){
            $('#Sua').modal().show();
        });
        $('#btnSua').click(function(){
			if($('#qt_MatKhauCu-edit').val() != null && $('#qt_MatKhauMoi-edit').val() != null && $('#qt_TenDangNhap-edit').val() != null){
				$.ajax({
					type: 'POST',
					url: '{{route('dang-nhap.changePass')}}',
					data: {
						'username': $('#qt_TenDangNhap-edit').val(),
						'password': $('#qt_MatKhauCu-edit').val(),
						'passwordnew': $('#qt_MatKhauMoi-edit').val(),
						'_token': '{{csrf_token()}}',
						'_method': 'PUT'
					},
					success: function(data){
						if(data == 1){
							$('#Sua').modal('hide');
							swal({
								title: "Thành Công",
								text: "Đổi mật khẩu thành công!",
								icon: "success",
							}).then(function(){
								location.href = '{{route('tai-khoan.index')}}';
							});
						}else if(data == 0){
							$('#Sua').modal('hide');
							swal({
								title: "Thất Bại",
								text: "Tài khoản không tồn tại, vui lòng kiểm tra lại!",
								icon: "error",
							});
						}else if(data == 2){
							$('#Sua').modal('hide');
							swal({
								title: "Thất Bại",
								text: "Mật khẩu hiện tại không đúng!",
								icon: "error",
							});
						}
						
					}
				});
			}
		});
        $('#login-admin').click(function(event){
            if($('#txtUserA').val()!="" && $('#txtPassA').val()!=""){
                $.ajax({
                    type: 'POST',
                    url: '{{route('dang-nhap.postDangNhapAdmin')}}',
                    data: {
                        'txtUserA': $('#txtUserA').val(),
                        'txtPassA': $('#txtPassA').val(),
                        '_token': '{{csrf_token()}}'
                    },
                    success: function(data){
                        if(data == 1){
                            swal({
                                title: "Đăng Nhập Thành Công!!",
                                icon: "success",
                                button: "OK!",
                            }).then(function() {
                                location.href = '{{route('home')}}';
                            });
                        }else if(data == 0){
                            swal({
                                title: "Đăng Nhập Thất Bại!",
                                text: "Kiểm Tra Lại!",
                                icon: "error",
                                button: "OK!",
                            });
                        }
                    }
                });
            }else{
                swal({
                    text: "Kiểm Tra Lại Thông Tin Đăng Nhập!",
                    icon: "error",
                    button: "OK!",
                });
            }
        });
        
    });
</script>