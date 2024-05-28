<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.dataadmin', compact('users'));
    }
    public function create()
    {
        return view('admin.tambahdataadmin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telf' => 'required|string|max:15',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telf' => $request->telf,
        ]);
        Alert::toast('Admin baru telah ditambahkan', 'success');
        return redirect('/dataadmin');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.editadmin', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'telf' => 'required|string|max:15',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'telf' => $request->telf,
        ]);
        Alert::toast('Data admin telah di edit', 'success');
        return redirect('/dataadmin');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::toast('Data Admin berhasil dihapus', 'success');
        return redirect('/dataadmin');
    }
}
