<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racks extends Model
{
    use HasFactory;


    protected $table = "racks";
    protected $primaryKey = "rack_id";


    protected $fillable = [
        'rackName',
        'locID',
        'isStaging'
    ];

    public function boxes()
    {
        return $this->hasMany(Box::class, 'rack_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'locID', 'locID');
    }
}
