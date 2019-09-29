@extends('backend.layouts.index')
@section('title')
Nhập thông tin
@endsection
@section('title-header')
DANH SÁCH
@endsection
@section('custom-css')
<style>
	.error{
		color: red;
	}
	.selectboxit{
		visibility: visible;
	}
</style>
@endsection
@section('main-content')
<p class="action" align="right">
	<a id="modal" class="btn btn-blue">Thêm</a>
</p>
<div class="">
    <table class="table table-bordered"> 
	<thead>
		<tr>
			<th class="text-center" width="10%">STT</th>
			<th class="text-center" width="10%">Tên đăng nhập</th>
			<th class="text-center" width="20%">Họ tên</th>
			<th class="text-center" width="20%">Chi nhánh</th>
			<th class="text-center" width="20%">Số tiền</th>
			<th class="text-center" width="40%">Ngày nhập</th>
                        @if(Session::has('admin'))
			<th class="text-center" width="30%">Sửa</th>
			<th class="text-center" width="30%">Xóa</th>
                        @endif
		</tr>
	</thead>
	<tbody>
		@foreach($data as $stt => $value)
		<tr>
			<td class="text-center">{{$stt+1}}</td>
			<td class="text-center">{{$value->username}}</td>
			<td class="text-center">{{$value->hoten}}</td>
			<td class="text-center">{{$value->chi_nhanh_ten}}</td>
			<td class="text-center">{{number_format($value->thu_nhap_so_tien, 0, '', ',')}}</td>
			<td class="text-center">{{date('d-m-Y',$value->thu_nhap_ngay_nhap)}}</td>
                        @if(Session::has('admin'))
			<td class="text-center">
				<button data-id="{{$value->thu_nhap_id}}" class="btn btn-blue btn-icon getSua">Sửa<i class="entypo-pencil"></i></button>
			</td>
                        <td class="text-center">
                            <button data-id="{{$value->thu_nhap_id}}" class="btn btn-red btn-icon btnXoa">Xóa<i class="entypo-cancel"></i></button>
                        </td>
                        @endif
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<!-- Modal Thêm-->
<div class="modal fade" id="Them">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thêm Mới</h4>
			</div>

			<div class="modal-body">
				
				<div class="row">
					<div class="col-md-12">

						<div class="form-group">
							<label for="slChiNhanh" class="control-label">Chi nhánh</label>

							<select id="slChiNhanh" class="form-control">
                                                            <option value="0">Chọn Chi Nhánh</option>
                                                            @foreach($chinhanh as $value)
                                                            <option class="form-group" value="{{$value->chi_nhanh_ma}}">{{$value->chi_nhanh_ma." - ".$value->chi_nhanh_ten}}</option>
                                                            @endforeach
                                                        </select>
						</div>	
						<div class="form-group">
							<label for="txtSoTien" class="control-label">Số tiền</label>
							<input type="number" class="form-control" id="txtSoTien" name="txtSoTien" placeholder="Nhập số tiền">
						</div>	
					</div>

				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				<button type="button" class="btn btn-info" id="btnThem">Thêm</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Sửa-->
