<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        $konten = Konten::all();
        return view('user/tampil/portfolio', compact('konten'));
    }

    public function detail($id)
    {
        $konten = Konten::findOrFail($id);
        return view('user/tampil/detail-portfolio', compact('konten'));
    }
}
