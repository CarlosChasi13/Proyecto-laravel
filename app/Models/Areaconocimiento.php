<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areaconocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areaconocimiento';

    protected $fillable = ['nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areainteres()
    {
        return $this->hasMany('App\Models\Areaintere', 'id_areaconocimiento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function codigoareaconocimientos()
    {
        return $this->hasMany('App\Models\Codigoareaconocimiento', 'id_areaconocimiento', 'id');
    }
    
}
