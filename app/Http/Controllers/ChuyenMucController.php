<?php

namespace App\Http\Controllers;

use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class ChuyenMucController extends Controller
{

    public function getData()
    {
        $chuyen_muc = ChuyenMuc::all();
        return response()->json([
            "status" => 1,
            "abc" => $chuyen_muc
        ]);
    }

    public function themMoi(Request $request){
        $check = ChuyenMuc::create([
            "ten_chuyen_muc" => $request->ten_chuyen_muc,
            "slug_chuyen_muc" => $request->slug_chuyen_muc,
            "tinh_trang" => 1
        ]);

        if($check == true){
            return response()->json([
                "status" => 1,
                "message" => "Bạn đã thêm mới thành công!"
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Thêm mới chuyên mục thất bại!"
            ]);
        }
    }
}
