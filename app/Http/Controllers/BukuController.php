<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::orderBy('created_at','desc')->get();
        return view('buku.index', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string',
            'pengarang' => 'required|string',
        ]);

        Buku::create($request->only(['judul','pengarang']));

        return redirect()->route('buku.index');
    }

    public function edit(Buku $buku)
    {
        $bukus = Buku::orderBy('created_at','desc')->get();
        return view('buku.index', compact('bukus','buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul'     => 'required|string',
            'pengarang' => 'required|string',
        ]);

        $buku->update($request->only(['judul','pengarang']));

        return redirect()->route('buku.index');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
