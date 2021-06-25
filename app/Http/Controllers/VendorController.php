<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class VendorController extends Controller
{
    public function vendor(){
        $vendorid = Auth::user()->id;
        $products = Product::where(['vendor_id'=>$vendorid])->paginate(10);
        return view('vendor.index',['products'=>$products]);
    }

    public function addproduct(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:100',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'size' => 'numeric|required',
            'price' => 'numeric|required',
            'saleprice' => 'numeric|required',
            'quantity' => 'numeric|required',
            'weight' => 'numeric|required',
            'length' => 'numeric|required',
            'wide' => 'numeric|required',
            'height' => 'numeric|required',
        ]);

        if($validator->fails()) {
            session()->put('fail','All Field Required');
            return redirect('/addproduct')->withErrors($validator);
        }

        $image = $request->file('image');
        $imageName = uniqid().'.'.$image->extension();
        $image->move(public_path('productimages'),$imageName);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->image = $imageName; 
        $product->size = $request->size;
        $product->price = $request->price;
        $product->saleprice = $request->saleprice;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->length = $request->length;
        $product->wide = $request->wide;
        $product->height = $request->height;
        $product->vendor_id = Auth::user()->id;
        $product->save();
        session()->put('success','Created Successfully');
        return redirect('/vendor');
    }
}
