<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use Session;
use DB;
use Hash;
class DangNhapController extends Controller
{
	public function getDangNhap(){
		return view('backend.dangnhap.dangnhap');
	}
    public function postDangNhapAdmin(Request $request){
    	$username = $request->txtUserA;
    	$password = $request->txtPassA;
    	$login = ['username'=>$username,'password'=>$password];
    	if(Auth::attempt($login)){
    		$checkQuyen = DB::table('users')->select('quyen')->where('username',$username)->first();
    		if($checkQuyen->quyen == 1){
    			Session::put('admin',$username);
    		}else{
    			Session::put('user',$username);
    		}
    		return response()->json([
    			$data = 1
    		],200);
    	}else{
    		return response()->json([
    			$data = 0
    		],200);
    	}
    }
    public function changePass(Request $request)
    {
        $Check = DB::table('users')->where('username','=',$request->username)->get();
        if(count($Check)==0)
        {
            return response()->json([
                $data = 0
            ],200);
        }
        else
        {
            $User = DB::table('users')->where('username',$request->username)->get();
            if(Hash::check($request->password,$User[0]->password))
            {
                DB::table('users')->where('username',$request->username)->update(
                    [
                        'password'=>bcrypt($request->passwordnew)
                    ]
                );
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