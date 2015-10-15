<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    
	public $table = "calendars";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"date"
	];

	public static $rules = [
	    "title" => "required",
		"date" => "required"
	];

}
