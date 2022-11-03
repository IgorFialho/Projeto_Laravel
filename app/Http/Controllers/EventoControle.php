<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publication;
use  App\Models\User;

class EventoControle extends Controller
{
    public function index(){

        return view('welcome');
       
    }


    public function mainimg(){

        $user = auth()->user();

        $publications = $user->publications;

        return view('main', ['publications' => $publications]);
    }

    public function welcome(){

        $user = auth()->user();

        $publications = $user->publications;

        return view('welcome', ['publications' => $publications]);
    }


    public function dashboard(){

        $user = auth()->user();

        $publications = $user->publications;

        return view('dashboard', ['publications' => $publications]);
    }

    public function destroy($id){

        Publication::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Publicação Excluída com sucesso !');

    }

    
    public function posts(){

        $search = request('search');

        if($search) {

            $publications = Publication::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $publications = Publication::all();
        }

        return view('publicacoes',['publications' => $publications, 'search' => $search]);

    }

    public function post(){

        return view('publicar',);
    }


    public function store(Request $request){

        $publicar = new Publication;

        $publicar->title = $request->title;
        $publicar->description = $request->description;
        $publicar->city = $request->city;
        $publicar->private = $request->private;
    
        // Image Upload

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension =  $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/imgPublications'), $imageName);

            $publicar->image = $imageName;
        }

        $user = auth()->user();
        $publicar->user_id = $user->id;

        $publicar->save();


        return redirect('/publicacoes')->with('msg', 'Publicação realizada com sucesso !');

    }

    
    public function imgperfil(Request $request){

        // Image Upload Perfil
        $imgPerfil = new User;

        if($request->hasFile('imagePerfil') && $request->file('imagePerfil')->isValid()) {

            $requestImage = $request->imagePerfil;

            $extension =  $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/imgPerfil'), $imageName);

            $imgPerfil->imagePerfil = $imageName;
        }

        $user = auth()->user();
        $imgPerfil->save();


        return redirect('/dashboard')->with('msg', 'imagem de perfil atualizada com sucesso!');
    }


}


