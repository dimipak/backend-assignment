<?php

namespace App\Repositories\Eloquent\Internal\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ShipPositionRepositoryInterface
{
    public function getShipPositions(Request $request): LengthAwarePaginator;
}
