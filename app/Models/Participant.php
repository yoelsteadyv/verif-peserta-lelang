<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'nama', 'pin'];

    public function reasons()
    {
        return $this->hasMany(ParticipantReason::class, 'peserta_id');
    }
}
