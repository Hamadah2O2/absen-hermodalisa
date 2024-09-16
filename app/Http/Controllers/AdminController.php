<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function manageUserPasien()
    {
        echo "Halaman manage pasien";
    }

    /**
     * Display a listing of the resource.
     */
    public function indexDokter()
    {
        $dokter = User::role('dokter')->get();
        return view('admin.manage.dokter', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createDokter()
    {
        //
        return view('admin.tambah.dokter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDokter(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole("dokter");

        return redirect()->route("user.dokter")->with("success", "Berhasil tambah data. " . $user->username);
    }

    /**
     * Display the specified resource.
     */
    public function showDokter(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editDokter(string $id)
    {
        $dokter = User::role("dokter")->findOrFail($id);
        return view("admin.edit.dokter", compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDokter(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $id],
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $dokter = User::role("dokter")->findOrFail($id);

        $dokter->name = $request->name;
        $dokter->email = $request->email;
        $dokter->username = $request->username;

        if ($request->filled("password")) {
            $dokter->password = Hash::make($request->password);
        }

        $dokter->save();

        return redirect()->route("user.dokter")->with("success", "Berhasil edit data " . $dokter->username);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyDokter(string $id)
    {
        //
        $dokter = User::role("dokter")->findOrFail($id);
        $dokter->delete();
        return redirect()->route("user.dokter")->with("success", "Berhasil hapus data " . $dokter->username);
    }
}
