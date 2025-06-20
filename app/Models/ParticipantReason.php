<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantReason extends Model
{
    use HasFactory;

    protected $table = 'participant_reasons';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'peserta_id', 'status', 'catatan', 'alasan'];


    public function participant()
    {
        return $this->belongsTo(Participant::class, 'peserta_id');
    }
}
