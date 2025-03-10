<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FasilitasKamar extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_kamar';
    protected $guarded = ['id'];

    public function detail(): HasMany
    {
        return $this->hasMany(DetailFasilitas::class);
    }
    
}
