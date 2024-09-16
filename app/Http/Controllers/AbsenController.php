<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $absen = Absen::where('user_id', $user->id)->get();
        return view("absen", compact('absen'));
    }

    public function update($id)
    {
        $absen = Absen::findOrFail($id);

        $status = $absen->status;

        $absen->status = ($status == "belum") ? "sudah" : "belum";

        $absen->save();

        return redirect()->route("absen")->with("success", "Absen di update.");
    }
}
