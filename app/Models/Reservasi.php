<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $guarded = ['id'];

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }
    public function detail(): HasMany
    {
        return $this->hasMany(DetailReservasi::class);
    }
    public function ulasan(): HasMany
    {
        return $this->hasMany(UlasanKamar::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
