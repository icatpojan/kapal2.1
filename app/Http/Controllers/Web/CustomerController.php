<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Customer;
use App\Model\Province;
use App\Model\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $Customer = Customer::all();
        $Province = Province::all();
        $title = "Customer";
        return view('pages.master.customer', compact('title', 'Customer','Province'));
    }

    public function store(Request $request)
    {
        $Customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'npwp' => $request->npwp,
            'contact' => $request->contact,
            'phone' => $request->phone,
            'type' => $request->type,
            'address' => $request->address,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id,
            'kode_pos' => $request->kode_pos,
            'fax' => $request->fax,
        ]);
        alert()->success('Sukses','Berhasil menambah');
        return back();
    }

    public function update(Request $request , $id)
    {
        $Customer = Customer::where('id', $id)->first();
        $Customer->name = $request->name;
        $Customer->npwp = $request->npwp;
        $Customer->contact = $request->contact;
        $Customer->phone = $request->phone;
        $Customer->name = $request->name;
        $Customer->name = $request->name;
        $Customer->name = $request->name;
        $Customer->name = $request->name;
        $Customer->name = $request->name;
        $Customer->name = $request->name;
        $Customer->name = $request->name;
        $Customer->update();
        alert()->success('Sukses','Berhasil mengupdate');
        return back();
    }

    public function destroy($id)
    {
        $Customer = Customer::where('id', $id)->first();
        $Customer->delete();
        alert()->success('Sukses','Berhasil menghapus');
        return back();
    }

    public function show(Request $request)
    {
        $Customer = Customer::where('id', $request->id)->first();
        return $this->sendResponse('Success', 'ini dia daftar nomernya bos', $Customer, 200);
    }

    public function provincestore(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('city_name', 'city_id');

        return response()->json($cities);
    }

    public function regionstore(Request $request)
    {
        $regions = Region::where('city_id', $request->get('id'))
            ->pluck('region_name', 'region_id');

        return response()->json($regions);
    }

}
