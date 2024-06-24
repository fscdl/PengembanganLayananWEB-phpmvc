<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Datadiri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'pekerjaan'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
