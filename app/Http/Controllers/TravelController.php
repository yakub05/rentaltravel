<?php

namespace App\Http\Controllers;

use Alert;
use Exception;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TravelController extends Controller
{
    public function index(){
        $travel = Travel::all();
        return view('admin.datarentaltravel', compact('travel'));
    }

    public function create()
    {
        return view('admin/tambahrental');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_travel' => 'required|string|max:255',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tujuan' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'telp' => 'required|string|max:15',
            ], [
                'nama_travel.required' => 'Nama travel harus diisi.',
                'foto.required' => 'Foto travel harus diunggah.',
                'foto.image' => 'Foto harus berupa file gambar.',
                'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
                'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
                'tujuan.required' => 'Tujuan travel harus diisi.',
                'deskripsi.required' => 'Deskripsi travel harus diisi.',
                'telp.required' => 'Nomor telepon harus diisi.',
                'telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            ]);

            $fotoPath = $request->file('foto')->store('foto_travel', 'public');

            $travel = new Travel();
            $travel->nama_travel = $validatedData['nama_travel'];
            $travel->foto = $fotoPath;
            $travel->tujuan = $validatedData['tujuan'];
            $travel->deskripsi = $validatedData['deskripsi'];
            $travel->telp = $validatedData['telp'];

            $travel->id_user = Auth::id();
            $travel->save();

            Alert::toast('Konten Travel telah ditambahkan', 'success');
            return redirect('/datarentaltravel');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan travel.');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $travel = Travel::findOrFail($id);
        $travel->delete();

        Alert::toast('Data Travel berhasil dihapus', 'success');
        return redirect('/datarentaltravel');
    }
}
