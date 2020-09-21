<?php

namespace App\Admin\Repositories;

use App\User as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class User extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
        protected $eloquentClass = Model::class;
}
