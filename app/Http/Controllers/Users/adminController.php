<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller {
  public function index() {
    return \View::make('users.admin');
  }
}
