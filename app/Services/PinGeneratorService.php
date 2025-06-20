<?php

namespace App\Services;

class PinGeneratorService
{
  public function generate(): string
  {
    return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
  }
}
