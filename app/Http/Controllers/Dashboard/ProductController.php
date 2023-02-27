<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '1')->get();
        return view('admin.products.add_product', compact('categories', 'brands', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $validteData = $request->validated();
        $category = Category::findOrFail($validteData['category_id']);
        $product = $category->products()->create($request->except('color', 'color_quantity','status','trending','featured'));
        $product->update([
            'slug' => Str::slug($request->slug),
            'status' => $request->status == "on" ? '1' : '0',
            'trending' => $request->trending == "on" ? '1' : '0',
            'featured' => $request->featured == "on" ? '1' : '0'
        ]);

        if ($request->hasFile('image')) {
            // $uploadPath="admin/";
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $imageFile->move('admin', $filename);
                $finalImagePathName = $filename;
                $product->productImages()->create([
                    'image' => $finalImagePathName,
                    'product_id' => $product->id
                ]);
            }
        }

        if ($request->color) {
            foreach ($request->color as $key => $color) {
                $product->colors()->attach($color, ['color_quantity' => $request->color_quantity[$key]]);
            }
        }

        session()->flash('status', 'Product successfully Added.');
        return redirect(route('dashboard.products.index'));
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
        $products = Product::where('id', $id)->first();
        $product_colors=$products->colors()->pluck('color_id')->toArray();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::whereNotIn('id',$product_colors)->get();

        return view('admin.products.edit_product', compact('products', 'brands', 'categories','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $validteData = $request->validated();
        $productData = Category::findOrFail($validteData['category_id'])
            ->products()->where('id', $id)->first();
        $productData->update($request->all());
        // $productData=->update($request->all());
        $productData->update([
            'slug' => Str::slug($request->slug),
            'status' => $request->status == true ? '1' : '0',
            'trending' => $request->trending == "on" ? '1' : '0',
            'featured' => $request->featured == "on" ? '1' : '0'
        ]);
        if ($request->hasFile('image')) {
            // $uploadPath="admin/";
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $imageFile->move('admin', $filename);
                $finalImagePathName = $filename;
                $productData->productImages()->create([
                    'image' => $finalImagePathName,
                    'product_id' => $productData->id
                ]);
            }
        }

        if ($request->color) {
            foreach ($request->color as $key => $color) {
                $productData->colors()->attach($color, ['color_quantity' => $request->color_quantity[$key]]);
            }
        }

        session()->flash('status', 'Product successfully Updated.');
        return redirect(route('dashboard.products.index'));
    }
    public function removeImage($id)
    {
        $product = ProductImage::findOrFail($id);
        if (File::exists('admin/' . $product->image)) {
            File::delete('admin/' . $product->image);
        }
        $product->delete();
        return redirect()->back();
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
        if ($product->productImages()) {
            foreach ($product->productImages() as $image) {
                if (File::exists('admin/' . $image->image)) {
                    File::delete('admin/' . $image->image);
                }
            }
        }
        $product->delete();
        session()->flash('status', 'Product successfully Deleted.');
        return redirect()->back();
    }
}
