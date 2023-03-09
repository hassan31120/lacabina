<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use App\Models\Product_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::where('is_special', 0)->paginate(10);
        if (count($products) > 0) {
            return ProductsResource::collection($products);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such products'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'amount' => 'required',
            'old_price' => 'required',
            'new_price' => 'required',
            'sub_id' => 'required',
        ]);

        $data = $request->all();
        $product = Product::create($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $file = $image;
                $path = 'storage/products/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                Product_Image::create([
                    'product_id' => $product->id,
                    'image' => $name
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'product has been added successfully'
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'success' => true,
                'product' => new ProductsResource($product)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such product'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $request->validate([
                'title' => 'required',
                'title_en' => 'required',
                'description' => 'required',
                'description_en' => 'required',
                'amount' => 'required',
                'old_price' => 'required',
                'new_price' => 'required',
                'sub_id' => 'required',
            ]);

            $data = $request->all();

            $product->update($data);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $file = $image;
                    $path = 'storage/products/' . date('Y') . '/' . date('m') . '/';
                    $name = $path . time() . '-' . $file->getClientOriginalName();
                    $file->move($path, $name);
                    Product_Image::create([
                        'product_id' => $product->id,
                        'image' => $name
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'product has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such product'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'product has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such product'
            ], 404);
        }
    }

    public function delImage($id)
    {
        $product = Product_Image::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'product has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such product'
            ], 404);
        }
    }
}
