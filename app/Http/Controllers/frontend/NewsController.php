<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('created_at')->paginate(6);
        $news1 = News::orderByDesc('count')->take(6)->get();
        $categories = Category::get();
        return view('frontend.index', compact('news', 'categories', 'news1'));
    }

    public function singlePost($id)
    {
        $news = News::find($id);
        $news->increment('count');
        $comments = Comment::orderBy('created_at', 'desc')->whereHas('news', function ($query) use ($id) {
            $query->where('id', $id);
        })->paginate(10);
        $totalCommentsCount = Comment::where('news_id', $id)->count();
        $categories = Category::get();
        return view('frontend.pages.single-post', compact('news', 'categories', 'comments', 'totalCommentsCount'));
    }

    public function about()
    {
        $categories = Category::get();
        return view('frontend.pages.about', compact('categories'));
    }

    public function contact()
    {
        $categories = Category::get();
        return view('frontend.pages.contact', compact('categories'));
    }

    public function category($id)
    {
        $categories = Category::get();
        // $news = News::with('category')->whereHas('category', function ($query) use ($id) {
        //     $query->where('id', $id);
        // })->get();
        $news = News::whereHas('category', function ($query) use ($id) {
            $query->where('id', $id);
        })->paginate(6);
        return view('frontend.pages.newsCategory', compact('categories', 'news'));
    }

    public function comment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        // dd($request->all());
        // die;

        $comment = new Comment();

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->news_id = $request->news_id;
        $comment->website = $request->website;
        $comment->save();
        return redirect()->back();
    }
}
