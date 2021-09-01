<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\History;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function index()
    {
        $User = User::all();
        $title = "user";
        return view('pages.master.user', compact('title', 'User'));
    }

    public function store(Request $request)
    {
        $User = User::create([
            'username' => $request->username,
            'name' => $request->username,
            'email' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Menambah user', 'tanggal' => date("d-m-Y")]);
        alert()->success('Sukses', 'Berhasil menambah');
        return back();
    }

    public function update(Request $request, $id)
    {
        $User = User::where('id', $id)->first();
        $User->username = $request->username;
        $User->role = $request->role;
        $User->update();
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Mengupdate user', 'tanggal' => date("d-m-Y")]);
        alert()->success('Sukses','Berhasil mengupdate');
        return back();
    }

    public function destroy($id)
    {
        $User = User::where('id', $id)->first();
        if ($id == Auth::id()) {
            alert()->error('Gagal','tidak bisa hapus diri sendiri');
            return back();
        }
        $User->delete();
        History::create(['user_id' => Auth::id(), 'keterangan' => 'Menghapus user', 'tanggal' => date("d-m-Y")]);
        alert()->success('Sukses','Berhasil menghapus');
    }
}
