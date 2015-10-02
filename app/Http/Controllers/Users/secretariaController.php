<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class secretariaController extends Controller {
  public function index() {
    return \View::make('users.secretaria');
  }
  public function publicar(){

    return 0;
  }

  protected function create(array $data)
  {
    return noticia::create([
        'titulo' => $data['titulo'],
        'contenido' => $data['contenido']
    ]);
  }  
}
