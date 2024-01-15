<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectDb extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'subjectDbs';

    protected $fillable = ['curso','nombre','descripcion','horas_creditos','horas_teoria','horas_laboratorio','horas_otros'];
	
}
