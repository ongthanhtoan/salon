<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
class ThuNhapController extends Controller
{
    public function index()
    {
        if(Session::has('user')){
            $where = Session::get('user');
            $data = DB::table('thu_nhap')
                ->leftjoin('users','users.id','=','thu_nhap.id_nguoi_dung')
                ->leftjoin('chi_nhanh','chi_nhanh.chi_nhanh_id','=','thu_nhap.chi_nhanh_id')
                ->where('users.username','=',$where)
                ->get();
        }else{
            $data = DB::table('thu_nhap')
                ->leftjoin('users','users.id','=','thu_nhap.id_nguoi_dung')
                ->leftjoin('chi_nhanh','chi_nhanh.chi_nhanh_id','=','thu_nhap.chi_nhanh_id')
                ->get();
        }
        $dataChiNhanh = DB::table('chi_nhanh')->get();
        $dataNguoiDung = DB::table('users')->get();
        return view('backend.thunhap.index')->with('data',$data)->with('chinhanh',$dataChiNhanh)->with('nguoidung',$dataNguoiDung);
    }

    public function store(Request $request)
    {
        $date = Carbon::now()->timestamp;
        if(Session::has('admin')){
            $nguoiNhap = Session::get('admin');
        }else{
            $nguoiNhap = Session::get('user');
        }
        $idNguoiNhap = DB::table('users')->select('id')->where('username',$nguoiNhap)->get();
        $idChiNhanh = DB::table('chi_nhanh')->select('chi_nhanh_id')->where('chi_nhanh_ma',$request->chiNhanh)->get();
        if($User = DB::table('thu_nhap')->insert(
            [
                'thu_nhap_so_tien'=>$request->soTien,
                'thu_nhap_ngay_nhap'=>$date,
                'id_nguoi_dung'=>$idNguoiNhap[0]->id,
                'chi_nhanh_id'=> $idChiNhanh[0]->chi_nhanh_id
            ]
        )){
            return response()->json([
                $data = 1
            ],200);
        }else{
            return response()->json([
                $data = 2
            ],200);
        }
    }

    public function edit($id)
    {
        $data = DB::table('thu_nhap')->where('thu_nhap_id',$id)
                ->leftjoin('chi_nhanh','thu_nhap.chi_nhanh_id','=','chi_nhanh.chi_nhanh_id')
                ->get();
        return response()->json([
            $data = $data
        ],200);
    }

    public function update(Request $request, $id)
    {
        $nguoiNhap = $request->nguoiNhap;
        $idChiNhanh = DB::table('chi_nhanh')->select('chi_nhanh_id')->where('chi_nhanh_ma',$request->chiNhanh)->get();
        $date = \Carbon\Carbon::parse($request->ngayNhap)->timestamp;
        $rs = DB::table('thu_nhap')->where('thu_nhap_id',$id)->update(
            [
                'thu_nhap_so_tien'=>$request->soTien,
                'id_nguoi_dung'=>$nguoiNhap,
                'chi_nhanh_id'=> $idChiNhanh[0]->chi_nhanh_id,
                'thu_nhap_ngay_nhap' => $date
            ]
        );
        if($rs){
            return response()->json([
                $data = 1
            ],200);
        }else{
            return response()->json([
                $data = 2
            ],200);
        }
    }

    public function destroy($id)
    {
        if(DB::table('thu_nhap')->where('thu_nhap_id',$id)->delete()){
            return response()->json([
                $data = 1
            ],200);
        }else{
            return response()->json([
                $data = 2
            ],200);
        }
    }
}
