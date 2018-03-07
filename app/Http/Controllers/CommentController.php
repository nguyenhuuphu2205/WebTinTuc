<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function getXoa($id){
        $comment = Comment::find($id);
        try{
            $comment ->delete();
            return redirect('admin/tintuc/sua/'.$comment->tintuc->id)->with('thongbaocomment','Xóa comment thành công');
        }catch (\Exception $e){
            return redirect('admin/tintuc/sua/'.$comment->tintuc->id)->with('thongbaocomment','Xóa comment không thành công');
        }
    }
}
