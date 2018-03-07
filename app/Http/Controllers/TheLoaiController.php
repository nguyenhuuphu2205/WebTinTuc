<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
        $theloai=TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100'
            ],
            [
                'Ten.required'=>'Chưa nhập tên',
                'Ten.min'=>'Tên phải từ 3-100 ký tự',
                'Ten.max'=>'Tên phải từ 3-100 ký tự',
            ]);
        $theloai=new TheLoai();
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau = changeTitle("a");
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','thanhcong');
    }
    public function getXoa($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getSua($id){
        $theloai=TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100',
            ],
            [
                'Ten.required'=>'Chưa nhập tên thể loại',
                'Ten.min'=>'Tên phải từ 3-100 ký tự',
                'Ten.max'=>'Tên phải từ 3-100 ký tự',
            ]);
        $theloai=TheLoai::find($id);
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau=changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công');
    }
}
