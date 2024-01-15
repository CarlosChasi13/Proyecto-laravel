<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'departamentos';

    protected $fillable = ['Nombre'];
	
}
