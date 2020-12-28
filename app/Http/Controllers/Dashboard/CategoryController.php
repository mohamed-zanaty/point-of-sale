<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{


    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:categories_read'])->only('index');
        $this->middleware(['permission:categories_create'])->only('create');
        $this->middleware(['permission:categories_update'])->only('edit');
        $this->middleware(['permission:categories_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        try {
            $categories = Category::paginate(5);
            return view('dashboard..page.category.index', compact('categories'));
        } catch (\Exception $ex) {
            return $ex;
            toast('هناك خطأ!', 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of index


    public function create()
    {
        try {
            return view('dashboard..page.category.create');
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
            $rules += ['image' => 'image'];
            $rules += [$locale . '.name' => [Rule::unique('category_translations')]];

        }

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method');

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/category/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $create = Category::create($request_data);
        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('category.index');
        }

        toast('category added successfully!', 'success');
        return redirect()->route('category.index');


    }//end of store


    public function edit($id)
    {
        try {

            $category = Category::findOrFail($id);
            return view('dashboard..page.category.edit', compact('category'));

        } catch (\Exception $ex) {
            toast('sorry!', 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of edit


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        //validate
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.*' => 'required'];
            $rules += ['image' => 'image'];
            $rules += [$locale . '.name' => [Rule::unique('category_translations','name')->ignore($category->id, 'category_id'),]];
        }

        $request->validate($rules);

        $request_data = $request->except(['_token', '_method', 'image']);


        if ($request->image) {

            if ($category->image != 'cat.png') {

                Storage::disk('public_uploads')->delete('/category/' . $category->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/category/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of external if

        $create = $category->update($request_data);
        if (!$create){
            toast('هناك خطأ!', 'error');
        }

        toast('تم التعديل بنجاح!', 'success');
        return redirect()->route('category.index');

    }//end of update


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image !== 'cat.png') {
            Storage::disk('public_uploads')->delete('/category/' . $category->image);
        }
        $del = $category->delete();
        if (!$del)
            toast('هناك خطأ الان', 'error');


        toast('تم الحذف بنجاح!', 'success');
        return redirect()->route('category.index');
    }//end of destroy


}//end of controller
