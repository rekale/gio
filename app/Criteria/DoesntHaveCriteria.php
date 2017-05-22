<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class DoesntHaveCriteriaCriteria
 * @package namespace App\Criteria;
 */
class DoesntHaveCriteria implements CriteriaInterface
{

    private $relation;

    public function __construct($relation)
    {
        $this->relation = $relation;
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
        return $model->doesntHave($this->relation);
    }
}
