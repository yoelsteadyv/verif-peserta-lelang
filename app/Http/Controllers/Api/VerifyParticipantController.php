<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyParticipantRequest;
use App\Services\ParticipantVerificationService;

class VerifyParticipantController extends Controller
{
    protected $service;

    public function __construct(ParticipantVerificationService $service)
    {
        $this->service = $service;
    }

    public function __invoke(VerifyParticipantRequest $request)
    {
        $this->service->verify($request->validated());

        return response()->json([
            'status_code' => 200,
            'message' => 'Berhasil memprises verifikasi peserta lelang',
        ]);
    }
}
