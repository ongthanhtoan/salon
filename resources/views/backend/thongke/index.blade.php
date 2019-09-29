@extends('backend.layouts.index')
@section('title')
Thống kê
@endsection
@section('title-header')
THỐNG KÊ
@endsection
@section('main-content')
<form action="{{route('thong-ke.thongKe')}}" method="POST" autocomplete="false">
    {{csrf_field()}}
    <table align="center">
    <tr>
        <th style="font-size: 12px;">Chi nhánh: </th>
        <td>
                <select id="slChiNhanh" name="slChiNhanh" class="form-control">
                @foreach($chinhanh as $value)
                <option class="form-group" value="{{$value->chi_nhanh_ma}}">{{$value->chi_nhanh_ma." - ".$value->chi_nhanh_ten}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <th style="font-size: 12px;">Nhân viên: </th>
        <td>
            
            <select id="slNguoiDung" name="slNguoiDung" class="form-control">
                @if(Session::has('admin'))
                <option class="form-group" value="0">Tất cả</option>
                @endif
                @foreach($nguoidung as $value)
                <option class="form-group" value="{{$value->id}}">{{$value->username}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <th style="font-size: 12px;">Từ ngày: </th>
        <td>
            <input id="txtTuNgay" name="txtTuNgay" type="text" class="form-control datepicker" placeholder="Từ Ngày" required readonly="true">
        </td>
    </tr>
    <tr>
        <th style="font-size: 12px;">Đến ngày: </th>
        <td>
            <input id="txtDenNgay" name="txtDenNgay" type="text" class="form-control datepicker" placeholder="Đến Ngày" required readonly="true">
        </td>
    </tr>
    <tr>
        <td></td>
        <td align="center">
            <br>
            <button id="btnSubmit" type="submit" class="btn btn-blue">Thực Hiện</button>
        </td>
    </tr>
</table>
</form>
@endsection
<!--@section('custom-script')
<script>
    $('#btnSubmit').click(function(){
        if($('#txtTuNgay').val() != "" && $('#txtDenNgay').val() != ""){
            $.ajax({
                type: 'POST',
                url: '{{route('thong-ke.thongKe')}}',
                data: {
                        'chiNhanh': $('#slChiNhanh').val(),
                        'nguoiDung': $('#slNguoiDung').val(),
                        'tuNgay': $('#txtTuNgay').val(),
                        'denNgay': $('#txtDenNgay').val(),
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
                                        location.href = '{{route('thong-ke.index')}}';
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
</script>
@endsection-->