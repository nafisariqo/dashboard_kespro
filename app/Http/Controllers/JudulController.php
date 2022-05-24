<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    public function create(){
        return view('judul.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());    
        try {
            //code...
            $insert = DB::table('juduls')
                ->insert([
                    'judul' => $request->judul,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            if ($insert) {
                # code...
                return redirect()->route('quiz-index')->with('success', 'Insert Data Success!');
            } else {
                return redirect()->route('quiz-index')->with('error', 'Insert Data Failed!');
            }
        } catch (Exception $e) {
            //throw $e;
            return redirect()->route('quiz-index')->with('error', $e->getMessage());
        }
    }

    // public function update($id){
    //     $jud = Judul::find($id);
    //     return view('judul.update', compact('jud'));
    // }


}
