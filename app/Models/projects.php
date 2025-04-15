<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class projects extends Model{

    protected $table = "proyects";

    protected $fillable = [
        'title',
        'description',
        'lenguages_id',
    ];

    public $timestamps = false;

    public function lenguagues(){
        return $this->belongsTo(lenguages::class,'languages_id','id');
    }
}
