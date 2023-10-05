<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacksStructure extends Model
{
    use HasFactory;


    protected $table = "racks_structure";
    protected $primaryKey = "id";


    protected $fillable = [
        'rack_id',
        'rows',
        'columns',
        'innerBoxes'
    ];
}
