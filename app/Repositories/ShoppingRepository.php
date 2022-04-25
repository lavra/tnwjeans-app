<?php

namespace App\Repositories;

use App\Models\Shopping as Model;
use App\Interfaces\ShoppingInterface;

class ShoppingRepository implements ShoppingInterface
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($input)
    {
        return $this->model->create($input);
    }
}