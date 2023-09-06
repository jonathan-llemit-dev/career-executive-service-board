<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLibTblRegion extends Model
{
    use HasFactory;
    protected $table = 'profilelib_tblregion';
    protected $primaryKey = 'reg_code';
}
