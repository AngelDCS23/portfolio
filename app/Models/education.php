<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class education extends Model{

    protected $table = "education";

    protected $fillable = [
        'title',
        'subtitle',
        'initDate',
        'endDate',
        'img',
        'lenguages_id',
    ];

    public $timestamps = false;

    public function lenguagues(){
        return $this->belongsTo(lenguages::class,'languages_id','id');
    }
}
