<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opstina;

class OpstinaController extends Controller
{
    public function getOpstine()
    {
        $opstine = Opstina::pluck('naziv_opstine', 'id');
        return response()->json($opstine);
    }
}
