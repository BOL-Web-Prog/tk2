<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;

class ProductCRUDController extends Controller
{
    public function index()
    {
        $data['products'] = Product::orderBy('products_id','desc')->paginate(10);
        return view('products.index',$data);
    }

    public function products_dashboard()
    {
        echo "BERHASIL";
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'products_name' =>'required',
            'products_description' =>'required',
            'products_base_price' => 'required',
            'products_selling_price' => 'required',
            'products_images'=>'required'
        ]);

        $Product = new Product;
        $Product->products_name = $request->products_name;
        $Product->products_description = $request->products_description;
        $Product->products_base_price = $request->products_base_price;
        $Product->products_selling_price = $request->products_selling_price;
        $Product->products_images = $request->products_images;
        $Product->save();
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('products.index');

    }
}
