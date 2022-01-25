<?php

namespace App\Repositories\Eloquent\Internal\Implementations;

use App\Models\ShipPosition;
use App\Repositories\Eloquent\Internal\Interfaces\ShipPositionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ShipPositionRepository implements ShipPositionRepositoryInterface
{
    protected ShipPosition $shipPositionModel;
    public int $perPage;

    public function __construct(
        ShipPosition $shipPosition
    )
    {
        $this->perPage = config('marinetraffic.per_page');
        $this->shipPositionModel = $shipPosition;
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getShipPositions(Request $request): LengthAwarePaginator
    {
        return $this->shipPositionModel::query()
            ->filter($request)
            ->paginate($this->perPage);
    }
}
