<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model {
    const STATUSES = ['Pending', 'Reviewed', 'Resolved'];

    protected $fillable = [
        'reporter_id',
        'reportable_id',
        'reportable_type',
        'reason',
        'status',
    ];

    public function reporter() {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function reportable() {
        return $this->morphTo();
    }
}
