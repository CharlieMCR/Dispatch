<?php

namespace Charliemcr\Dispatch\Infrastructure;


use Charliemcr\Dispatch\Domain\Couriers\ANCAdapter;
use Charliemcr\Dispatch\Domain\Couriers\RoyalMailAdapter;
use Charliemcr\Dispatch\Infrastructure\ANC\ANC;
use Charliemcr\Dispatch\Infrastructure\RoyalMail\RoyalMail;
use Pimple\Container;

/**
 * Emulates a framework application with DI container
 *
 * Class App
 * @package Charliemcr\Dispatch\Infrastructure
 */
class App
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->container['royal-mail'] = function ($c) {
            return new RoyalMailAdapter(new RoyalMail());
        };

        $this->container['anc'] = function ($c) {
            return new ANCAdapter(new ANC());
        };
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }
}