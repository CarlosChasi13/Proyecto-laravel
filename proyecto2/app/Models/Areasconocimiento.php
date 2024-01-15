<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areasconocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areasconocimientos';

    protected $fillable = ['conocimiento','id_docentes','id_area_con'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areasconocimientosopcione()
    {
        return $this->hasOne('App\Models\Areasconocimientosopcione', 'id', 'id_area_con');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docentes');
    }
    
}
