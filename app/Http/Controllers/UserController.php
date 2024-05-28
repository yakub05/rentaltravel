<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;
        $users = User::where('nama', 'like', "%$keyword%")
                        ->orWhere('email', 'like', "%$keyword%")->paginate(10);

        return view('admin.dataadmin', ['users' => $users, 'keyword' => $keyword]);
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
            'user_type' => 'required|in:admin,customer',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telf' => $request->telf,
            'user_type' => $request->user_type,
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
        try {
            Log::info('Request data:', $request->all());

            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'telf' => 'required|string|max:15',
                'user_type' => 'required|in:admin,customer',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email harus valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.min' => 'Password harus minimal 8 karakter.',
                'telf.required' => 'Nomor telepon harus diisi.',
                'telf.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
                'user_type.required' => 'Tipe user harus dipilih.',
                'user_type.in' => 'Tipe user tidak valid.',
            ]);

            Log::info('Validated data:', $validatedData);

            $user->update([
                'nama' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'telf' => $validatedData['telf'],
                'user_type' => $validatedData['user_type'],
            ]);

            Alert::toast('Admin telah diperbarui', 'success');
            return redirect('/dataadmin');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui admin.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::toast('Data Admin berhasil dihapus', 'success');
        return redirect('/dataadmin');
    }
}
