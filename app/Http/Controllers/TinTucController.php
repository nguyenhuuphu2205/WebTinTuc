<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use App\Comment;
//Clas xử lý các yêu cầu liêu quan đến quản lý tin tức ở trang admin
class TinTucController extends Controller
{
    /*
     * Hàm lấy danh sách tin tức trả về cho view
     * Input :
     * Output : view danh sách tin tin tức và danh sách các tin
     * Exception : SQL Exception
     */
    public function getDanhSach(){
        $tintucs = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintucs' => $tintucs]);
    }
    /*
     * Hàm trả xử lý yêu cầu thêm tin tức
     * Input :
     * Output : view thêm tin tức
     * Exception :
     */
    public function getThem(){
        $theloai = TheLoai::all();
        $loaitin = TheLoai::first()->loaitin;
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    /*
     * Hàm trả xử lý yêu cầu thêm tin tức phương thức post
     * Input : Request
     * Output : view thêm tin tức và thông báo xem đã thêm thành công hay chưa
     * Exception : SQL Exception
     */
    public function postThem(Request $request){
        // Kiểm tra dữ liệu truyền lên
        $this->validate($request,
            [
                'loaiTin'   =>  'required',
                'tieuDe'    =>  'required|min:10|max:500',
                'tomTat'    =>  'required|min:10|max:500',
                'noiDung'   =>  'required|min:10|max:500',
                'hinh'      =>  'required|image'

            ],
            [
                'loaiTin.required'  =>  'Chưa chọn loại tin',
                'tieuDe.required'   =>  'Chưa nhập tiêu đề',
                'tieuDe.min'        =>  'Tiều đề từ 10-500 ký tự',
                'tieuDe.max'        =>  'Tiều đề từ 10-500 ký tự',
                'tomTat.required'   =>  'Chưa nhập tóm tắt',
                'tomTat.min'        =>  'Tóm tắt từ 10-500 ký tự',
                'tomTat.max'        =>  'Tóm tắt từ 10-500 ký tự',
                'noiDung.required'  =>  'Chưa nhập nội dung',
                'noiDung.min'       =>  'Nội dung từ 10-500 ký tự',
                'noiDung.max'       =>  'Nội dung từ 10-500 ký tự',
                'hinh.required'     =>  'Chưa chọn hình ảnh',
                'hinh.image'        =>  'Hình không hợp lệ',
            ]);
        $tintuc = new TinTuc();
        $tintuc -> TieuDe = $request -> tieuDe;
        $tintuc -> TieuDeKhongDau = changeTitle($request -> tieuDe);
        $tintuc -> TomTat = $request -> tomTat;
        $tintuc -> NoiDung = $request -> noiDung;
        $file = $request -> file('hinh');
        $name = $file -> getClientOriginalName();
        $hinh = str_random(4).$name;
        if(file_exists('upload/tintuc/'.$hinh)){
            $hinh = str_random(4).$name;
        }
        $file -> move('upload/tintuc',$hinh);
        $tintuc -> Hinh = $hinh;
        $tintuc -> SoLuotXem = 0;
        $tintuc -> NoiBat = $request -> noiBat;
        $tintuc -> idLoaiTin = $request -> loaiTin;
        $tintuc ->save();
        return redirect('admin/tintuc/them') -> with('thongbao','Thêm thành công');
    }
    /*
    * Hàm trả xử lý yêu cầu xóa 1 tin tức
    * Input : id
    * Output : view danh sách tin tức cùng với trạng thái đã xóa thành công hay chưa
    * Exception : SQL Exception
    */
    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        try{
            $tintuc->delete();
            return redirect('admin/tintuc/danhsach')-> with('thongbao','Xóa thành công');

        }catch(\Exception $e ){
            return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa không thành công');
        }

    }
        /*
       * Hàm trả xử lý yêu cầu sửa 1 tin tức phương thức get
       * Input : id
       * Output : view sửa tin tức
       * Exception : SQL Exception
       */
        public function getSua($id){
            $theloai = TheLoai::all();
            $tintuc = TinTuc::find($id);
            $loaitin = $tintuc ->loaitin -> theloai ->loaitin;
            return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
        }

        /*
        * Hàm trả xử lý yêu cầu sửa 1 tin tức phương thức post
        * Input : id, request
        * Output : View sửa tin tức và trạng thái thực hiện
        * Exception : SQL Exception
        */
        public function postSua($id,Request $request){
            //Kiểm tra dữ liệu truyền lên request
            $this->validate($request,
                [
                    'loaiTin'   =>  'required',
                    'tieuDe'    =>  "required|min:10|max:500|unique:tintuc,TieuDe,$id",
                    'tomTat'    =>  'required|min:10|max:500',
                    'noiDung'   =>  'required|min:10|max:500',

                ],
                [
                    'loaiTin.required'  =>  'Chưa chọn loại tin',
                    'tieuDe.required'   =>  'Chưa nhập tiêu đề',
                    'tieuDe.min'        =>  'Tiều đề từ 10-500 ký tự',
                    'tieuDe.max'        =>  'Tiều đề từ 10-500 ký tự',
                    'tieuDe.unique'     => 'Tiêu đề đã tồn tại',
                    'tomTat.required'   =>  'Chưa nhập tóm tắt',
                    'tomTat.min'        =>  'Tóm tắt từ 10-500 ký tự',
                    'tomTat.max'        =>  'Tóm tắt từ 10-500 ký tự',
                    'noiDung.required'  =>  'Chưa nhập nội dung',
                    'noiDung.min'       =>  'Nội dung từ 10-500 ký tự',
                    'noiDung.max'       =>  'Nội dung từ 10-500 ký tự',
                ]);
            $tintuc = TinTuc::find($id);
            $tintuc -> idLoaiTin = $request ->loaiTin;
            $tintuc -> TieuDe   = $request ->tieuDe;
            $tintuc -> TomTat   = $request -> tomTat;
            $tintuc -> NoiDung  = $request -> noiDung;
            $tintuc -> NoiBat   =$request -> noiBat;
            if($request ->hasFile('hinh')){
                $this ->validate($request,
                    [
                        'hinh'  =>  'image'
                    ],
                    [
                        'hinh.image'    =>  'Hình ảnh không hợp lệ',
                    ]);
                $file =$request ->file('hinh');
                $name = $file -> getClientOriginalName();
                $hinh = str_random(4).$name;
                while (file_exists("upload/tintuc/$hinh")){
                    $hinh = str_random(4).$name;
                }
                $file ->move('upload/tintuc',$hinh);
                $tintuc->Hinh = $hinh;

            }
            $tintuc ->save();
            return redirect("admin/tintuc/sua/$id")-> with('thongbao','Sửa thành công');

        }


}
