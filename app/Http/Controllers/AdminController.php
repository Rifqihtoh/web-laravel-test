<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
    	//$users = DB::table('users')->get();
    	$users = User::where('User_type','u')
                        ->get();
    	return view('userCRUD', ['users' => $users]);
    }
    public function show(User $user)
    {
    	return view('showUser', compact('user'));
    }
    public function create()
    {
    	return view('createUser');
    }
    public function store(Request $request)
    {
        /*
        $user = new User;
        $user->Nama = $request->Nama;
        $user->Alamat = $request->Alamat;
        $user->No_telepon = $request->Telepon;
        $user->Email = $request->Email;
        $user->Password = $request->Password;
        $user->Jenis_kelamin = $request->Gender;
        $user->Tanggal_lahir = $request->TanggalLahir;
        $user->User_desc = $request->userdesc;

        $user->save();
        */

        $request->validate([
            'Nama' => 'required',
            'Alamat' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'No_telepon' => $request->Telepon,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'Jenis_kelamin' => $request->Gender,
            'Tanggal_lahir' => $request->TanggalLahir,
            'User_desc' => $request->userdesc
        ]);

    	return redirect('/users')->with('status','Data user berhasil ditambah');
    }
    public function destroy(User $user)
    {
        User::destroy($user->User_id);
        return redirect('/users')->with('status','Data user berhasil dihapus');
    }
    public function edit(User $user)
    {
        return view('updateUser', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'Nama' => 'required',
            'Alamat' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::where('User_id', $user->User_id)
                ->update([
                    'Nama' => $request->Nama,
                    'Alamat' => $request->Alamat,
                    'No_telepon' => $request->Telepon,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'Jenis_kelamin' => $request->Gender,
                    'Tanggal_lahir' => $request->TanggalLahir,
                    'User_desc' => $request->userdesc
                ]);
        return redirect('/users')->with('status','Data user berhasil diperbarui');
    }
}
