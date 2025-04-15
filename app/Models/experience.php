<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class experience extends Model{

    protected $table = "experience";

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'languages_id',
    ];

    public $timestamps = false;

    public function lenguagues(){
        return $this->belongsTo(lenguages::class,'languages_id','id');
    }
}
