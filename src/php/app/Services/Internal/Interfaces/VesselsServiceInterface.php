<?php

namespace App\Services\Internal\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface VesselsServiceInterface
{
    public function getShipPositions(Request $request): LengthAwarePaginator;
}
