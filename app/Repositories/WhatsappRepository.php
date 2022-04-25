<?php

namespace App\Repositories;

use App\Models\Whatsapp as Model;
use App\Interfaces\WhatsappInterface;

class WhatsappRepository implements WhatsappInterface
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