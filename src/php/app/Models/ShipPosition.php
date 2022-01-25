<?php

namespace App\Models;

use App\Filters\ShipPosition\ShipPositionFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShipPosition extends Model
{
    use HasFactory;

    /**
     * Table Definition
     * @var string
     */
    protected $table = 'ship_positions';

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'ship_position_id';

    /**
     * Attributes Protection
     * @var string
     */
    protected $guarded = [];

    public $timestamps = false;

    /**
     * @param Builder $builder
     * @param Request $request
     * @return Builder
     */
    public function scopeFilter(Builder $builder, Request $request): Builder
    {
        return (new ShipPositionFilter($request))->filter($builder);
    }
}
