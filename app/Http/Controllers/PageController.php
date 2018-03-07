<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Slide;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;

class PageController extends Controller
{
    public function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        View::share('slide',$slide);
        View::share('theloai',$theloai);
    }

    public function getTrangChu(){
        return view('front_end.trangchu');
    }
    public function getLoaiTin($id){
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('front_end.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function getTinTuc($id){
        $tintuc = TinTuc::find($id);
        $tintuc -> SoLuotXem = $tintuc ->SoLuotXem +1;
        $tintuc -> save();
        $comment = Comment::where('idTinTuc',$tintuc->id)->orderBy('created_at','desc')->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->inRandomOrder()->take(4)->get();
        $tinnoibat = TinTuc::where('NoiBat','1')->inRandomOrder()->take(4)->get();
        return view('front_end.tintuc',['tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan,'tinnoibat'=>$tinnoibat,'comment'=>$comment]);
    }
    public function getLienHe(){
        return view('front_end.lienhe');
    }
    public function getGioiThieu(){
        return view('front_end.gioithieu');
    }
    public function getDangNhap(){
        return view('front_end.dangnhap');
    }
    public function postDangNhap(Request $request){
        $this ->validate($request,
            [
                'email' =>  'required|email',
                'password'  =>  'required'
            ],
            [
                'email.required'    =>  'Chưa nhập email',
                'email.email'       =>  'Email không hơp lệ',
                'password.required' =>  'Chưa nhập password'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao_error','Email hoặc password không hợp lệ');
        }

    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    public function getDangKy(){
        return view('front_end.dangky');
    }
    public function postDangKy(Request $request){
        //Kiểm tra dữ liệu truyền lên
        $this->validate($request,
            [
                'name'  => 'required',
                'email' => 'required|unique:users,email',
                'password'  => 'required|min:8',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'name.required' =>  'Chưa nhập tên',
                'email.required'    =>  'Chưa nhập email',
                'email.email'       =>  'Email không hợp lệ',
                'password.required' =>  'Chưa nhập password',
                'password.min'      =>  'Password phải lớn hơn 8 ký tự',
                'passwordAgain.required'    =>  'Chưa nhập lại password',
                'passwordAgain.same'    =>  'Password không khớp',
            ]);
        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> quyen = 0;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return redirect('dangky')-> with('thongbao','Đăng ký thành công');
    }
    public function getNguoiDung(){
        $user_login = Auth::user();
        return view('front_end.nguoidung',['user_login'=>$user_login]);
    }
    public function postNguoiDung(Request $request){
        //Kiểm tra dữ liệu truyền lên
        $this -> validate($request,
            [
               'name' => 'required|min:6',
            ],
            [
                'name.required' =>  'Chưa nhập tên',
                'name.min'      => 'Tên tối thiểu phải 6 ký tự'
            ]);
        $user = Auth::user();
        $user -> name = $request -> name;
        if($request -> checkboxPassword == 'on'){
            $this -> validate($request,
                [
                    'password' =>  'required|min:8',
                    'passwordAgain' => 'required|same:password',
                ],
                [
                    'password.required' =>  'Chưa nhập password',
                    'password.min'      =>  'Password phải từ 6 ký tự',
                    'passwordAgain.required'    =>  'Chưa nhập lại password',
                    'passwordAgain.same'        =>  'Password không khớp',
                ]);
            $user -> password = bcrypt($request ->password);
        }
        $user -> save();
        return redirect('nguoidung') -> with('thongbao','Thay đổi thông tin thành công');
    }
    public function postBinhLuan(Request $request,$id){
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
        return redirect('tintuc/'.$id)->with('thongbao','Bình luận thành công');
    }
}
