<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    /*
     * Hàm xử lý yêu cầu thêm silde phương thức get
     * Input :
     * Output : view thêm slide
     * Exception : Không tồn tại view thêm
     */
    public function getThem(){
        return view('admin.slide.them');
    }
    /*
     * Hàm xử lý yêu cầu thêm slide phương thức post
     * Input :  request
     * Output : view thêm slide và trạng thái thực hiện thêm
     * Exception : SQL Exception
     */
    public function postThem(Request $request){
        $this ->validate($request,
            [
                'ten' => 'unique:slide,Ten',
                'hinh'  =>'image',
            ],
            [
                'ten.unique'    =>  'Tên silde đã tồn tại',
                'hinh.image'    =>  'Hình ảnh không hợp lệ',
            ]);
        $slide = new Slide();
        $slide -> Ten = $request -> ten;
        $file = $request -> file('hinh');
        $name = $file ->getClientOriginalName();
        $hinh = str_random(4).$name;
        while(file_exists("upload/slide/$hinh")){
            $hinh = str_random(4).$name;
        }
        $file -> move('upload/slide',$hinh);
        $slide -> Hinh = $hinh;
        $slide -> NoiDung = $request -> noiDung;
        $slide -> link = $request ->link;

        try{
            $slide -> save();
            return redirect('admin/slide/them') -> with('thongbao','Thêm slide thành công');
        }catch (\Exception $e){

            return redirect('admin/slide/them') -> with('thongbao_error',"Thêm slide không thành công ");
        }

    }
    /*
     * Hàm xử lý yêu cầu lấy danh sách slide
     * Input :
     * Output : view danh sách slide
     * Exception : SQL Exception
     */
    public function getDanhSach(){
        $slides = Slide::all();
        return view('admin.slide.danhsach',['slides' => $slides]);
    }
    /*
     * Hàm xử lý yêu cầu xóa 1 slide
     * Input : id
     * Output : view danh sách silde cùng với trạng thái thực hiện
     * Exception : SQL Exception
     */
    public function getXoa($id){
        $slide = Slide::find($id);
        try{
            $slide -> delete();
            return redirect('admin/slide/danhsach') -> with('thongbao', 'Xóa slide thành công');
        }catch (\Exception $e){
            return redirect('admin/slide/danhsach') -> with('thongbao_error', 'Xóa slide không thành công');
        }
    }
    /*
     * Hàm xử lý yêu cầu sửa 1 slide phương thức get
     * Input : id
     * Output : view sửa slide
     * Exception : SQLException
     */
    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }
    /*
     * Hàm xử lý yêu cầu sửa 1 slide phương thức post
     * Input : id, request
     * Output : view sửa và trạng thái thực hiện
     * Exception : SQL Exception
     */
    public function postSua(Request $request, $id){
        //Kiểm tra dữ liệu truyền lên
        $this ->validate($request,
            [
                'ten' => "unique:slide,Ten,$id",
            ],
            [
                'ten.unique'    =>  'Tên silde đã tồn tại',
            ]);
        $slide = Slide::find($id);
        $slide -> Ten = $request -> ten;
        $slide -> NoiDung = $request -> noiDung;
        $slide -> link = $request -> link;
        if($request -> hasFile('hinh')){
            $this -> validate($request,
                [
                   'hinh' => 'image'
                ],
                [
                    'hinh.image' => 'Hình ảnh không hợp lệ'
                ]);
            $file = $request -> file('hinh');
            $name = $file ->getClientOriginalName();
            $hinh = str_random(4).$name;
            while(file_exists("upload/slide/$hinh")){
                $hinh = str_random(4).$name;
            }
            $file -> move('upload/slide',$hinh);
            $slide -> Hinh = $hinh;
        }
        try{
            $slide -> save();
            return redirect('admin/slide/sua/'.$id) -> with('thongbao', 'Sửa slide thành công');
        }catch (\Exception $e){
            return redirect('admin/slide/sua/'.$id) -> with('thongbao_error', 'Sửa slide không thành công');
        }
    }

}
