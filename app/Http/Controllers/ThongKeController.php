<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Exception;

class ThongKeController extends Controller {

    public function index() {
        $dataChiNhanh = DB::table('chi_nhanh')->get();
        if (Session::has('user')) {
            $dataNguoiDung = DB::table('users')->where('username', Session::get('user'))->get();
        } else {
            $dataNguoiDung = DB::table('users')->get();
        }
        return view('backend.thongke.index')->with('chinhanh', $dataChiNhanh)->with('nguoidung', $dataNguoiDung);
    }

    public function thongKe(Request $request) {
        $chiNhanh = $request->slChiNhanh;
        $tuNgay = $request->txtTuNgay;
        $denNgay = $request->txtDenNgay;

        $idNguoiDung = $request->slNguoiDung;
        if($idNguoiDung == 0){
            $idNguoiDung = 1;
            $where = "1 = :idNguoiDung";
        }else{
            $where = "a.id_nguoi_dung = :idNguoiDung";
        }
        $idChiNhanh = DB::table('chi_nhanh')->select('chi_nhanh_id')->where('chi_nhanh_ma', $chiNhanh)->get();
        $tuNgay = \Carbon\Carbon::parse($tuNgay)->timestamp;
        $denNgay = \Carbon\Carbon::parse($denNgay)->timestamp;
        $param = Array(
            'idNguoiDung' => $idNguoiDung, 
            'idChiNhanh' => $idChiNhanh[0]->chi_nhanh_id, 
            'tuNgay' => $tuNgay, 
            'denNgay' => $denNgay
        );
        $data = DB::select("SELECT b.username, b.hoten, c.chi_nhanh_ma,a.id_nguoi_dung, c.chi_nhanh_ten, SUM(a.thu_nhap_so_tien) tong, FLOOR((SUM(a.thu_nhap_so_tien)*5)/100) thuong
                            FROM thu_nhap a
                            LEFT JOIN users b ON a.id_nguoi_dung = b.id
                            LEFT JOIN chi_nhanh c ON a.chi_nhanh_id = c.chi_nhanh_id
                            WHERE a.chi_nhanh_id = :idChiNhanh
                            AND $where
                            AND a.thu_nhap_ngay_nhap BETWEEN :tuNgay AND :denNgay GROUP BY b.hoten,a.id_nguoi_dung,b.username,c.chi_nhanh_ma,c.chi_nhanh_ten", $param);
        $tongTien = 0;
        $tongThuong = 0;
        foreach($data as $value){
            $tongTien += $value->tong;
            $tongThuong += $value->thuong;
        }
        return view('backend.thongke.chitiet')->with('data',$data)->with('tongtien',$tongTien)->with('tongthuong',$tongThuong);
    }

}
