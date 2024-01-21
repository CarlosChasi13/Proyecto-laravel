<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areaintere extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areainteres';

    protected $fillable = ['tema','descripcion','id_docente'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    
}
