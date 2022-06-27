<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;

class ProductCRUDController extends Controller
{
    public function productList()
        {
            $data['title'] = 'Data Produk';
            $data['meta'] = 'Product';
            $data['list'] = Product::orderBy('id','desc')->paginate(10);
            return view('products/productList', $data);    
        }

    public function productAdd(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:tbl_product',
            'description' =>'required',
            'basePrice' => 'required',
            'sellingPrice' => 'required',
            'images'=>'required|file|image|mimes:jpeg,png,jpg'
        ]);

        $file_foto = $request->file('images');
        $nama_file_foto = time()."_".$file_foto->getClientOriginalName();
        $tujuan_upload_foto = 'foto_produk/';
		$file_foto->move($tujuan_upload_foto,$nama_file_foto);

        $Product = new Product([
        'name' => $request->name,
        'description'=> $request->description,
        'basePrice' => $request->basePrice,
        'sellingPrice' => $request->sellingPrice,
        'images' => $nama_file_foto
        ]);
        $Product->save();
        return redirect()->intended('productList')->with('success', 'Data produk berhasil ditambahkan');

    }

    public function productUpdate(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'basePrice' => 'required',
            'sellingPrice' => 'required',
            'images'=>'file|image|mimes:jpeg,png,jpg'
        ]);
        if($request->hasFile('images')){
        $file_foto = $request->file('images');
        $nama_file_foto = time()."_".$file_foto->getClientOriginalName();
        $tujuan_upload_foto = 'foto_produk/';
		$file_foto->move($tujuan_upload_foto,$nama_file_foto);
        }else{
            $nama_file_foto = "";
        }

        $update = Product::find($request->id);
        $update->name = $request->name;
        $update->description = $request->description;
        $update->basePrice = $request->basePrice;
        $update->sellingPrice = $request->sellingPrice;
        if($nama_file_foto==""){}else{
        $update->images = $nama_file_foto;
        }
        $update->save();
        return redirect()->intended('productList')->with('success', 'Data produk berhasil diupdate');
    }

    public function productDelete($id)
    {
        $user=Product::find($id);
        $user->delete();
        return redirect()->intended('productList')->with('success', 'Data produk berhasil dihapus');

    }
}
