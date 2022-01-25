<?php


namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


abstract class AbstractFilter
{
    protected Request $request;

    protected array $filters = [];

    /**
     * AbstractFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Make filtering
     * @param Builder $builder
     * @return Builder
     */
    public function filter(Builder $builder): Builder
    {
        foreach($this->getFilters() as $filter => $value)
        {
            $this->resolveFilter($filter)->filter($builder, $value);
        }
        return $builder;
    }

    /**
     * Get available filters
     * @return array|void
     */
    protected function getFilters()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    /**
     * Resolve filter
     * @param $filter
     * @return mixed
     */
    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
