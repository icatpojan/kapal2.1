<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Invoice;
use App\Model\Mutasi;
use App\Model\Product;
use App\Model\Warehouse;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $Invoice = Invoice::all();
        $title = "Report";
        return view('pages.invoice.report', compact('title', 'Invoice'));
    }

    public function mutasiindex()
    {
        $Mutasi = Mutasi::with(['warehouse', 'type', 'status'])->get();
        $Warehouse = Warehouse::all();
        $title = "Mutasi";
        return view('pages.product.mutasi', compact('title', 'Mutasi', 'Warehouse'));
    }

    public function mutasidestroy($sn)
    {
        $Mutasi = Mutasi::where('sn', $sn)->first();
        $Mutasi->delete();
        return back();
    }

    public function mutasiadd(Request $request)
    {
        $Product = Product::where('sn', $request->sn)->first();
        if (!$Product) {
            alert()->error('Gagal', 'Barang tidak ada');
            return back();
        }
        try {
            $Mutasi = Mutasi::create([
                'sn' => $Product->sn,
                'imei' => $Product->imei,
                'keterangan' => $Product->keterangan,
                'price' => $Product->price,
                'type_id' => $Product->type_id,
                'warehouse_id' => $Product->warehouse_id,
                'status_id' => $Product->status_id,
            ]);
            $Mutasi->save();
            return back();
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Barang sudah di daftar');
            return back();
        }
    }

    public function mutasimass(Request $request)
    {
        $Mutasi = Mutasi::all();
        try {
            foreach ($Mutasi as $Data) {
                $Product = Product::where('sn', $Data->sn)->first();
                $Product->warehouse_id = $request->warehouse_id;
                $Product->update();
                $Data->delete();
            }
            alert()->success('Sukses', 'Berh;asil');
            return back();
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal');
            return back();
        }
    }

    public function cetak_pdf($id)
    {
        $Invoice = Invoice::where('id', $id)->first();
        $pdf = PDF::loadview('pdf', $Invoice)->setPaper( 'A4', 'potrait');
        return $pdf->stream();
    }
}
