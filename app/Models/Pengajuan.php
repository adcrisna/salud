<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';

    public function Sekolah()
    {
        return $this->belongsTo(User::class, 'sekolah_id', 'id');
    }
}
