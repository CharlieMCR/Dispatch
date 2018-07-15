<?php

namespace Charliemcr\Dispatch\Domain\Batches;


use Charliemcr\Dispatch\Infrastructure\Entity;

/**
 * Emulates a batch Entity
 *
 * Class BatchEntity
 * @package Charliemcr\Dispatch\Domain\Batches
 */
class BatchEntity extends Entity
{
    /**
     * @var \DateTime
     */
    private $batchStart;

    /**
     * @var \DateTime
     */
    private $batchEnd;

    /**
     * @return \DateTime
     */
    public function getBatchStart(): \DateTime
    {
        return $this->batchStart;
    }

    /**
     * @param \DateTime $batchStart
     */
    public function setBatchStart(\DateTime $batchStart)
    {
        $this->batchStart = $batchStart;
    }

    /**
     * @return \DateTime
     */
    public function getBatchEnd(): \DateTime
    {
        return $this->batchEnd;
    }

    /**
     * @param \DateTime $batchEnd
     */
    public function setBatchEnd(\DateTime $batchEnd)
    {
        $this->batchEnd = $batchEnd;
    }
}