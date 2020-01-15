<?php


namespace App\Http\Controllers;


use App\Models\Strazi;

class StreetsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Strazi::join('cartiere', 'strazi.id_cartier', '=', 'cartiere.id')
            ->join('tip_strada', 'strazi.id_tip_strada', '=', 'tip_strada.id')
            ->select('cartiere.*', 'strazi.*', 'tip_strada.nume as tip_strada_nume')
            ->orderBy('strazi.nume_strada', 'ASC')
            ->get();

        return view('streets',[ 'streets' => $data]);
    }

}
