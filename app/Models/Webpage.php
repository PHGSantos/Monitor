<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
	protected $table = 'webpage';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'url', 'name'
	];
}