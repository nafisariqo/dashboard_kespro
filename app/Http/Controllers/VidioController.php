<?php

namespace App\Http\Controllers;

use App\Models\Vidio;
use Storage;
use DB;
use Illuminate\Http\Request;

class VidioController extends Controller
{
    public function index () {
        $vidio = Vidio::latest()->get();
        return view('vidio.index', compact('vidio'));
    }

    public function create(){
        return view('vidio.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpg,png,jpeg,svg|max:3072',
            'title' => 'string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
            'proofby' => 'string|max:100',
            'penjelasan' => 'string|min:10',
        ]);
        $vidio = new Vidio;
        if($request->hasFile('gambar')){
            $path = $request->file('gambar')->move('gmbrVideo/', $request->file('gambar')->getClientOriginalName());
            $path->gambar = $request->file('gambar')->getClientOriginalName();
            $vidio->gambar = $path;
        }
        $vidio->title = $request->title;
        if ($request->hasFile('video'))
        {
            // $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
            $path = $request->file('video')->move('Video/', $request->file('video')->getClientOriginalName());
            $path->video = $request->file('video')->getClientOriginalName();
            $vidio->video = $path;
        }
        $vidio->proofby = $request->proofby;
        $vidio->penjelasan = $request->penjelasan;
        $vidio->save();

        if ($vidio) {
            return redirect()
                ->route('vidio-index')
                ->with([
                    'success' => 'New video learning has been added successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
   
    }

    public function update($id){
        $vidio = DB::table('vidios')->where('id',$id)->get();
        return view('vidio.update', compact('vidio'));
    }

    public function show($id){
        $post = DB::table('vidios')->where('id',$id)->first();
        return view('vidio.more',  ['post'=>$post]);
    }

    public function edit($id, Request $request){
        $ubah = Vidio::find($id);
        $awal = $ubah->gambar;

        if (isset($request->gambar)) {
            # code...
            $this->validate($request, [
                'gambar' =>'required|image|mimes:jpg,png,jpeg,svg|max:3072',
                'title' => 'string|max:255',
                'video' => 'required|file|mimetypes:video/mp4',
                'proofby' => 'string|max:100',
                'penjelasan' => 'string|min:10'
            ]);
    
            $vidio = [
                'gambar' => $awal,
                'title' => $request->title,
                'video' => $request->video,
                'proofby' => $request->proofby,
                'penjelasan' => $request->penjelasan,
            ];
            $request->gambar->move('gmbrVideo/', $awal);
            
            $ubah->update($vidio);
            return redirect()->route('vidio-index')->with('success', 'Edit Data Success!');
        } else {
            $this->validate($request, [
                'judul' => 'required|min:7|max:50',
                'video' => 'required|file|mimetypes:video/mp4',
                'proofby' => 'string|max:100',
                'penjelasan' => 'string|min:10'
            ]);
    
            $vidio = [
                'gambar' => $request->gambar_lama,
                'title' => $request->title,
                'video' => $request->video,
                'proofby' => $request->proofby,
                'penjelasan' => $request->penjelasan,
            ];
            
            $ubah->update($vidio);
            return redirect()->route('vidio-index')->with('success', 'Edit Data Success!');
        }
    }

    public function delete($id)
    {
        $hapus = Vidio::findOrFail($id);
        $file = ('Video/').$hapus->video;

        if(file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->route('vidio-index');

    }
}
