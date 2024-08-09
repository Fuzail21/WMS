<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchLocation extends Model
{
    use HasFactory;


    protected $table = "branch_location";
    protected $primaryKey = "branchID";


    protected $fillable = [
        'branchLocation',
        'branchID'
    ];
}

