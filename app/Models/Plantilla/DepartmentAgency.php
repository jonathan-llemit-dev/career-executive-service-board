<?php

namespace App\Models\Plantilla;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentAgency extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'plantilla_tblDeptAgency';
    protected $primaryKey = 'deptid';

    public function sectorManager(): BelongsTo
    {
        return $this->belongsTo(SectorManager::class, 'plantilla_tblSector_id', 'sectorid');
    }

    public function departmentAgency(): BelongsTo
    {
        return $this->belongsTo(DepartmentAgencyType::class, 'plantillalib_tblAgencyType_id', 'agency_typeid');
    }
}
