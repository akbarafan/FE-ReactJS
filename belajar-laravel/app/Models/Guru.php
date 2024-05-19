<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guru extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $fillable = ['name', 'major', 'room_id'];

    public function kelas(): HasOne
    {
        return $this->hasOne(Kelas::class, 'id', 'room_id');
    }
}
