<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Kudo;
use Exception;
use Carbon\Carbon;

class FormController extends Controller
{

    public function index()
    {
        $kudos = Kudo::paginate(5);
        return view('index', compact('kudos'));
    }


    public function show()
    {

    }


    public function store(Request $request)
    {
        $kudos = Kudo::paginate(5);

        $request->validate([
            'to' => 'required',
            'from' => 'required',
            'option' => 'required',
            'message' => 'required|max:240',
        ]);

        try 
        {
            $kudo = Kudo::create([
                'to' => $request->to,
                'from' => $request->from,
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
            'message' => 'Thank you! The Kudo card has been sent',
            'kudos' => $kudos,
        ]);

    }

    public function create()
    {
        $options = Option::all();

        return view('welcome', compact('options'));
    }
}
