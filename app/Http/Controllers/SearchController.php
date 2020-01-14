<?php

namespace App\Http\Controllers;

use App\Models\Cartiere;
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
        $data = Cartiere::join('strazi', 'strazi.id_cartier', '=', 'cartiere.id')
            ->select('strazi.*', 'cartiere.*')
            ->where("strazi.nume_strada","LIKE","%{$request->search}%")
            ->get();

        return response()->json($data);
    }
}
