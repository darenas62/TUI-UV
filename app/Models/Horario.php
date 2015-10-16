<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    
	public $table = "horarios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"dow",
		"start",
		"end"
	];

	public static $rules = [
	    "title" => "required",
		"dow" => "required",
		"start" => "required",
		"end" => "required"
	];

}
