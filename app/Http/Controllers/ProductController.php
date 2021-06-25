<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return redirect()->back()->withErrors($validator);
        }

        $image = $request->file('image');
        $imageName = uniqid().'.'.$image->extension();
        $image->move(public_path('productimages'),$imageName);
        $product = new Product();
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
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:100',
            'description' => 'required',
            'content' => 'required',
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
            return redirect()->back()->withErrors($validator);
        }

        $product = Product::find($id);
        if($request->file('image') == null){

        }
        else{
            $imagepath = public_path("\productimages\\").$product['image'];
            File::delete($imagepath);
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->extension();
            $image->move(public_path('productimages'),$imageName);
            $product->update([
                'image' => $imageName
            ]);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
            'size' => $request->size,
            'price' => $request->price,
            'saleprice' => $request->saleprice,
            'quantity' => $request->quantity,
            'weight' => $request->weight,
            'length' => $request->length,
            'wide' => $request->wide,
            'height' => $request->height,
        ]);
        session()->put('success','Update Successfully');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/product');
    }
}
