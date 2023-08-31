<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {        
        $data = Product::get(); // ~ select * from products 
        return view('product-list', compact('data'));
    }

    public function productList()
    {
        $pro = Product::get();
        return view('admin.product-list', compact('pro'));
    }

    
    public function delete($id)
    {
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function productedit($id)
    {
        $cat = Category::get();
        $pro = Product::where('productID', '=', $id)->first();
        return view('admin.product-edit', compact('pro', 'cat'));
    }

    public function Productupdate(Request $request)
    {
        $image = $request->new_image == "" ? $request->old_image : $request->new_image;
        Product::where('productID', '=', $request->id)->update([
            'productName'=> $request->name,
            'productPrice'=> $request->price,
            'productDetails'=> $request->details,
            'productImage'=> $image,
            'catID'=> $request->category
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    public function productsave(Request $request)
    {
        $product = new Product();
        $product->productID = $request->id;
        $product->productName = $request->name;
        $product->productPrice = $request->price;
        $product->productDetails = $request->details;
        $product->productImage = $request->image;
        $product->catID = $request->category;
        $product->ManuID = $request->manufacturer;
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}