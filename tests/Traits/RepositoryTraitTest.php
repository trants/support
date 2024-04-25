<?php
/*
 * *************************************************************************
 * Copyright (c) VSP Co., Ltd - All Rights Reserved
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 */

namespace Vspc\Support\Tests\Traits;

use PHPUnit\Framework\TestCase;
use Vspc\Support\Traits\RepositoryTrait;

class RepositoryTraitTest extends TestCase
{
    /** @test */
    public function it_can_set_and_retrieve_the_model()
    {
        $repository = new RepositoryTraitStub();

        $repository->setModel('FooModelStub');

        $this->assertSame('FooModelStub', $repository->getModel());
    }

    /** @test */
    public function it_can_create_a_model()
    {
        $repository = new RepositoryTraitStub();

        $repository->setModel('StdClass');

        $this->assertInstanceOf('StdClass', $repository->createModel());
    }

    /** @test */
    public function it_can_call_dynamic_methods()
    {
        $repository = new RepositoryTraitStub();

        $repository->setModel('Vspc\Support\Tests\Traits\FooModelStub');

        $this->assertSame('Vspc\Support\Tests\Traits\FooModelStub', $repository->getModel());

        $this->assertSame('bar', $repository->foo());
    }
}

class RepositoryTraitStub
{
    use RepositoryTrait;

    public $model;
}

class FooModelStub
{
    public function foo()
    {
        return 'bar';
    }
}
