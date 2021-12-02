<?php

namespace App\Http\Controllers;

use App\Models\Klijenti;
use Illuminate\Http\Request;
use App\Models\Kvar;

// Upisujem model koji se koristim

class KvarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('pretraga')) {
            $kvarovi = Kvar::whereHas('klijent', function ($query) {
                $query->where('userID', session('userId'));
            })->
            where('modelAuta', 'like', '%'.request('pretraga').'%')->
            orWhere('registarskeTablice', 'like', '%'.request('pretraga').'%')->
            orWhere('simptom', 'like', '%'.request('pretraga').'%')->
            orWhere('dijagnoza', 'like', '%'.request('pretraga').'%')->
            orWhere('izvrsenePopravke', 'like', '%'.request('pretraga').'%')->
            orWhere('imeMajstora', 'like', '%'.request('pretraga').'%')->
            orWhere('comment', 'like', '%'.request('pretraga').'%')->
            orderBy('id', 'desc')->paginate(5);
            return view('kvarovi', ['kvarovi' => $kvarovi]);
            //dd(request('pretraga'));
        }

        $kvarovi = Kvar::with('klijent')->whereHas('klijent', function ($query) {
            $query->where('userID', session('userId'));
        })->paginate(5);
        //dd($kvarovi);


        return view('kvarovi', ['kvarovi' => $kvarovi]);
    }

    public function indexApi()
    {
        $kvarovi = Kvar::All();
        return $kvarovi;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klijenti = Klijenti::where('userID', '=', session('userId'))->get();
        return view('kreirajKvar', ['klijenti' => $klijenti]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'imeMajstora' => 'required',
            'simptom' => 'required',
            'dijagnoza' => 'required',
        ]);

        //Ovdje ide sve sto storuje u bazu
        $kvar = new Kvar;
        $kvar->klijentID = $request->input('klijentID'); //Ovo treba jos srediti
        $kvar->modelAuta = $request->input('modelAuta');
        $kvar->registarskeTablice = $request->input('registarskeTablice');
        $kvar->simptom = $request->input('simptom');
        $kvar->dijagnoza = $request->input('dijagnoza');
        $kvar->izvrsenePopravke = $request->input('izvrsenePopravke');
        $kvar->imeMajstora = $request->input('imeMajstora');
        $kvar->comment = $request->input('comment');
        $kvar->save();

        return redirect('/kvarovi/create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kvar = Kvar::where('id', '=', $id)->whereHas('klijent', function ($query) {
            $query->where('userID', session('userId'));
        })->first();
        return view('kvar', ['kvar' => $kvar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kvar = Kvar::find($id)->first();
        return view('editujKvar')->with('kvar', $kvar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'imeMajstora' => 'required',
            'simptom' => 'required',
            'dijagnoza' => 'required',
        ]);


        $klijent = Kvar::where('id', $id)
            ->update([
                'modelAuta' => $request->input('modelAuta'),
                'registarskeTablice' => $request->input('registarskeTablice'),
                'simptom' => $request->input('simptom'),
                'dijagnoza' => $request->input('dijagnoza'),
                'izvrsenePopravke' => $request->input('izvrsenePopravke'),
                'imeMajstora' => $request->input('imeMajstora'),
                'comment' => $request->input('comment'),
            ]);


        return redirect('/kvarovi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kvar = Kvar::where('id', $id);
        $kvar->delete();
        return redirect('/kvarovi');
    }
}
