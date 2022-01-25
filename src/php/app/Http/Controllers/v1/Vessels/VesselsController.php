<?php

namespace App\Http\Controllers\v1\Vessels;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaginationResource;
use App\Http\Resources\ShipPositionsResource;
use App\Services\Internal\Interfaces\VesselsServiceInterface;
use App\Traits\JResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VesselsController extends Controller
{
    use JResponse;

    protected VesselsServiceInterface $vesselsService;

    /**
     * @param VesselsServiceInterface $vesselsService
     */
    public function __construct(
        VesselsServiceInterface $vesselsService
    )
    {
        $this->vesselsService = $vesselsService;
    }

    /**
     * Get all vessels
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getVessels(Request $request): JsonResponse
    {
        $shipPositions = $this->vesselsService->getShipPositions($request);

        return $this->successResponse('SHIP_POSITIONS_RETRIEVED', [
            'ship_positions' => ShipPositionsResource::collection($shipPositions),
            'pagination' => new PaginationResource($shipPositions)
        ]);
    }
}
