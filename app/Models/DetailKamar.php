<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailKamar extends Model
{
    use HasFactory;

    protected $table = 'detail_kamar';
    protected $guarded = ['id'];

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }

    public function detailreservasi(): HasMany
    {
        return $this->hasMany(DetailReservasi::class);
    }
}
