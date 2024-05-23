<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class KontenController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $konten = Konten::where('judul', 'like', "%$keyword%")
                        ->orWhere('deskripsi', 'like', "%$keyword%")->paginate(10);
        return view('admin/datakonten', ['konten' => $konten, 'keyword' => $keyword]);
    }

    public function create()
    {
        return view('admin/tambahkonten');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Request data:', $request->all());
            
            $validatedData = $request->validate([
                'judul' => 'required',
                'foto' => 'required|image',
                'deskripsi' => 'required',
            ], [
                'judul.required' => 'Judul konten harus diisi.',
                'foto.required' => 'Gambar konten harus diunggah.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'deskripsi.required' => 'Deskripsi konten harus diisi.',
            ]);
            $fotoPath = $request->file('foto')->store('foto_konten', 'public');

            $konten = new Konten();
            $konten->judul = $validatedData['judul'];
            $konten->foto = $fotoPath;
            $konten->deskripsi = $validatedData['deskripsi'];

            $konten->id_user = Auth::id();
            $konten->save();
    
            Alert::toast('Konten baru telah ditambahkan', 'success');
            return redirect('/datakonten');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan konten.');
            return redirect()->back();
        }
    }
}
