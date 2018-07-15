<?php

namespace Charliemcr\Dispatch\Domain\Batches;


use Charliemcr\Dispatch\Infrastructure\Repository;

/**
 * Emulates a Batch Repository
 *
 * Class BatchRepository
 * @package Charliemcr\Dispatch\Domain\Batches
 */
class BatchRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
        $this->setEntity(new BatchEntity());
    }
}