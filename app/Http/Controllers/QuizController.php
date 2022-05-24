<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Judul;
use Illuminate\Http\Request;
use DB;
use Exception;

class QuizController extends Controller 
{
    public function index () {
        $data = DB::table('quizzes')
            ->select('quizzes.id', 'quizzes.pertanyaan', 'quizzes.jawaban', 'quizzes.answer', 'juduls.judul')
            ->join('juduls', 'juduls.id', 'quizzes.juduls_id')
            ->get();
        $jdl = DB::table('juduls')
            ->select('*')
            ->get();
            // dd($data);
        return view('quiz.index', compact('data', 'jdl'));
    
        // $data = Quiz::with('judul');
        // dd($data);
    }

    public function create(){
        $jdl = DB::table('juduls')->get();
        return view('quiz.create', compact('jdl'));
    }

    public function store(Request $request)
    {
        // dd($request->all());    
        try {
            //code...
            $insert = DB::table('quizzes')
                ->insert([
                    'juduls_id' => $request->juduls_id,
                    'pertanyaan' => $request->pertanyaan,
                    'jawaban' => $request->jawaban,
                    'answer' => $request->answer,
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

    public function update($id){
        // $jdl = Judul::all();
        // $data = Quiz::with('judul')->find($id);
        $jdl = DB::table('juduls')
            ->select('*')
            ->get();
        $data = DB::table('quizzes')
            ->select('quizzes.id', 'quizzes.pertanyaan', 'quizzes.jawaban', 'quizzes.answer', 'juduls.judul', 'quizzes.juduls_id')
            ->join('juduls', 'juduls.id', 'quizzes.juduls_id')
            ->where('quizzes.id', '=', $id)
            ->get();
            
        return view('quiz.update', compact('data', 'jdl'));
    }

    public function ubah($id){
        $jdl = DB::table('juduls')
                ->select('juduls.id', 'juduls.judul')
                ->where('juduls.id', '=', $id)
                ->get();
        return view('judul.update', compact('jdl'));
    }

    public function edit(Request $request, $id){
        $data = Quiz::find($id);
        $data->update($request->all());

        return redirect()->route('quiz-index')->with('success', 'Edit Data Success!');
    }

    public function modif(Request $request, $id){
        $jdl = Judul::find($id);
        $jdl->update($request->all());
        // dd($request->all());
        return redirect()->route('quiz-index')->with('success', 'Edit Data Success!');
    }

    public function destroy($id){
        // $data = Quiz::find($id);
        // $data->delete();
        DB::table('quizzes')->where('id', $id)->delete();
        DB::table('juduls')->where('id', $id)->delete();
        return redirect()->route('quiz-index');
    }

}
