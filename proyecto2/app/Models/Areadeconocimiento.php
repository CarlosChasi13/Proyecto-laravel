<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areadeconocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areadeconocimiento';

    protected $fillable = ['id_docente','id_area'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areasconocimientosopcione()
    {
        return $this->hasOne('App\Models\Areasconocimientosopcione', 'id', 'id_area');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
