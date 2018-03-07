<?php
// Class xử lý các yêu cầu của trang admin liên quan đến quản lý User
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /*
     * Hàm xử lý yêu cầu lấy danh sách user
     * Input :
     * Output : View danh sách user và 1 biến lưu danh sách user
     * Exception : SQL exception
     */
    public function getDanhSach(){
        $user = User::all(); // Lấy tất các các user
        return view( 'admin.user.danhsach',[ 'user' => $user ] );

    }
    /*
     * Hàm xử lý yêu cầu lấy view user
     * Input :
     * Output : View thêm user để quản trị viên thêm 1 user
     * Exception :
     */
    public function getThem(){
        return view( 'admin.user.them' );
    }

    /*
     * Hàm xử lý yêu cầu thêm user
     * Input : request
     * Output : View thêm user và sesstion thông báo trạng thái thực hiện
     * Exception : Thiếu tên, thiếu email, thiếu password, password không khớp, SQL exception
     */
    public function postThem( Request $request ){
        // Kiểm tra dữ liệu truyền lên
        $this -> validate( $request,
            [
               'ten'            =>      'required|min:3|max:100',
               'email'          =>      'required|email|unique:users,email',
                'password'      =>      'required|min:8|max:100',
                'passwordAgain' =>      'required|same:password',
            ],
            [
                'ten.required'      =>      'Chưa nhập tên',
                'ten.min'           =>      'Tên phải từ 3-100 ký tự',
                'ten.max'           =>      'Tên phải từ 3-100 ký tự',
                'email.required'    =>      'Chưa nhập email',
                'email.email'       =>      'Email không hợp lệ',
                'email.unique'      =>      'Email đã bị trùng',
                'password.min'      =>      'Password từ 8-100 ký tự',
                'password.max'      =>      'Password từ 8-100 ký tự',
                'passwordAgain.same' =>      'Password không khớp'

            ]);
        // Lưu thông tin user vào database
        $user = new User();
        $user -> name = $request -> ten;
        $user -> email = $request -> email;
        $user ->password = bcrypt( $request -> password );
        $user -> quyen = (int)$request -> quyen;
        $user -> save();
        return redirect( 'admin/user/them' ) -> with( 'thongbao','Thêm user thành công' );

    }
    /*
     * Hàm xử lý yêu cầu xóa user
     * Input : id
     * Output : View danh sách user cùng thông báo về trạng thái thực hiện
     * Exception : SQL Exception
     */
    public function getXoa( $id ){
        $user = User::find( $id );
        try{
            $user -> delete();
            return redirect( 'admin/user/danhsach' ) -> with( 'thongbao','Xóa thành công' );
        }catch (\Exception $e){
            return redirect( 'admin/user/danhsach' ) -> with( 'error','Xóa không thành công ' );
        }
    }
    /*
     * Hàm xử lý yêu cầu lấy thông tin sửa thông tin user
     *Input : id
     *Output : View sửa thông tin user
     *Exception : SQL Exception
     */
    public function getSua($id){
        $user = User::find( $id );
        return view('admin.user.sua',['user' => $user ]);
    }
    /*
     * Hàm xử lý yêu cầu thay đổi thông tin của user
     * Input : id, request
     * Output : Thông báo trạng thái thực hiện của việc thay đổi thông tin user
     * Exception : SQL Exception
     */
    public function postSua($id, Request $request)
    {
         if ($request -> changePassword1 == 'on'){
             $this->validate($request,
                 [
                     'password'=>'required|min:8|max:100',
                     'passwordAgain'=>'required|same:password',
                 ],
                 [
                    'password.required' => 'Chưa nhập password',
                     'password.min'     => 'Password phài từ 8-100 ký tự',
                     'password.max'     => 'Password phải từ 8-100 ký tự',
                     'passwordAgain.required' => 'Chưa nhập lại password',
                     'passwordAgain.same' => 'Password không khớp',
                 ]);

         }
         $user = User::find($id);
         $user -> quyen = $request -> quyen;
         $user -> password = bcrypt($request -> password);
         $user ->save();
         return redirect('admin/user/sua/'.$id) -> with('thongbao','Sửa thành công');
    }
    /*
     * Hàm xử lý yêu cầu đăng nhập trang admin phương thức get
     * Input :
     * Output : view đăng nhập admin
     * Exception :
     */
    public function getDangNhap(){
        return view('admin.login');
    }
    /*
     * Hàm xử lý yêu cầu đăng nhập trang admin phương thức post
     * Input : request
     * Output : view admin/theloai/danhsach
     * Exception : SQL Exception
     */
    public function postDangNhap(Request $request){
        $this -> validate($request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Chưa nhập email',
                'email.email'   => 'Email không hợp lệ',
                'password.required' => 'Password không hợp lệ',
            ]);
        if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password])){
            return redirect('admin/theloai/danhsach');
        }else{
            return redirect('admin/dangnhap')->with('thongbao_error','Email hoặc password không đúng');
        }

    }
    /*
     * Hàm xử lý yêu cầu logout
     * Input :
     * Output : view login
     * Exception : SQL Exception
     */
    public function logout(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }




}
