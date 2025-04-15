<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class menu extends Model{

    protected $table = "menu";

    protected $fillable = [
        'men1',
        'men2',
        'men3',
        'men4',
        'lenguages_id'
    ];

    public $timestamps = false;

    public function lenguagues(){
        return $this->belongsTo(lenguages::class,'languages_id','id');
    }
}
