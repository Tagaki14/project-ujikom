<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailReservasi extends Model
{
    use HasFactory;
    protected $table = 'detail_reservasi';
    protected $guarded = ['id'];

    public function reservasi(): BelongsTo
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function detailkamar(): BelongsTo
    {
        return $this->belongsTo(DetailKamar::class, 'detail_kamar_id');
    }

}
