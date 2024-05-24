<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function edit($id)
    {
        $konten = Konten::findOrFail($id);
        return view('admin.editkonten', compact('konten'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'judul.required' => 'Judul konten harus diisi.',
                'deskripsi.required' => 'Deskripsi konten harus diisi.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
                'foto.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            ]);

            $konten = Konten::findOrFail($id);
            $konten->judul = $validatedData['judul'];
            $konten->deskripsi = $validatedData['deskripsi'];

            if ($request->hasFile('foto')) {
                if ($konten->foto) {
                    Storage::delete('public/' . $konten->foto);
                }
                $fotoPath = $request->file('foto')->store('foto_konten', 'public');
                $konten->foto = $fotoPath;
            }

            $konten->save();

            Alert::toast('Konten berhasil diperbarui', 'success');
            return redirect()->route('datakonten');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui konten.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $konten = Konten::findOrFail($id);
            
            if ($konten->foto) {
                Storage::delete('public/' . $konten->foto);
            }

            $konten->delete();

            Alert::toast('Konten berhasil dihapus', 'success');
            return redirect()->route('datakonten');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus konten.');
            return redirect()->route('datakonten');
        }
    }
}
