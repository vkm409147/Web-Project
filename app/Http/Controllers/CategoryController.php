<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function delete($id)
    {
        Category::where('catID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function CategoryList()
    {
        $cat = Category::get();
        return view('admin.category-lits', compact('cat'));
    }
    public function categorysave(Request $request)
    {
        $category = new Category();
        $category->catID = $request->id;
        $category->catName = $request->name;
        $category->catDescriptions = $request->descriptions;
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function categoryedit($id)
    {
        $cat = Category::where('catID', '=', $id)->first();
        return view('admin.category-edit', compact('cat'));
    }

    public function Categoryupdate(Request $request)
    {
        Category::where('catID', '=', $request->id)->update([
            'catName'=> $request->name,
            'catDescriptions'=> $request->descriptions,
        ]);
        return redirect()->back()->with('success', 'Category updated successfully!');
    }
}
