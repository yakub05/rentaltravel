<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $artikel = Artikel::where('judul', 'like', "%$keyword%")
                        ->orWhere('deskripsi', 'like', "%$keyword%")->paginate(10);

        Log::info('Artikels:', $artikel->toArray());

        // Batasi deskripsi untuk setiap artikel
        // foreach ($artikel as $artikel) {
        //     $artikel->deskripsi = Str::limit($artikel->deskripsi, 200);
        // }

        return view('admin/dataartikel', ['artikel' => $artikel, 'keyword' => $keyword]);
    }


    public function create()
    {
        return view('admin/tambahartikel');
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
                'judul.required' => 'Judul artikel harus diisi.',
                'foto.required' => 'Gambar artikel harus diunggah.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'deskripsi.required' => 'Deskripsi artikel harus diisi.',
            ]);
            $fotoPath = $request->file('foto')->store('foto_artikel', 'public');

            $artikel = new Artikel();
            $artikel->judul = $validatedData['judul'];
            $artikel->foto = $fotoPath;
            $artikel->deskripsi = $validatedData['deskripsi'];

            $artikel->id_user = Auth::id();
            $artikel->save();

            Alert::toast('Artikel baru telah ditambahkan', 'success');
            return redirect('/dataartikel');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan artikel.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $artikel = Artikel::findOrFail($id);

            if ($artikel->foto) {
                Storage::delete('public/' . $artikel->foto);
            }

            $artikel->delete();

            Alert::toast('Artikel berhasil dihapus', 'success');
            return redirect()->route('dataartikel');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus artikel.');
            return redirect()->route('dataartikel');
        }
    }
}
