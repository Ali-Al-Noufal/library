<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id', 'date', 'check_in', 'check_out'
    ];

    protected $casts = [
        'date'      => 'date:Y-m-d',
        'check_in'  => 'datetime:H:i:s',
        'check_out' => 'datetime:H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getDurationAttribute()
    {
        if (!$this->check_in || !$this->check_out) {
            return null;
        }

        return \Carbon\Carbon::parse($this->check_in)
            ->diffForHumans(\Carbon\Carbon::parse($this->check_out), true);
    }
}
