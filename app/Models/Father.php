<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Father extends Model
{
    use HasFactory;
    
    // protected $guarded = [];

    protected $primaryKey = 'ctrlno';

    protected $table = "fathers";

    protected $fillable = [

        'personal_data_cesno',
        'father_last_name',
        'father_first_name',
        'father_middle_name',
        'name_extension',
        'encoder',

    ];

    public function familyPersonalData(): BelongsTo
    {
        return $this->belongsTo(PersonalData::class);
    }


}
