<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
        $user-> name = $request->name;
        $user-> username = $request->username;
        $user-> email = $request->email;
        $user-> password = Hash::make($request->password);
        if($request->file('avatar'))
        {
            $file = $request->file('avatar');

            //$path = $request->Archivo->store('Act/'.$request->Id.'');

            $fileName = 'av-'.$request->Id.'-'.date("Ymd-His",time()).'.'.$file->getClientOriginalExtension();


            $path = $file->storeAs('avatars/'.$request->modulo_id.'', $fileName);
    //        return $path;
            $user-> avatar = $path;
        }
        else
        {

        }

        $user->save();
        return redirect()->route ('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function displayImage($filename)
    {

        $path = storage_public('avatars/' . substr(strrchr($filename, "/"), 1));

        if (!File::exists($path)) {

            abort(404);

        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }
}
