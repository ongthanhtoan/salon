@extends('backend.layouts.index')
@section('title')
Thống kê chi tiết
@endsection
@section('title-header')
THỐNG KÊ CHI TIẾT
@endsection
@section('main-content')
<table id="myTable" class="table table-bordered"> 
    <thead>
        <tr>
            <th class="text-center" width="10%">STT</th>
            <th class="text-center" width="10%">Tên đăng nhập</th>
            <th class="text-center" width="20%">Họ tên</th>
            <th class="text-center" width="20%">Chi nhánh</th>
            <th class="text-center" width="20%">Số tiền</th>
            <th class="text-center" width="40%">Thưởng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $stt => $value)
        @if($value->username != "")
        <tr>
            <td class="text-center">{{$stt+1}}</td>
            <td class="text-center">{{$value->username}}</td>
            <td class="text-center">{{$value->hoten}}</td>
            <td class="text-center">{{$value->chi_nhanh_ten}}</td>
            <td class="text-center">{{number_format($value->tong, 0, '', ',')}}</td>
            <td class="text-center">{{number_format($value->thuong, 0, '', ',')}}</td>
        </tr>
        @else
        <tr>
            <th colspan="6" class="text-center">Không có dữ liệu</th>
        </tr>
        @endif
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan='4'>Tổng</th>
            <th class="text-center">{{number_format($tongtien, 0, '', ',')}}</th>
            <th class="text-center">{{number_format($tongthuong, 0, '', ',')}}</th>
        </tr>
    </tfoot>
</table>
@endsection
@section('custom-script')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Xuất excel',
                    footer: true,
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                }
            ],
            pageLength: 25,
            responsive: true,
            language: {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Hiển thị _MENU_ dòng",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            filterDropDown: {
                label: 'Lọc: ',
                columns: [
                    {
                        idx: 3,
                    },
                    {
                        idx: 1
                    }
                ],
                bootstrap: true,
                autoSize: false
            }
        });
    });
</script>
@endsection