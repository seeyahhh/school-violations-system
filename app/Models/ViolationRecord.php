<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViolationRecord extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'violation_records';

    protected $fillable = [
        'user_id',
        'vio_sanct_id',
        'notes',
        'status_id',
    ];

    public function canBeAppealed()
    {
        if ($this->appeal()->exists()) {
            return false;
        }

        if (! ($this->status->status_name === 'Under review')) {
            return false;
        }

        $canAppeal = $this->created_at->diffInDays(now()) < 3;

        // Update the Violation Record to In progress if there is no appeal after 3days
        if (!$canAppeal && $this->status_id === 1) {
            $this->update(['status_id' => 2]);
        }

        return $canAppeal;
    }

    public function formatCaseId()
    {
        return 'V-' . now()->year . '-' . $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function violationSanction()
    {
        return $this->belongsTo(ViolationSanction::class, 'vio_sanct_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function appeal()
    {
        return $this->hasOne(Appeal::class);
    }
}
