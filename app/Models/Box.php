<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $table = "boxes";
    protected $primaryKey = "boxId";


    protected $fillable = ['boxName', 'row_position', 'column_position', 'innerBox_position', 'rack_id'];

    // Define the relationship with the Rack model
    public function rack()
    {
        return $this->belongsTo(Racks::class, 'rack_id');
    }


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
