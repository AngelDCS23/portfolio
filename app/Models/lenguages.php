<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class lenguages extends Model{

    protected $table = "lenguages";

    protected $fillable = [
        'lenguage'
    ];

    public $timestamps = false;
}

