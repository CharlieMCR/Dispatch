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

    public function openBatch()
    {
        /**
         * @var $batch BatchEntity
         */
        $batch = $this->getEntity();
        $batch->setBatchStart(new \DateTime());
    }

    public function closeBatch()
    {
        /**
         * @var $batch BatchEntity
         */
        $batch = $this->getEntity();
        $batch->setBatchEnd(new \DateTime());
    }
}