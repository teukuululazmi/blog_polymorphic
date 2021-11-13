<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Upload;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $foto = Upload::all();
        return view('homee', compact('foto'));
    }

    public function uploadPost(Request $request)
    {
        $foto = $request->file('foto');
        $waktu = time() . "_" . $foto->getClientOriginalName();
        $tempat = 'Images';

        $foto->move($tempat, $waktu);

        Upload::create([
            
            'foto' => $waktu,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back()->with('success', 'menambahkan');
    }

    public function uploadDelete($id)
    {
        Upload::where('id', $id)->delete($id);
        return redirect()->back()->with('success', 'dihapuskan');
    }

    public function uploadUpdate(Request $request, $id)
    {
        Upload::where('id', $id)->update([
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back()->with('success', 'menambahkan');
    }
}
