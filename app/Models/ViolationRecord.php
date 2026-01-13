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

        return $this->created_at->diffInDays(now()) < 3;
    }

    public function formatCaseId()
    {
        return 'V-'.now()->year.'-'.$this->id;
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
