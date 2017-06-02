<?php

namespace App\Criteria;

use App\Models\Category;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CategoryCriteria
 * @package namespace App\Criteria;
 */
class CategoryCriteria implements CriteriaInterface
{
    private $name;

    public function __construct($categoryName)
    {
        $this->name = $categoryName;
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
        $catId = Category::whereName($this->name)->first()->id;

        return $model->where('name', '=', $catId);
    }
}
