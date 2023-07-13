<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderByChoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'ctrlno';
    protected $table = 'gender_by_choices';
    protected $fillable = ['name'];
}
