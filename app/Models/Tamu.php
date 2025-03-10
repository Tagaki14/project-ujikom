<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamu';
    protected $guarded = ['id'];

    // public function detailtamu(): HasMany
    // {
    //     return $this->hasMany(DetailTamu::class);
    // }

}
