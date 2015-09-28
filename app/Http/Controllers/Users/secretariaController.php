<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class secretariaController extends Controller {
  public function index() {
    return \View::make('users.secretaria');
  }
}