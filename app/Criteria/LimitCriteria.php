<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class LatestCriteria
 * @package namespace App\Criteria;
 */
class LimitCriteria implements CriteriaInterface
{
    private $take;
    private $skip;

    /**
     *
     * @param integer $take
     * @param integer|null $skip
     */
    public function __construct($take, $skip = null)
    {
        $this->take = $take;
        $this->skip = $skip;
    }
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $query = $model->take($this->take);
        return isset($skip) ? $query->skip($this->skip) : $query;
    }
}
