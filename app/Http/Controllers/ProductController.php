<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::with('category', 'sub_category', 'brand')->get();
        if ($request->ajax()) {
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('category_name', function ($products) {
                    return $products->category->title;
                })
                ->addColumn('sub_category_name', function ($products) {
                    return $products->sub_category->title;
                })
                ->addColumn('brand_name', function ($products) {
                    return $products->brand->title;
                })
                ->addColumn('action', function ($products) {
                    // Here you can add any action buttons or links
                    return '<button class="btn btn-primary mx-1 edit-btn" data-product=\'' . json_encode($products) . '\'>Edit</button><button class="btn btn-danger delete-btn" data-product=\'' . json_encode($products) . '\'>Delete</button>';
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.products', compact('categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);
        try {
            $product = new Product();
            $product->sku = $request['sku'];
            $product->price = $request['price'];
            $product->size_no = $request['size_no'];
            $product->new_collection = $request['new_collection'];
            $product->category_id = $request['category_id'];
            $product->sub_categories_id = $request['sub_categories_id'];
            $product->brands_id = $request['brands_id'];
            $product->description = $request['description'];
            $product->seasonability = $request['seasonability'];
            $imageName = time() . '.' . $request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('uploads'), $imageName);
            $product->product_image = $imageName;
            if ($product->save()) {
                // Data saved successfully, return a success response

                return response()->json(['status' => true, 'message' => 'Data saved successfully'], 200);
            } else {
                // Data saving failed, return an error response
                return response()->json(['status' => false, 'message' => 'Failed to save data'], 500);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the single product detail.
     */

    public function singleProduct($id)
    {
        $product = Product::with('category', 'sub_category', 'brand')->findOrFail($id);
        return view('single-product', compact('product'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::all();
        $categoriesProduct = Category::with('products')->get();
        return view('index', compact('products' ,'categoriesProduct' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->sku = $request['sku'];
        $product->price = $request['price'];
        $product->size_no = $request['size_no'];
        $product->new_collection = $request['new_collection'];
        $product->category_id = $request['category_id'];
        $product->sub_categories_id = $request['sub_categories_id'];
        $product->brands_id = $request['brands_id'];
        $product->description = $request['description'];
        $product->seasonability = $request['seasonability'];
        $product->sale = $request['sale'];
        $product->discount = $request['discount'];

        if ($request->has('previuos_image')) {
            $product->product_image = $request['previuos_image'];
        } else {
            $request->validate([
                'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            ]);
            $imageName = time() . '.' . $request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('uploads'), $imageName);
            $product->product_image = $imageName;
        }

        if ($product->update()) {
            return response()->json(['status' => true, 'message' => 'Data updated successfully'], 200);
        } else {
            // Data saving failed, return an error response
            return response()->json(['status' => false, 'message' => 'Failed to save data'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['status' => true, 'message' => 'Sub Category deleted successfully'], 200);
    }
}
