<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:settings_read'])->only('index');
    }//end of constructor

    public function index()
    {


        try {
            $setting = Setting::first();
            return view('dashboard..page.setting.edit', compact('setting'));
        } catch (\Exception $ex) {
            return $ex;
            toast('Your Post as been submited!', 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of index

    public function update(Request $request, $id)
    {

        $setting = Setting::findOrFail($id);
        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'image' => 'image',
            'number' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->except(['_token', '_method', 'image','updated_at', 'created_at']);


        if ($request->image) {

            if ($setting->image != 'logo.png') {

                Storage::disk('public_uploads')->delete('/setting/' . $setting->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/setting/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of external if

        $create = $setting->update($request_data);

        toast('تم التعديل بنجاح!', 'success');
        return redirect()->route('admin.dashboard');

    }//end of update
}
