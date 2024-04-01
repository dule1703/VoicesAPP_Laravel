<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Glasac;

class GlasacController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ime_prezime' => 'required|max:255',
            'email' => 'required|email|unique:glasac',
            'jmbg' => 'required|size:13',
            'adresa' => 'required|max:255',
            'poverenistvo' => 'required|max:255',
        ]);

        Glasac::create($validatedData);

        return redirect()->back()->with('success', 'Data has been successfully submitted.');
    }
}