<div class="modal fade" id="Sua">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cập Nhật</h4>
			</div>

			<div class="modal-body">
				
				<div class="row">
					<div class="col-md-12">

						<div class="form-group">
							<label for="slChiNhanh-edit" class="control-label">Chi nhánh</label>

							<select id="slChiNhanh-edit" class="form-control">
                                                            @foreach($chinhanh as $value)
                                                            <option class="form-group" value="{{$value->chi_nhanh_ma}}">{{$value->chi_nhanh_ma." - ".$value->chi_nhanh_ten}}</option>
                                                            @endforeach
                                                        </select>
						</div>	
                                                <div class="form-group">
                                                    <label for="slNguoiDung-edit" class="control-label">Chi nhánh</label>

                                                    <select id="slNguoiDung-edit" class="form-control">
                                                        @foreach($nguoidung as $value)
                                                        <option class="form-group" value="{{$value->id}}">{{$value->username}}</option>
                                                        @endforeach
                                                    </select>
						</div>
						<div class="form-group">
							<label for="txtSoTien-edit" class="control-label">Số tiền</label>
							<input type="text" class="form-control" id="txtSoTien-edit" name="txtSoTien-edit" placeholder="Nhập số tiền">
						</div>	
                                                <div class="form-group">
							<label for="txtNgayNhap-edit" class="control-label">Ngày nhập</label>
                                                        <input id="txtNgayNhap-edit" type="text" class="form-control datepicker" placeholder="Chọn Ngày" data-date-format='d-m-Y'>
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
@endsection
@section('custom-script')
<script>
	$(document).ready(function(){
//            $('#txtNgayNhap-edit').datepicker({
//                // dateFormat: 'dd-mm-yy',
//                format: 'dd/mm/yyyy'
//             });
		var Key;
		$('#modal').click(function(){
			$('#Them').modal().show();
		});
		$('#btnThem').click(function(){
			if($('#slChiNhanh').val() != "" && $("#txtSoTien").val() != ""){
				$.ajax({
					type: 'POST',
					url: '{{route('nhap-lieu.store')}}',
					data: {
						'chiNhanh': $('#slChiNhanh').val(),
						'soTien': $('#txtSoTien').val(),
						'_token': '{{csrf_token()}}'
					},
					success: function(data){
						if(data == 1){
							$('#Them').modal('hide');
							swal({
								title: "Thành Công",
								text: "Thêm mới thành công!",
								icon: "success",
							}).then(function(){
								location.href = '{{route('nhap-lieu.index')}}';
							});
						}else if(data == 2){
							$('#Them').modal('hide');
							swal({
								title: "Thất Bại",
								text: "Lỗi Thử Lại Sau, Hoặc Liên Hệ Với Quản Trị Web!",
								icon: "error",
							});
						}
					}
				});
			}
		});
		$('.getSua').click(function(){
			var ID = $(this).data('id');
			var URL = "{{ route('nhap-lieu.edit',":id") }}";
			URL = URL.replace(':id', ID);
			$.ajax({
				type: "GET",
				dataType:"json",
				url: URL,
				success: function(data){
//					 console.log(data[0][0]);
					Key = data[0][0]['thu_nhap_id'];
					$('#slChiNhanh-edit').val(data[0][0]['chi_nhanh_ma']);
					$('#txtSoTien-edit').val(data[0][0]['thu_nhap_so_tien']);
				},
				error: function(){
					swal({
						title: "Thất Bại!",
						text: "Không Thể Sửa Vào Lúc Này",
						icon: "error",
						button: "OK!",
					});
				}
			});
			$('#Sua').modal().show();
		});
		$('#btnSua').click(function(){
			if($('#slChiNhanh-edit').val() != "" && $('#txtSoTien-edit').val() != ""){
				var ID = Key;
				URL = '{{ route('nhap-lieu.update',":id") }}';
				URL = URL.replace(':id', ID);
				$.ajax({
					type: 'POST',
					url: URL,
					data: {
						'chiNhanh': $('#slChiNhanh-edit').val(),
						'soTien': $('#txtSoTien-edit').val(),
                                                'nguoiNhap': $('#slNguoiDung-edit').val(),
                                                'ngayNhap': $('#txtNgayNhap-edit').val(),
						'_token': '{{csrf_token()}}',
						'_method': 'PUT'
					},
					success: function(data){
						if(data == 1){
							$('#Sua').modal('hide');
							swal({
								title: "Thành Công",
								text: " Đã Cập Nhật!",
								icon: "success",
							}).then(function(){
								location.href = '{{route('nhap-lieu.index')}}';
							});
						}else if(data == 2){
							$('#Sua').modal('hide');
							swal({
								title: "Thất Bại",
								text: "Sai Mật Khẩu",
								icon: "error",
							});
						}
						
					}
				});
			}
		});
		$('.btnXoa').click(function(event){
			var ID = $(this).data('id');
			var URL = "{{ route('nhap-lieu.destroy',":id") }}";
			URL = URL.replace(':id', ID);
			event.preventDefault();
			swal({
				title: "Xác Nhận Xóa?",
				text: "Nhấn OK Để Xóa, Cancel Để Hủy!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: URL,
						data: {
							'_token': '{{ csrf_token() }}',
							'_method': "DELETE"
						},
						success: function(data){
							if(data == 1){
								swal({
									title: "Xóa Thành Công!",
									icon: "success",
									button: "OK!",
								}).then(function() {
									location.reload();
								});
							}else if(data == 2){
								swal({
									title: "Thất Bại!",
									text: "Hãy Kiểm Tra Các Quản Trị Có Loại Này!",
									icon: "error",
									button: "OK!",
								});
							}
						},
						error: function(){
							swal({
								title: "Thất Bại!",
								text: "Thử Lại Sau!",
								icon: "error",
								button: "OK!",
							});
						}
					});
				} else {
					swal("Đã Hủy!", {
						icon: "info",
					});
				}
			});
		});
	});
</script>
@endsection