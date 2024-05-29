<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $testimoni = Testimoni::where('id_user', $userId)->get();
        return view('customer/datatestimoni', compact('testimoni'));
    }

    public function index_admin(Request $request)
    {
        $testimoni = Testimoni::all();
        return view('admin/datatestimoni', compact('testimoni'));
    }

    public function user_testimoni()
    {
        $testimoni = Testimoni::orderBy('id', 'desc')->get();
        return view('user/tampil/testimoni', compact('testimoni'));
    }

    public function create()
    {
        return view('customer/tambahtestimoni');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Request data:', $request->all());

            $validatedData = $request->validate([
                'komentar' => 'required'
            ], [
                'komentar.required' => 'Komentar harus diisi.',
            ]);
            $testimoni = new Testimoni();
            $testimoni->komentar = $validatedData['komentar'];

            $testimoni->id_user = Auth::id();
            $testimoni->save();

            Alert::toast('Testimoni baru telah ditambahkan', 'success');
            return redirect('/datatestimoni');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan testimoni.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $userName = Auth::user()->nama;

        return view('customer/edittestimoni', ['testimoni' => $testimoni, 'userName' => $userName]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'komentar' => 'required'
            ], [
                'komentar.required' => 'Komentar harus diisi.',
            ]);

            $testimoni = Testimoni::findOrFail($id);
            $testimoni->komentar = $validatedData['komentar'];
            $testimoni->save();

            Alert::toast('Testimoni telah diperbarui', 'success');
            return redirect('/datatestimoni');
        } catch (ValidationException $th) {
            Alert::error('Gagal', $th->validator->errors()->first());
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui testimoni.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $testimoni = Testimoni::findOrFail($id);
            $testimoni->delete();

            Alert::toast('Testimoni berhasil dihapus', 'success');
            return redirect()->route('datatestimoni');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus testimoni.');
            return redirect()->route('datatestimoni');
        }
    }
}
