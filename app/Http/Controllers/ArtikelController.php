<?php

namespace App\Http\Controllers;
 
use App\Models\Artikel;
use DB;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index () {
        $post = Artikel::latest()->get();
        return view('artikel.index', compact('post'));
    }

    public function create(){
        return view('artikel.create');
    }

    public function store(Request $request){
        // dd($request->all()); 

        $this->validate($request, [
            'gambar' => 'image|mimes:jpg,png,jpeg,svg|max:3072',
            'judul' => 'required|min:7|max:50',
            'proofby' => 'required|min:2|max:50'
        ]);

        $post = Artikel::create($request->all()); 
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gmbrArtikel/', $request->file('gambar')->getClientOriginalName());
            $post->gambar = $request->file('gambar')->getClientOriginalName();
            $post->save();
        }

        if ($post) {
                return redirect()
                    ->route('artikel-index')
                    ->with([
                        'success' => 'New article has been created successfully'
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
        $post = DB::table('artikels')->where('id',$id)->get();
        return view('artikel.update', compact('post'));
    }

    public function show($id){
        $post = DB::table('artikels')->where('id',$id)->first();
        return view('artikel.more',  ['post'=>$post]);
    }

    public function destroy($id)
    {
        $hapus = Artikel::findOrFail($id);
        $file = ('gmbrArtikel/').$hapus->gambar;

        if(file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->route('artikel-index');
    }
}
