<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Glasac;
use App\Models\Opstina;

class GlasacController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ime_prezime' => 'required|max:255',
            'email' => 'required|email|unique:glasac',
            'jmbg' => 'required|size:13|unique:glasac',
            'adresa' => 'required|max:255',
            'poverenistvo' => 'required|max:255',
        ]);

        Glasac::create($validatedData);

        return redirect()->back()->with('success', 'Podaci su uspešno sačuvani!');
    }

    public function showTable()
    {
        return view('/profile.partials.table');
    }

    public function loadTable() {
        $glasaci = Glasac::all();
        return response()->json($glasaci);
    }

    public function getGlasacForma($id) {
        $glasac = Glasac::find($id);
        $opstine = Opstina::all();
        
        return view('/profile.partials.editFormGlasac', compact('glasac', 'opstine')); 
    }
    
    public function updateGlasac(Request $request, $id){
        $glasac = Glasac::findOrFail($id);

        $validatedData = $request->validate([
            'ime_prezime' => 'required|max:255',
            'email' => 'required|email|unique:glasac,email,'.$glasac->id,
            'jmbg' => 'required|size:13|unique:glasac,jmbg,'.$glasac->id,
            'adresa' => 'required|max:255',
            'poverenistvoEdit' => 'required|max:255',
        ]);

        
        $glasac->update([
            'ime_prezime' => $validatedData['ime_prezime'],
            'email' => $validatedData['email'],
            'jmbg' => $validatedData['jmbg'],
            'adresa' => $validatedData['adresa'],
            'poverenistvo' => $validatedData['poverenistvoEdit'] 
        ]);

        return redirect()->back()->with('success', 'Glasač je uspešno ažuriran!');
    }

    public function deleteGlasac($id)
    {
        try {
            $glasac = Glasac::findOrFail($id);
            $glasac->delete();
    
            return redirect()->route('show.table')->with('success', 'Glasac je uspešno izbrisan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Glasac.');
        }
    }

}
