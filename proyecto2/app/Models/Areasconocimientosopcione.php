<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areasconocimientosopcione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areasconocimientosopciones';

    protected $fillable = ['codigo','nombre'];
	
}
