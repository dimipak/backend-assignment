<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        $totalPages = ceil($this->total()/$this->perPage());

        $previousPage = $this->currentPage() == 1 ? null : $this->currentPage() - 1;
        $nextPage = $this->currentPage() == $totalPages ? null : $this->currentPage() + 1;

        return [
            'total' => $this->total(),
            'total_pages' => ceil($this->total()/$this->perPage()),
            'previous_page' => $previousPage,
            'current_page' => $this->currentPage(),
            'next_page' => $nextPage,
            'items_per_page' => $this->perPage()
        ];
    }
}
