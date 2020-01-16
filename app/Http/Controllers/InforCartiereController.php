<?php

namespace App\Http\Controllers;

use App\Models\Cartiere;
use App\Models\Strazi;
use Illuminate\Http\Request;

class InforCartiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('status_cartiere');
    }

    /**
     * Returns all data relevant to building the chart
     */
    public function getChartData()
    {
        $chartDataset = ["labels" => null, "data" => null];

        $cartiere = Cartiere::select('cartiere.nume_cartier')
            ->orderBy('cartiere.nume_cartier', 'ASC')
            ->pluck('nume_cartier');

        $chartDataset["labels"] = $cartiere;

        foreach ($cartiere as $cartier) {
            $numar_bulevarde = Strazi::join('cartiere', 'strazi.id_cartier', '=', 'cartiere.id')->where('cartiere.nume_cartier', '=', $cartier)->where('id_tip_strada', '=',
                '1')->get()->count();
            $numar_piete = Strazi::join('cartiere', 'strazi.id_cartier', '=', 'cartiere.id')->where('cartiere.nume_cartier', '=', $cartier)->where('id_tip_strada', '=', '2')->get()->count();
            $numar_strazi = Strazi::join('cartiere', 'strazi.id_cartier', '=', 'cartiere.id')->where('cartiere.nume_cartier', '=', $cartier)->where('id_tip_strada', '=', '3')->get()->count();
            $chartDataset["data"][$cartier] = ['bulevarde' => $numar_bulevarde, 'piete' => $numar_piete, 'strazi' => $numar_strazi];
        }

        $bulevarde = [];
        $piete = [];
        $strazi = [];

        foreach ($chartDataset['data'] as $dataSet) {
            array_push($bulevarde,$dataSet['bulevarde']);
            array_push($piete,$dataSet['piete']);
            array_push($strazi,$dataSet['strazi']);
        }

        unset($chartDataset['data']);

        $chartDataset['data'] = ['bulevarde' => $bulevarde, 'piete' => $piete, 'strazi' => $strazi ];

        return response()->json($chartDataset);
    }
}
