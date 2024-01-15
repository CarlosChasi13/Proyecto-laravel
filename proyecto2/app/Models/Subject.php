<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'subjects';

    protected $fillable = ['course','name','description','credits_hours','theory_hours','lab_hours','others_hours'];
	
}
