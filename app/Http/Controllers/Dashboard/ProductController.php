<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:products_read'])->only('index');
        $this->middleware(['permission:products_create'])->only('create');
        $this->middleware(['permission:products_update'])->only('edit');
        $this->middleware(['permission:products_delete'])->only('destroy');

    }//end of constructor


    public function index()
    {
        try {
            $products= Product::paginate(5);
            return view('dashboard..page.product.index', compact('products'));
        } catch (\Exception $ex) {
            return $ex;
            toast('هناك خطأ!', 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of index

    public function create()
    {
        try {
            $categories = Category::all();
            $brands = Brand::all();
            return view('dashboard.page.product.create', compact('categories','brands'));
        } catch (\Exception $ex) {
            return $ex;
            toast('error!', 'error');
            return redirect()->route('admin.dashboard');
        }
    }//end of create

    public function store(Request $request)
    {
        //validate
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.*' => 'required'];

        }
        $rules += ['image' => 'image'];
        $rules += ['category_id' => 'required'];
        $rules += ['brand_id' => 'required'];
        $rules += ['stock' => 'required'];
        $rules += ['purchase_price' => 'required','numeric'];
        $rules += ['sale_price' => 'required','numeric'];

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method', 'featured');

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }
        if ($request->featured) {

            $request_data['featured'] = 1;
        }


        $create = Product::create($request_data);
        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('product.index');
        }

        toast('product added successfully!', 'success');
        return redirect()->route('product.index');
    }



    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            $categories = Category::all();
            $brands = Brand::all();
            return view('dashboard.page.product.edit', compact('categories','brands','product'));
        } catch (\Exception $ex) {
            return $ex;
            toast('error!', 'error');
            return redirect()->route('admin.dashboard');
        }
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        //validate
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.*' => 'required'];
        }
        $rules += ['image' => 'image'];
        $rules += ['category_id' => 'required'];
        $rules += ['brand_id' => 'required'];
        $rules += ['stock' => 'required'];
        $rules += ['purchase_price' => 'required','numeric'];
        $rules += ['sale_price' => 'required','numeric'];

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method', 'featured');

        if ($request->image) {

            if ($product->image != 'product.png') {

                Storage::disk('public_uploads')->delete('/product/' . $product->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }
        if ($request->featured) {

            $request_data['featured'] = 1;
        }else{
            $request_data['featured'] = 0;
        }


        $create = $product->update($request_data);
        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('product.index');
        }

        toast('product updated successfully!', 'success');
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        if ($product->image !== 'cat.png') {
            Storage::disk('public_uploads')->delete('/brand/' . $product->image);
        }
        $del = $product->delete();

        if (!$del)
            toast('هناك خطأ الان', 'error');
        toast('تم الحذف بنجاح!', 'success');
        return redirect()->route('product.index');
    }//end of destroy
}
