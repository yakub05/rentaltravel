<?php

namespace App\Http\Controllers;

use Alert;
use Exception;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TravelController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;
        $travel = Travel::where('nama_travel', 'like', "%$keyword%")
                        ->orWhere('deskripsi', 'like', "%$keyword%")->paginate(3);

        return view('admin.datarentaltravel', ['travel' => $travel, 'keyword' => $keyword]);
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

    public function edit($id)
    {
        $travel = Travel::findOrFail($id);
        $userName = Auth::user()->nama;

        return view('admin/editrental', ['travel' => $travel, 'userName' => $userName]);
    }

    public function update(Request $request, $id)
    {
        try {
            Log::info('Request data:', $request->all());

            $validatedData = $request->validate([
                'nama_travel' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tujuan' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'telp' => 'required|string|max:15',
            ], [
                'nama_travel.required' => 'Nama travel harus diisi.',
                'foto.image' => 'Foto harus berupa file gambar.',
                'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
                'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
                'tujuan.required' => 'Tujuan travel harus diisi.',
                'deskripsi.required' => 'Deskripsi travel harus diisi.',
                'telp.required' => 'Nomor telepon harus diisi.',
                'telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            ]);

            $travel = Travel::findOrFail($id);
            $travel->nama_travel = $validatedData['nama_travel'];

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('foto_travel', 'public');
                $travel->foto = $fotoPath;
            }

            $travel->tujuan = $validatedData['tujuan'];
            $travel->deskripsi = $validatedData['deskripsi'];
            $travel->telp = $validatedData['telp'];
            $travel->id_user = Auth::id();
            $travel->save();

            Alert::toast('Konten Travel telah diperbarui', 'success');
            return redirect('/datarentaltravel');
        } catch (ValidationException $th) {
            Log::error('Validation error: ', $th->validator->errors()->all());
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Log::error('Exception: ', ['message' => $e->getMessage()]);
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui travel.');
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

    public function user_travel()
    {
        $travel = Travel::orderBy('id', 'desc')->get();
        return view('user/tampil/travel', compact('travel'));
    }
}
