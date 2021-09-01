<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\History;
use App\Model\Product;
use App\Model\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function index()
    {
        $Type = Type::with('category')->get();
        foreach ($Type as $type) {
            $type = Type::where('id', $type->id)->first();
            $Produk = Product::where('status_id', 1)->where('id', $type->id)->count();

            $type->update([
                'stock' => $Produk,
            ]);
        }
        $title = "Type";
        return view('pages.product.type', compact('title', 'Type'));
    }

    public function store(Request $request)
    {
        $Type = Type::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Menambah tipe', 'tanggal' => date("d-m-Y")]);

        alert()->success('Sukses','Berhasil menambah');
        return back();
    }

    public function update(Request $request , $id)
    {
        $Type = Type::where('id', $id)->first();
        $Type->name = $request->name;
        $Type->category_id = $request->category_id;
        $Type->price = $request->price;
        $Type->stock = $request->stock;
        $Type->update();
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Mengupdate tipe', 'tanggal' => date("d-m-Y")]);

        alert()->success('Sukses','Berhasil mengudate');
        return back();
    }

    public function destroy($id)
    {
        $Type = Type::where('id', $id)->first();
        $Type->delete();
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Menghapus tipe', 'tanggal' => date("d-m-Y")]);

        alert()->success('Sukses','Berhasil menghapus');
        return back();
    }
}
