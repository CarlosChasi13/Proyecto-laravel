<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodosacademico extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'periodosacademicos';

    protected $fillable = ['nivel','siglas','mes_inicio','año_inicio','mes_fin','año_fin'];
	
}
