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
                'deskripsi' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'judul.required' => 'Judul artikel harus diisi.',
                'deskripsi.required' => 'Deskripsi artikel harus diisi.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
                'foto.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
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

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $userName = Auth::user()->name;

        return view('admin/editartikel', ['artikel' => $artikel, 'userName' => $userName]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'judul.required' => 'Judul artikel harus diisi.',
                'deskripsi.required' => 'Deskripsi artikel harus diisi.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
                'foto.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            ]);

            $artikel = Artikel::findOrFail($id);
            $artikel->judul = $validatedData['judul'];
            $artikel->deskripsi = $validatedData['deskripsi'];

            if ($request->hasFile('foto')) {
                if ($artikel->foto) {
                    Storage::delete('public/' . $artikel->foto);
                }
                $fotoPath = $request->file('foto')->store('foto_artikel', 'public');
                $artikel->foto = $fotoPath;
            }

            $artikel->save();

            Alert::toast('Artikel telah diperbarui', 'success');
            return redirect('/dataartikel');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui artikel.');
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
