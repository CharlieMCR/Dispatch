<?php

namespace Charliemcr\Dispatch\Infrastructure;


use Ramsey\Uuid\Uuid;

/**
 * Emulates an ancestor Entity class
 *
 * Class Entity
 * @package Charliemcr\Dispatch\Infrastructure
 */
class Entity
{
    protected $id;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }
}