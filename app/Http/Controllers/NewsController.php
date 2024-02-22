<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class NewsController extends Controller
{
    public function dashboard(){
       $userCount=User::count();
       $categoryCount=Category::count();
       $newsCount=News::count();
       return view('dashboard.admin.index',compact('userCount', 'categoryCount', 'newsCount'));
    }
    public function index()
    {
        $events = News::get();
        return view('dashboard.admin.event.events', compact('events'));
    }

    public function create()
    {
        $category = Category::where('status', true)->get();
        return view('dashboard.admin.event.createEvent', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "content" => "required",
            "category" => "required",
            "author" => "required",
            "published_date" => "required",
        ]);
        // dd($request->all());
        // die;

        $image = $request->file('image');

        if ($image) {
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/events'), $image_new_name);

            $event = new News();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->content = $request->content;
            $event->author = $request->author;
            $event->published_date = $request->published_date;
            $event->image = $image_new_name;
            $event->slug = Str::slug($request->title);
            $event->category_id = $request->category;

            $event->save();
            return redirect()->route('events');
        } else {
            echo "image not found.";
        }
    }

    public function edit($id)
    {
        $event = News::find($id);
        $category = Category::where('status', true)->get();
        return view('dashboard.admin.event.editEvent', compact('event', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            // "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "content" => "required",
            "category" => "required",
            "author" => "required",
            "published_date" => "required",
        ]);

        // dd($request->all());
        // die;
        $event = News::find($id);

        if ($event) {
            $event->title = $request->title;
            $event->description = $request->description;
            $event->content = $request->content;
            $event->published_date = $request->published_date;
            $event->author = $request->author;
            $event->slug = Str::slug($request->title);
            $event->category_id = $request->category;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_New_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/events'), $image_New_name);

                if (fileExists(public_path('/events/' . $event->image))) {
                    unlink(public_path('/events/' . $event->image));
                }

                $event->image = $image_New_name;
            }
            $event->save();
            return redirect()->route('events');
        }
    }

    public function delete($id)
    {
        $event = News::find($id);
        $event->delete();
        return redirect()->back();
    }

    public function view($id)
    {
        $event = News::find($id);
        return view('dashboard.admin.event.eventView', compact('event'));
    }
}
