<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Http\Requests\StoreAdminsRequest;
use App\Http\Requests\UpdateAdminsRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.index', [
            'title' => 'Admins',
            'admins' => Admins::all()->whereNotIn('id', [1])
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create', [
            'title' => 'Admins',
            'bukus' => Admins::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminsRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:admins|min:6|max:255',
            'email' => 'required|unique:admins|email:rfc,dns',
            'password' => [ 'required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Admins::create($validatedData);

        return redirect('/admins')->with('success', 'Akun berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(Admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminsRequest  $request
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminsRequest $request, Admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admins $admins,Request $request)
    {
        Admins::destroy($request->id);

        return redirect('/admins')->with('successDelete', 'Admins has been deleted!');
    }
}
