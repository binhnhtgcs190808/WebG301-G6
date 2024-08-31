<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public  function catAdmin()
    {

        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function catStore(Request $request)
    {

        $cat = new Category();
        $cat->catName = $request->name;
        $cat->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function catUpdate(Request $request)
    {

        Category::where('catID', '=', $request->id)->update([
            'catName' => $request->name
        ]);
        return redirect()->back()->with('success', 'Category update successfully!');
    }

    public function catEdit($id)
    {
        $data = Category::where('catID', '=', $id)->first();
        return view('admin/categoryEdit', compact('data'));
    }

    public function catDelete($id)
    {
        $data = Category::where('catID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
