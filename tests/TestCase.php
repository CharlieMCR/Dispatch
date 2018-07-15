<?php

namespace Charliemcr\Test;


use Charliemcr\Dispatch\Infrastructure\App;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Pimple\Container;

class TestCase extends PHPUnitTestCase
{
    protected $container;

    protected function setUp()
    {
        $this->container = (new App(new Container()))->getContainer();
        parent::setUp();
    }
}