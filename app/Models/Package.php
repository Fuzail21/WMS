<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "packages";
    protected $primaryKey = "pkgID";


    protected $fillable = [
        'pkgId',
        'pkgName',
        'pm',
        'purchasingAgent',
        'dateIn',
        'expectedDateOut',
        'boxId',
        'boxName' ,
    ];


    protected $casts = [
        'pkgID' => 'integer',
    ];
}
