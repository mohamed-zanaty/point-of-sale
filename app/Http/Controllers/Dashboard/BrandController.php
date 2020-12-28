<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
Use Alert;


class BrandController extends Controller
{


    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:brands_read'])->only('index');
        $this->middleware(['permission:brands_create'])->only('create');
        $this->middleware(['permission:brands_update'])->only('edit');
        $this->middleware(['permission:brands_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        try {
        $brands = Brand::paginate(5);
        return view('dashboard..page.brand.index', compact('brands'));
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
            return view('dashboard..page.brand.create', compact('categories'));
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
            $rules += [$locale . '.name' => [Rule::unique('brand_translations')]];
        }
        $rules += ['image' => 'image'];
        $rules += ['category_id' => 'required'];

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method');

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/brand/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $create = Brand::create($request_data);
        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('brand.index');
        }

        toast('brand added successfully!', 'success');
        return redirect()->route('brand.index');
    }//end of store


    public function edit($id)
    {
        try {

            $brand = Brand::findOrFail($id);
            $categories = Category::all();
            return view('dashboard.page.brand.edit', compact('brand', 'categories'));

        } catch (\Exception $ex) {
            toast('sorry!', 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of edit

    public function update(Request $request, $id)
    {

        $brand = Brand::findOrFail($id);
        //validate

        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.*' => 'required'];

            $rules += [$locale . '.name' => [Rule::unique('brand_translations', 'name')->ignore($brand->id, 'brand_id'),]];
        }
        $rules += ['image' => 'image'];
        $rules += ['category_id' => 'required'];

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method');

        if ($request->image) {
            if ($brand->image != 'brand.png') {

                Storage::disk('public_uploads')->delete('/brand/' . $brand->image);

            }//end of inner if
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/brand/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

       $create = $brand->update($request_data);

        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('brand.index');
        }

        toast('brand updated successfully!', 'success');
        return redirect()->route('brand.index');
    }//end of update


    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->image !== 'cat.png') {
            Storage::disk('public_uploads')->delete('/brand/' . $brand->image);
        }
        $del = $brand->delete();
        if (!$del)
            toast('هناك خطأ الان', 'error');


        toast('تم الحذف بنجاح!', 'success');
        return redirect()->route('brand.index');
    }//end of destroy
}
