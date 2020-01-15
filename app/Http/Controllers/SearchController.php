<?php

namespace App\Http\Controllers;

use App\Models\Strazi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $attribute_chosen = $request->by_attribute;

        if ($attribute_chosen === 'post_code_search') {
            $data = Strazi::join('cartiere', 'strazi.id_cartier', '=', 'cartiere.id')
                ->join('cladiri', 'cladiri.id_strada', '=', 'strazi.id')
                ->join('tip_strada', 'strazi.id_tip_strada', '=', 'tip_strada.id')
                ->join('tip_cladire', 'cladiri.id_tip_cladire', '=', 'tip_cladire.id')
                ->select('cartiere.*', 'strazi.*', 'cladiri.*', 'tip_strada.nume as tip_strada_nume', 'tip_cladire.nume as tip_cladire_nume')
                ->where("cladiri.cod_postal", "LIKE", "%{$request->search}%")
                ->orderBy('strazi.nume_strada', 'ASC')
                ->get();
        } else {
            $data = Strazi::join('cartiere', 'strazi.id_cartier', '=', 'cartiere.id')
                ->join('cladiri', 'cladiri.id_strada', '=', 'strazi.id')
                ->join('tip_strada', 'strazi.id_tip_strada', '=', 'tip_strada.id')
                ->join('tip_cladire', 'cladiri.id_tip_cladire', '=', 'tip_cladire.id')
                ->select('cartiere.*', 'strazi.*', 'cladiri.*', 'tip_strada.nume as tip_strada_nume', 'tip_cladire.nume as tip_cladire_nume')
                ->where("strazi.nume_strada", "LIKE", "%{$request->search}%")
                ->orderBy('strazi.nume_strada', 'ASC')
                ->get();
        }

        return response()->json($data);
    }
}
