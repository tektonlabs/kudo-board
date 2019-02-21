<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Kudo;
use Exception;

class FormController extends Controller
{

    public function index()
    {
        $kudos = Kudo::all();
        return view('index', compact('kudos'));
    }


    public function show()
    {

    }


    public function store(Request $request)
    {
        $kudos = Kudo::all();

        $request->validate([
            'to' => 'required',
            'from' => 'required',
            'option' => 'required',
            // 'date' => 'date|date_format:dd/mm/yyyy',
            'message' => 'required|max:240',
        ]);

        try 
        {
            // dd($request->option);
            $kudo = Kudo::create([
                'to' => $request->to,
                'from' => $request->from,
                'date' => $request->date,
                'message' => $request->message,
            ]);

            $options = Option::find($request->option);
            $kudo->options()->attach($options);
        }
        catch(Exception $e)
        {
            return redirect()->route('kudo.index')->with([
                'message' => 'Hubo un error: '.$e->getMessage(),
                'kudos' => $kudos,
            ]);
            
        }

        return redirect()->route('kudo.index')->with([
            'message' => 'exito',
            'kudos' => $kudos,
        ]);

    }

    public function create()
    {
        $options = Option::all();

        return view('welcome', compact('options'));
    }
}
