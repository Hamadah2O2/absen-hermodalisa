<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUserDokter()
    {
        $dokter = User::role('dokter')->get();
        return view('admin.manage-dokter', compact('dokter'));
    }

    public function manageUserPasien()
    {
        echo "HAlaman manage pasien";
    }
}
