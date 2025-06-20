<?php

namespace App\Services;

use App\Models\Participant;
use App\Models\ParticipantReason;
use Illuminate\Support\Facades\DB;
use App\Services\PinGeneratorService;

class ParticipantVerificationService
{
  protected $pinService;

  public function __construct(PinGeneratorService $pinService)
  {
    $this->pinService = $pinService;
  }

  public function verify(array $data): void
  {
    DB::transaction(function () use ($data) {
      $participant = Participant::findOrFail($data['peserta']);

      $statusFinal = $data['status'] === 'TERIMA' ? 'BIDDING' : 'DITOLAK';

      if ($statusFinal === 'BIDDING') {
        $participant->pin = $this->pinService->generate();
        $participant->save();
      }

      ParticipantReason::create([
        'peserta_id' => $participant->id,
        'status' => $statusFinal,
        'catatan' => $data['catatan'] ?? null,
        'alasan' => $data['alasan'] ?? null,
      ]);
    });
  }
}
