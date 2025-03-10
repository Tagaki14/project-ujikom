<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailFasilitas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }

    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(FasilitasKamar::class, 'fasilitas_kamar_id');
    }
}
