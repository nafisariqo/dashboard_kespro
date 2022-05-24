<?php

namespace App\Http\Controllers;

use App\Models\Vidio;
use Illuminate\Support\Facades\DB;
use Storage;
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
            'title' => 'string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
        ]);
        $vidio = new Vidio;
        $vidio->title = $request->title;
        if ($request->hasFile('video'))
        {
            // $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
            $path = $request->file('video')->move('Video/', $request->file('video')->getClientOriginalName());
            $path->video = $request->file('video')->getClientOriginalName();
            $vidio->video = $path;
        }
        $vidio->save();

        if ($vidio) {
            return redirect()
                ->route('vidio-index')
                ->with([
                    'success' => 'New video has been added successfully'
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

    public function update(){
        return view('vidio.update');
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
