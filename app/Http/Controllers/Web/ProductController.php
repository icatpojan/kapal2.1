<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\History;
use App\Model\Product;
use App\Model\Status;
use App\Model\Type;
use App\Model\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $Product = Product::with(['warehouse', 'type', 'status'])->where('tgl_delete', '=', null)->orderBy('tgl_masuk', 'ASC')->get();
        $Type = Type::all();
        $Warehouse = Warehouse::all();
        $Status = Status::all();
        $title = "Product";
        return view('pages.product.product', compact('title', 'Product', 'Type', 'Warehouse', 'Status'));
    }

    public function store(Request $request)
    {
        $Product = Product::create([
            'sn' => $request->sn,
            'imei' => $request->imei,
            'keterangan' => $request->keterangan,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'tgl_masuk' => $request->tgl_masuk,
            'entri_user_masuk' => Auth::id(),
            'warehouse_id' => $request->warehouse_id,
            'status_id' => $request->status_id,
        ]);
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Menambah Produk', 'tanggal' => date("d-m-Y")]);

        alert()->success('Sukses', 'Berhasil menambah');
        return back();
    }

    public function update(Request $request, $id)
    {
        $Product = Product::where('id', $id)->first();
        $Product->sn = $request->sn;
        $Product->imei = $request->imei;
        $Product->keterangan = $request->keterangan;
        $Product->price = $request->price;
        $Product->tgl_masuk = $Product->tgl_masuk;
        $Product->type_id = $request->type_id;
        $Product->warehouse_id = $request->warehouse_id;
        $Product->status_id = $request->status_id;
        $Product->update();
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Mengupdate Produk', 'tanggal' => date("d-m-Y")]);

        alert()->success('Sukses', 'Berhasil mengupdate');
        return back();
    }

    public function destroy($id)
    {
        $Produk = Product::where('id', $id)->first();
        try {
            $Produk->update([
                'tgl_delete' => date("Y-m-d"),
                'user_delete' => Auth::id(),
            ]);
            History::create(['user_id' => Auth::id(), 'keterangan' => 'Menghapus produk', 'tanggal' => date("d-m-Y")]);
            alert()->success('Sukses', 'Berhasil menghapus');
            return back();
        } catch (\Exception $e) {
            alert()->error('error', 'gagal');
            return back();
        }
    }
}
