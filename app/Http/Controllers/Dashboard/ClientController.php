<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:clients_read'])->only('index');
        $this->middleware(['permission:clients_create'])->only('create');
        $this->middleware(['permission:clients_update'])->only('edit');
        $this->middleware(['permission:clients_delete'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {

        $clients = Client::paginate(8);
        return view('dashboard.page.client.index', compact('clients'));
    }//end of index


    public function create()
    {
        return view('dashboard..page.client.create');
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:clients,email', 'email'],
            'name' => 'required|string',
            'mobile' => 'required|unique:clients',
            'address' => 'required|string',
        ]);

        $data = $request->except('_token', '_method');
        $create = Client::create($data);
        if (!$create) {
            toast('هناك خطأ الان', 'error');
            return redirect()->route('client.index');

        }
        toast('تم الاضافه بنجاح!', 'success');
        return redirect()->route('client.index');

    }//end of store


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('dashboard.page.client.edit', compact('client'));

    }//end of edit


    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $request->validate([

            'name' => 'required|string',
            'mobile' => ['required', Rule::unique('clients','mobile')->ignore($client->id),],
            'email' => ['required', Rule::unique('clients','email')->ignore($client->id),],
            'address' => 'required|string',

        ]);
        $data = $request->except('_token', '_method');
        $create = $client->update($data);

        if (!$create) {
            toast('هناك خطأ الان', 'error');
            return redirect()->route('client.index');
        }
        toast('تم التعديل بنجاح!', 'success');
        return redirect()->route('client.index')->with('success', __('site.updated_successfully'));

    }//end of update


    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $del = $client->delete();
        if (!$del)
            return redirect()->route('client.index');
        toast('تم الحذف بنجاح!', 'success');
        return redirect()->route('client.index')->with('success', __('site.deleted_successfully'));


    }//end of destroy


}//end of controller
