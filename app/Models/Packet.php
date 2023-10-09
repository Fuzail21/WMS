<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Packet extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "packets";
    protected $primaryKey = "packetID";


    protected $fillable = [
        'jobNumber',
        'dateIn',
        'materialType',
        'materialDescription',
        'numberOfBundles',
        'boxName',
        'pkgID',
    ];



    public function box()
{
    return $this->belongsTo(Box::class, 'boxName', 'boxName');
}
}
