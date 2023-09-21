<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloaded extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id', 'ip', 'user_agent', 'downloaded_at'
    ];

    public function file()
    {
        return $this->belongsTo(Files::class);
    }
}
