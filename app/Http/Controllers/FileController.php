<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fichiers;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*Recuperer tout les fichiers de la BDD et les afficher */
    public function index()
    {
       $file=Fichiers::all();
       return $file;
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
    /* Sauvegarder le ficher dans le dossier public/upload et sauvegarder son chemin dans la BDD */
    public function store(Request $request)
    {   
    
        $file=new Fichiers();
        $file->name=$request->name;
        $uploaded_file=$request->file;
        $fileName=$uploaded_file->getClientOriginalName();
        $uploaded_file->move('upload',$fileName);
        $file->file_path='upload/'.$fileName;
      
        
        $file->save();
        return response()->json($file);
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
}
