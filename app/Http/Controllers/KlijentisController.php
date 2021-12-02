<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijenti;

// Upisujem model koji se koristim

class KlijentisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request('pretraga')) {
            $klijenti = Klijenti::where('name', 'like', '%'.request('pretraga').'%')->
            orWhere('telephone', 'like', '%'.request('pretraga').'%')->
            orWhere('email', 'like', '%'.request('pretraga').'%')->
            orWhere('comment', 'like', '%'.request('pretraga').'%')->
            where('userID', '=', session('userId'))->
            orderBy('id', 'desc')->paginate(5);

            return view('klijenti', ['klijenti' => $klijenti]);
            //dd(request('pretraga'));
        }

        $klijenti = Klijenti::where('userID', '=', session('userId'))->orderBy('id', 'desc')->
        paginate(5);

        return view('klijenti', ['klijenti' => $klijenti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        $klijenti = Klijenti::All();
        return $klijenti;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kreirajKlijenta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Ovdje ide sve sto storuje u bazu
        $klijent = new Klijenti;
        $klijent->name = $request->input('name');
        $klijent->telephone = $request->input('telephone');
        $klijent->email = $request->input('email');
        $klijent->comment = $request->input('comment');
        $klijent->userID = session('userId');
        $klijent->save();

        return redirect('/klijenti/create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $klijent = Klijenti::where('userID', '=', session('userId'))->where('id', '=', $id)->first();
        return view('klijent', ['klijent' => $klijent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $klijent = Klijenti::find($id)->first();
        return view('editujKlijenta')->with('klijent', $klijent);
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
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
        ]);


        $klijent = Klijenti::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
                'comment' => $request->input('comment'),
            ]);


        return redirect('/klijenti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klijent = Klijenti::where('id', $id);
        $klijent->delete();
        return redirect('/klijenti');
    }
}
