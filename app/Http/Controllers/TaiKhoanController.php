<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
class TaiKhoanController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $data = DB::table('users')->get();
            return view('backend.taikhoan.index')->with('data',$data);
        }else{
            return redirect()->route('home');
        }
    }

    public function store(Request $request)
    {
        if(DB::table('users')->where('hoten',$request->HoTen)->first()){
            return response()->json([
                $data = 0
            ],200);
        }else{
            if($User = DB::table('users')->insert(
                [
                    'hoten'=>$request->HoTen,
                    'username'=>$request->username,
                    'password'=>bcrypt($request->password),
                    'quyen'=> 0
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
    }

    public function edit($id)
    {

        $data = DB::table('users')->where('username',$id)->get();

        return response()->json([
            $data = $data
        ],200);
    }

    public function update(Request $request, $id)
    {
        $Check = DB::table('users')->where('username','<>',$id)->get();
        if($Check[0]->username == $request->username)
        {
            return response()->json([
                $data = 0
            ],200);
        }
        else
        {
            if($request->passwordnew == null)
            {
                DB::table('users')->where('username',$id)->update(
                    [
                        'HoTen'=>$request->HoTen,'username'=>$request->username
                    ]);
                return response()->json([
                    $data = 1
                ],200);
            }
            if($request->passwordnew != null)
            {
                $rs = DB::table('users')->where('username',$id)->update(
                        [
                            'HoTen'=>$request->HoTen,
                            'username'=>$request->username,
                            'password'=>bcrypt($request->passwordnew)
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
        }
    }

    public function destroy($id)
    {
        if(DB::table('users')->where('id',$id)->delete()){
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
