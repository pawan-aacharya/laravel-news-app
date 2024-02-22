<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $title = "Add Category";
        return view('dashboard.admin.category.categories', compact('categories', 'title'));
    }
    public function store(Request $request)
    {

        // dd($request->all());
        // die;
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->slug = Str::slug($request->name);
        $category->name = $request->name;
        $category->save();

        return back();
    }

    public function activeInactive($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'category not found');
        }
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();
        return back();
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'category not found');
        }
        $category->delete();
        return back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.admin.category.editcategory', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => 'required'
        ]);

        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.show');
    }
}
