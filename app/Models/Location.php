<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;


    protected $table = "locations";
    protected $primaryKey = "locID";


    protected $fillable = [
        'name',
        'locID',
        'branchID',
        'relation',
        'parentId',
        'haveChild',
    ];


    // Relationship: A location can have many children
    public function children()
    {
        return $this->hasMany(Location::class, 'parentId');
    }

    // Relationship: A location belongs to a parent
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parentId');
    }
}
