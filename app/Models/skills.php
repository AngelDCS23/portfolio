<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class skills extends Model{

    protected $table = "skills";

    protected $fillable = [
        'skill'
    ];

    public $timestamps = false;

}
