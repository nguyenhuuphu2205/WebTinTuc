<?php
/*
 * Lớp controller loại tin để xử lý các yêu cầu của trang admin liên quan đến loại tin
 */
namespace App\Http\Controllers;
use App\LoaiTin;
use Illuminate\Http\Request;
use App\TheLoai;
class LoaiTinController extends Controller
{
    /*
     * Hàm xử lý yêu cầu lấy danh sách loại tin
     * Input:
     * Ouput: view danh sách loại tin và biến chứa tất cả loại tin
     */
    public function getDanhSach(){
        $loaitin = LoaiTin::all();//Lấy về tất cả các loại tin
        return view('admin.loaitin.danhsach',[ 'loaitin' => $loaitin ] );

    }
    /*
     * Hàm xử lý yêu cầu khi có 1 yêu cầu thêm loại tin
     * Input:
     * Output: view thêm loại tin và 1 biến chứa tất cả các thể loại
     */
    public function getThem(){
        $theloai = TheLoai::all();//Lấy về tất cả các thể loại
        return view('admin.loaitin.them',[ 'theloai' => $theloai ] );
    }
    /*
     * Hàm xử lý yêu cầu thêm loại tin được post lên
     * Input:request
     * Output: view thêm loại tin cùng với trạng thái thực hiện
     * Exception: Chưa chọn thể loại, chưa nhập tên loại tin, sql exception
     */
    public function postThem( Request $request ){
        // Kiểm tra thông tin truyền lên
        $this -> validate( $request,
            [
               'sltTheLoai' =>  'required',
                'Ten'       =>  'required|min:3|max:100'
            ],
            [
                'sltTheLoai.required'   =>  'Chưa chọn thể loại',
                'Ten.required'          =>  'Chưa nhập tên loại tin',
                'Ten.min'               =>  'Tên phải từ 3-100 ký tự',
                'Ten.max'               =>  'Tên phải từ 3-100 ký tự'
            ] );
        // Tạo 1 đối tượng loại tin và lưu vào database
        $loaitin = new LoaiTin();
        $loaitin -> idTheLoai = $request -> sltTheLoai;
        $loaitin -> Ten = $request -> Ten;
        $loaitin -> TenKhongDau = changeTitle( $request -> Ten );
        $loaitin -> save();
        return redirect('admin/loaitin/them' ) -> with( 'thongbao','Thêm thành công' );// Redirect đến view thêm cùng với thông báo thành công
    }

    /*
     * Hàm để xử lý yêu cầu xóa 1 loại tin
     * Input : id
     * Output : View danh sách loại tin cùng với thông báo về trạng thái thực hiện
     * Exception : SQL exception
     */
    public function getXoa( $id ){
        $loaitin = LoaiTin::find( $id ); // Tìm loại tin
        if( $loaitin -> delete() )            //Xóa loại tin
            return redirect( 'admin/loaitin/danhsach' ) -> with( 'thongbao','Xóa thành công' );
        else
            redirect( 'admin/loaitin/danhsach' ) -> with( 'thongbao','Xóa không thành công' );
    }

    /*
     * Hàm xử lý khi có yêu cầu sửa 1 loại tin
     * Input : id
     * Output : View sửa loại tin cùng với thông tin của đối tượng loại tin cần sửa
     * Exception : SQL Exception
     */
    public function getSua( $id ){
        //Lấy thông tin của loại tin
        $loaitin = LoaiTin::find( $id );
        //Lấy danh sách thể loại
        $theloai = TheLoai::all();
        return view( 'admin.loaitin.sua',[ 'loaitin' => $loaitin,'theloai' => $theloai ] );
    }

    /*
     * Hàm xử lý yêu cầu sửa 1 loại tin
     * Input : request, id
     * Output : View danh sách loại tin cùng với trạng thái thực hiện
     * Exception : Thiếu tên loại tin, id thể loại, SQL exception
     */
    public function postSua( Request $request,$id ){
        //Kiểm tra thông tin truyền lên
        $this -> validate( $request,
            [
                'sltTheLoai' => 'required',
                'Ten'        => 'required|min:3|max:100'
            ],
            [
                'sltTheLoai.required'   =>  'Chưa chọn thể loai',
                'Ten.required'          =>  'Chưa nhập tên tin tức',
                'Ten.min'               =>  'Tên chỉ từ 3-100 ký tự',
                'Ten.max'               =>  'Tên chỉ từ 3-100 ký tự'
            ] );
        //Lưu thông tin của loại tin vào database
        $loaitin = LoaiTin::find( $id );
        $loaitin -> Ten = $request -> Ten;
        $loaitin -> TenKhongDau = changeTitle( $loaitin -> Ten);
        $loaitin -> idTheLoai = $request -> sltTheLoai;
        $loaitin -> save();
        return redirect( 'admin/loaitin/sua/'.$id ) -> with( 'thongbao','Sửa thành công' );
    }

}
