<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Book;
use App\Comment;
use App\Like;
use DB;

/*if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}*/
class PagesController extends Controller
{
    public function index(){
        $books= Book::latest()->paginate(5);      //get();
        return view('welcome')->with('books',$books);
    }
    public function viewCategory($id){
        $category = Category::find($id);
        $books = $category->books;
        return view('viewcategory')->with(['books'=>$books ,'category'=>$category]);
    }
    public function viewBook($id){
        $book = Book::find($id);
        return view('book')->with('book',$book);

    }
    public function addComment(Request $request , $id){
        $this->validate($request,[
            'comment'=>'required|max:100'
        ]);
        $book = Book::findOrFail($id);
        $coment = new Comment();
        $coment->user_id = auth()->user()->id;
        $coment->book_id = $book->id;
        $coment->comment = $request->input('comment');
        $coment->save();
        alert()->success('Comment Added', 'Done');
        return redirect()->back();
    }
    public function like(Request $request){
        $like_s = $request->like_s;
        $book_id = $request->book_id;
        $change_like = 0;
        $like = DB::table('likes')
        ->where('book_id',$book_id)
        ->where('user_id',Auth::user()->id)->first();
        if(!$like)
        {
            $new_like=new Like;
            $new_like->book_id = $book_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like =1;
            $new_like->save();
            $is_like = 1;
        }
        elseif($like->like ==1){
            DB::table('likes')->where('book_id',$book_id)
            ->where('user_id',Auth::user()->id)->delete();
            $is_like=0;

        }
        elseif($like->like ==0){
            DB::table('likes')->where('book_id',$book_id)
            ->where('user_id',Auth::user()->id)
            ->update(['like' => 1]);
            $is_like=1;
            $change_like = 1;

        }
        $response =array(
            'is_like'=>$is_like,
            'change_like'=>$change_like,
        );
        return response()->json($response , 200);

    }
    public function dislike(Request $request){
        $like_s = $request->like_s;
        $book_id = $request->book_id;
        $change_dislike=0;
        $dislike = DB::table('likes')
        ->where('book_id',$book_id)
        ->where('user_id',Auth::user()->id)->first();
        if(!$dislike)
        {
            $new_like=new Like;
            $new_like->book_id = $book_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like =0;
            $new_like->save();
            $is_dislike = 1;
        }
        elseif($dislike->like ==0){
            DB::table('likes')->where('book_id',$book_id)
            ->where('user_id',Auth::user()->id)->delete();
            $is_dislike=0;

        }
        elseif($dislike->like ==1){
            DB::table('likes')->where('book_id',$book_id)
            ->where('user_id',Auth::user()->id)
            ->update(['like' => 0]);
            $is_dislike=1;
            $change_dislike=1;

        }
        $response =array(
            'is_dislike'=>$is_dislike,
            'change_dislike'=>$change_dislike,
        );
        return response()->json($response , 200);

    }
}
