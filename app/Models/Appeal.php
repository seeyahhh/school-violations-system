<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'appeal_content',
        'violation_record_id',
        'is_accepted',
    ];

    protected $casts = [
        'is_accepted' => 'boolean',
    ];

    public function formatCaseId()
    {
        return 'A-'.now()->year.'-'.$this->id;
    }

    public function violationRecord()
    {
        // Allows an appeal to point to a soft-deleted record
        return $this->belongsTo(ViolationRecord::class)->withTrashed();
    }
}
