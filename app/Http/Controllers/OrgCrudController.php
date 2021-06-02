<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrgCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizer = Organizer::all();
        return view('organizers.orgCRUD', compact('organizer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Org_nama' => 'required',
            'Org_alamat' => 'required',
            'Org_email' => 'required',
            'Org_password' => 'required',
        ]);
        Organizer::create([
            'Org_nama' => $request->Org_nama,
            'Org_alamat' => $request->Org_alamat,
            'Org_telepon' => $request->Org_telepon,
            'Org_email' => $request->Org_email,
            'Org_password' => $request->Org_password,
            'Org_description' => $request->Org_description
        ]);

        return redirect('/organizers')->with('status','Data organizer berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        return view('organizers.show', compact('organizer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {
        return view('organizers.update', compact('organizer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizer $organizer)
    {
        Organizer::where('Org_id', $organizer->Org_id)
                ->update([
                    'Org_nama' => $request->Org_nama,
                    'Org_alamat' => $request->Org_alamat,
                    'Org_telepon' => $request->Org_telepon,
                    'Org_email' => $request->Org_email,
                    'Org_password' => $request->Org_password,
                    'Org_description' => $request->Org_description
                ]);
        return redirect('/organizers')->with('status','Data organizer berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
        Organizer::destroy($organizer->Org_id);
        return redirect('/organizers')->with('status','Data organizer berhasil dihapus');
    }
}
