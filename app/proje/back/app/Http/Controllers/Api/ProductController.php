<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        return Product::select('id', 'name', 'picture')->get();
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            ['name' => 'required', 'picture' => 'required|mimes:jpeg,jpg,png'],
            [
                'name.required'    => 'İsim alanı Boş olamaz...',
                'picture.required' => 'Resim alanı Boş olamaz...',
                'picture.mimes'    => 'Resim uzatınız (jpeg,jpg,png) olmalıdır...'
            ]
        );

        if ($validate->fails()) {
            return response()->json([$validate->errors()], 400);
        }
        $filename = date('YmdHi') . '-' . $request->file('picture')->getClientOriginalName();
        $request->file('picture')->move(public_path('image'), $filename);
        $data = new Product();
        $data->name   = $request->name;
        $data->picture =  $filename;
        $data->save();
        return response()->json(['message' => 'Kayıt işlemi başarıyla gerçekleştirildi.']);
    }

    public function show(Product $product)
    {
        return $product;
    }


    public function update(Request $request, Product $product)
    {
        $validate = Validator::make(
            $request->all(),
            ['name' => 'required', 'picture' => 'nullable|mimes:jpeg,jpg,png'],
            [
                'name.required'    => 'İsim alanı Boş olamaz...',
                'picture.mimes'    => 'Resim uzatınız (jpeg,jpg,png) olmalıdır...'
            ]
        );

        if ($validate->fails()) {
            return response()->json([$validate->errors()], 400);
        }
        if ($request->has('picture')) {
            $imagePath = public_path('image/' . $product->picture);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $filename = date('YmdHi') . '-' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('image'), $filename);
        } else {
            $filename = $product->picture;
        }

        $product->name   = $request->name;
        $product->picture =  $filename;
        $product->save();
        return response()->json(['message' => 'Kayıt işlemi başarıyla Güncellendi.']);
    }


    public function destroy(Product $product)
    {
        $imagePath = public_path('image/' . $product->picture);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        return response()->json(['message' => 'Kayıt işlemi başarıyla silindi.']);
    }
}
