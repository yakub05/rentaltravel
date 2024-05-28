<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Konten;
use App\Models\Travel;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $lastWeek = Carbon::now()->subWeek();

        $dataUserCount = User::count();
        $dataKontenCount = Konten::count();
        $dataArtikelCount = Artikel::count();
        $dataTravelCount = Travel::count();

        $dataUserLastWeek = User::where('created_at', '>=', $lastWeek)->count();
        $dataKontenLastWeek = Konten::where('created_at', '>=', $lastWeek)->count();
        $dataArtikelLastWeek = Artikel::where('created_at', '>=', $lastWeek)->count();
        $dataTravelLastWeek = Travel::where('created_at', '>=', $lastWeek)->count();

        $userPercentage = $this->calculatePercentageIncrease($dataUserLastWeek, $dataUserCount);
        $kontenPercentage = $this->calculatePercentageIncrease($dataKontenLastWeek, $dataKontenCount);
        $artikelPercentage = $this->calculatePercentageIncrease($dataArtikelLastWeek, $dataArtikelCount);
        $travelPercentage = $this->calculatePercentageIncrease($dataTravelLastWeek, $dataTravelCount);

        return view('admin.dashboard', compact(
            'dataUserCount', 'dataKontenCount', 'dataArtikelCount', 'dataTravelCount',
            'userPercentage', 'kontenPercentage', 'artikelPercentage', 'travelPercentage', 
        ));
    }

    private function calculatePercentageIncrease($lastWeek, $current)
    {
        if ($lastWeek == 0) {
            return $current > 0 ? 100 : 0;
        }
        return (($current - $lastWeek) / $lastWeek) * 100;
    }
}

