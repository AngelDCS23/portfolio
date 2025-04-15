<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class proyects_has_skills extends Model{

    protected $table = "proyects_has_skills";

    protected $fillable = [
        'proyects_id',
        'skills_id',
    ];

    public $timestamps = false;

    public function projects(){
        return $this->belongsTo(projects::class,'proyects_id','id');
    }

    public function skill(){
        return $this->belongsTo(skills::class,'skills_id','id');
    }
}
