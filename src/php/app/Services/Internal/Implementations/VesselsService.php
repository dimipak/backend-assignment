<?php

namespace App\Services\Internal\Implementations;

use App\Repositories\Eloquent\Internal\Interfaces\ShipPositionRepositoryInterface;
use App\Services\Internal\Interfaces\VesselsServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class VesselsService implements VesselsServiceInterface
{
    protected ShipPositionRepositoryInterface $shipPositionRepository;

    /**
     * @param ShipPositionRepositoryInterface $shipPositionRepository
     */
    public function __construct(
        ShipPositionRepositoryInterface $shipPositionRepository
    )
    {
        $this->shipPositionRepository = $shipPositionRepository;
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getShipPositions(Request $request): LengthAwarePaginator
    {
        return $this->shipPositionRepository->getShipPositions($request);
    }
}
