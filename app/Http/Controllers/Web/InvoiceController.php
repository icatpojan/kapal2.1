<?php

namespace App\Http\Controllers\Web;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\History;
use App\Model\Invoice;
use App\Model\Product;
use App\Model\Ship;
use App\Model\Type;
use App\Model\Warehouse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $title = "Invoice";
        $Detail = Detail::where('transaksi_id', null)->with(['type', 'warehouse', 'status'])->get();
        $Price = 0;
        foreach ($Detail as $Data) {
            $Price = $Price + $Data->price;
        }
        $PPN = $Price + (($Price * 10)/100);
        $Customer = Customer::get();
        $User = User::get();
        $Warehouse = Warehouse::get();
        $Type = Type::get();
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = Invoice::max('id');
        if ($noUrutAkhir) {
            $Nomer = sprintf("%04s", abs($noUrutAkhir + 1)) . '-INV-PIM-' . 'VMS' . '-' . $bulanRomawi[date('n')] . '-' . date('d-m-Y');
        } else {
            $Nomer = sprintf("%04s", 1) . '-INV-PIM-' . 'VMS' . '-' . $bulanRomawi[date('n')] . '-' . date('d-m-Y');
        }
        return view('pages.invoice.invoice', compact('title', 'Detail', 'Nomer', 'Customer', 'User','Price','PPN','Warehouse','Type'));
    }
    public function add(Request $request)
    {
        $cek = Detail::where('sn', $request->sn)->first();
        if ($cek) {
            alert()->error('Gagal', 'Produk sudah ditambahkan ');
            return back();
        }
        try {
            $Produk = Product::where('sn', $request->sn)->first();
            $Detail = Detail::create([
                'sn' => $Produk->sn,
                'produk_id' => $Produk->id,
                'imei' => $Produk->imei,
                'type_id' => $Produk->type_id,
                'warehouse_id' => $Produk->warehouse_id,
                'status_id' => $Produk->status_id,
                'price' => $Produk->price,
            ]);
            $Detail->save();
            alert()->success('Sukses', 'Berhasil');
            return back();
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Produk tidak ada ');
            return back();
        }
    }

    public function destroy($id)
    {
        $Detail = Detail::where('id', $id)->first();
        $Detail->delete();
        alert()->success('Sukses', 'Berhasil menghapus');
        return back();
    }

    public function stempel(Request $request)
    {
        $AWAL = $request->get('id');
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = Invoice::max('id');
        $no = 1;
        if ($noUrutAkhir) {
            $Nomer = sprintf("%04s", abs($noUrutAkhir + 1)) . '-INV-PIM-' . $AWAL . '-' . $bulanRomawi[date('n')] . '-' . date('d-m-Y');
            return $this->sendResponse('Success', 'ini dia daftar nomernya bos', $Nomer, 200);
        } else {
            $Nomer = sprintf("%04s", $no) . '-INV-PIM-' . $AWAL . '-' . $bulanRomawi[date('n')] . '-' . date('d-m-Y');
            return $this->sendResponse('Success', 'ini dia daftar nomernya bos', $Nomer, 200);
        }
    }
    public function cari(Request $request)
    {
        // try {
            if ($request->warehouse && $request->type) {
                $Produk = Product::with(['warehouse', 'type', 'status'])->where('warehouse_id', $request->warehouse)->where('type_id', $request->type)->get();
                return $this->sendResponse('Success', 'ini dia produk', $Produk, 200);
            }
            if ($request->warehouse) {
                $Produk = Product::with(['warehouse', 'type', 'status'])->where('warehouse_id', $request->warehouse)->get();
                return $this->sendResponse('Success', 'ini dia produk', $Produk, 200);
            }
            if ($request->type) {
                $Produk = Product::with(['warehouse', 'type', 'status'])->where('type_id', $request->type)->get();
                return $this->sendResponse('Success', 'ini dia produk', $Produk, 200);
            }
        // } catch (\Exception $e) {
        //     return $this->sendResponse('Error', 'Gagal mengambil produk', null, 500);
        // }
    }
    public function store(Request $request)
    {
        $Detail = Detail::where('transaksi_id', null)->with(['type', 'warehouse', 'status'])->get();
        $Price = 0;
        //penjumlahan harga
        foreach ($Detail as $Data) {
            $Price = $Price + $Data->price;
        }
        // pengecekan airtime kapal
        if (!$request->airtime_start) {
            $Kapal = Ship::where('id', $request->ship_id)->first();
            $request->airtime_start = $Kapal->airtime_start;
        }
        if (!$request->akhir_periode) {
            $Kapal = Ship::where('id', $request->ship_id)->first();
            $request->akhir_periode = $Kapal->airtime_end;
        }
        // pengecekan pembayaran
        $status = 'NOT YET PAID OFF';
        if ($request->transfer_name && $request->transfer_date && $request->bank && $request->contact) {
            $status = 'PAID OFF';
        };
        if ($status == 'NOT YET PAID OFF') {
            $request->transfer_name = null;
            $request->transfer_date  = null;
            $request->bank = null;
            $request->contact  = null;
        };
        // baru dibuat
        $Transaksi = Invoice::create([
            'invoice_no' => $request->invoice_no,
            'invoice_date' => $request->invoice_date,
            'address' => $request->address,
            'npwp' => $request->npwp,
            'airtime' => $request->airtime,
            'due_date' => $request->due_date,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'jenis' => $request->jenis,
            'customer_id' => $request->customer_id,
            'transfer_date' => $request->transfer_date,
            'bank' => $request->bank,
            'transfer_name' => $request->transfer_name,
            'user_id' => $request->user_id,
            'contact' => $request->contact,
            'ship_id' => $request->ship_id,
            'unit_price' => $request->unit_price,
            'total_harga' => $Price,
            'tanggal' => date('Y-m-d'),
            'status' => $status,
            'ppn' => 1000000,
            'harga_akhir' => $request->harga_akhir,
            'airtime_start' => $request->airtime_start,
            'airtime_end' => $request->airtime_end,
        ]);
        $Transaksi->save();
        $Transaksi = Invoice::latest()->first();
        foreach ($Detail as $Data) {
            $Data->transaksi_id = $Transaksi->id;
            $Data->update();
        }
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Melakukan Transaksi', 'tanggal' => date("d-m-Y")]);
        alert()->success('Sukses', 'Berhasil menjual');
        return back();
        // } catch (\Exception $e) {
        //     return $this->sendResponse('Error', 'Gagal menambahkan Transaksi', null, 500);
        // }
    }
}
