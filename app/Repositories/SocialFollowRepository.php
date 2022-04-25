<?php

namespace App\Repositories;

use App\Models\SocialFollow as Model;
use App\Interfaces\SocialFollowInterface;

class SocialFollowRepository implements SocialFollowInterface
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