<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
        $theLoai = TheLoai::find($idTheLoai);
        $loaiTin= $theLoai->loaitin;
        foreach ($loaiTin as $lt){
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }
    public function getTimKiemTinTuc($tukhoa){
          $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")-> orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(30)->get();
        return view('front_end.timkiem',['tintuc'=>$tintuc]);

    }
    public function postBinhLuan(Request $request, $id){
        //Kiểm tra kiểu dữ liệu truyền lên
        $this-> validate($request,
            [
                'noiDung'   =>  'required|min:3|max:100'
            ],
            [
                'noiDung.required'  =>  'Chưa nhập nội dung bình luận',
                'noiDung.min'       =>  'Nội dung bình luận tối thiểu 3 kí tự',
                'noiDung.max'       =>  'Nội dung bình luận tối đa 100 ký tự'
            ]);
        $comment =  new Comment();
        $comment -> NoiDung =   $request -> noiDung;
        $comment -> idUser  =   Auth::user()->id;
        $comment ->idTinTuc =  $id;
        $comment -> save();
        $comments= Comment::where('idTinTuc','=',$id)->orderBy('created_at','desc')->get();
        return view('front_end.comment',['comment'=>$comments]);
    }

}
