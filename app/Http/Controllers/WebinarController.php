<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use DB;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index () {
        $web = Webinar::latest()->get();
        return view('webinar.index', compact('web'));
    }

    public function create(){
        return view('webinar.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:7|max:50',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,svg|max:3072'
        ]);

        $web = Webinar::create($request->all()); 
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gmbrWebinar/', $request->file('gambar')->getClientOriginalName());
            $web->gambar = $request->file('gambar')->getClientOriginalName();
            $web->save();
        }

        if ($web) {
                return redirect()
                    ->route('webinar-index')
                    ->with([
                        'success' => 'New webinar has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        
        // $web = Webinar::create([
        //     'judul' => $request->judul
        // ]); 
    }

    public function update($id){
        $web = DB::table('webinars')->where('id',$id)->get();
        // dd($web);
        return view('webinar.update', compact('web'));
    }

    public function edit($id, Request $request){
        // dd($request->all());
        $ubah = Webinar::find($id);
        $awal = $ubah->gambar;

        if (isset($request->gambar)) {
            # code...
            $this->validate($request, [
                'judul' => 'required|min:7|max:50',
                'gambar' =>'required|image|mimes:jpg,png,jpeg,svg|max:3072'
            ]);
    
            $web = [
                'judul' => $request->judul,
                'gambar' => $awal,
            ];
            $request->gambar->move('gmbrWebinar/', $awal);
            
            $ubah->update($web);
            return redirect()->route('webinar-index')->with('success', 'Edit Data Success!');
        } else {
            $this->validate($request, [
                'judul' => 'required|min:7|max:50',
                // 'gambar' =>'required|image|mimes:jpg,png,jpeg,svg|max:3072'
            ]);
    
            $web = [
                'judul' => $request->judul,
                'gambar' => $request->gambar_lama,
            ];
            
            $ubah->update($web);
            return redirect()->route('webinar-index')->with('success', 'Edit Data Success!');
        }

    }

    public function destroy($id)
    {
        $hapus = Webinar::findOrFail($id);
        $file = ('gmbrWebinar/').$hapus->gambar;

        if(file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->route('webinar-index');

    }
}
