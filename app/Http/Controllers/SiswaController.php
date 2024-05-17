<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
          
        ]);

        $siswa = Siswa::create([
            'name' => $request->name,

           
        ]);


        return redirect()->route('siswas.index')->with('success', 'siswa created successfully.');
    }

    public function show(Siswa $siswa)
    {
        return view('siswas.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('siswas.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'name' => 'required',

     
        ]);



        $siswa->update([
            'name' => $request->name,


        ]);


        return redirect()->route('siswas.index')->with('success', 'siswa updated successfully.');
    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswas.index')->with('success', 'siswa deleted successfully.');
    }


}
