<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $guarded = ['id'];

    public function detailkamar(): HasMany
    {
        return $this->hasMany(DetailKamar::class);
    }

    public function detailfasilitas(): HasMany
    {
        return $this->hasMany(DetailFasilitas::class);
    }

    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class);
    }
}
