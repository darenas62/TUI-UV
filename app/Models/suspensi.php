<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class suspensi extends Model
{
    
	public $table = "suspensis";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "ramo",
		"motivo"
	];

	public static $rules = [
	    "ramo" => "required",
		"motivo" => "max:300"
	];

}
