<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class experience_has_skills extends Model{

    protected $table = "experience_has_skills";

    protected $fillable = [
        'experience_id',
        'skills_id',
    ];

    public $timestamps = false;

    public function experience(){
        return $this->belongsTo(experience::class,'experience_id','id');
    }

    public function skill(){
        return $this->belongsTo(skills::class,'skills_id','id');
    }
}
