<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class person extends Model{

    protected $table = "person";

    protected $fillable = [
        'name',
        'ocupation',
        'place',
        'description',
        'email',
        'github',
        'linkedin',
        'image'
    ];

    public $timestamps = false;

    public function lenguagues(){
        return $this->belongsTo(lenguages::class,'languages_id','id');
    }
}
