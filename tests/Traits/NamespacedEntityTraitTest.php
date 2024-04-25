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
use Vspc\Support\Traits\NamespacedEntityTrait;
use Vspc\Support\Contracts\NamespacedEntityInterface;

class NamespacedEntityTraitTest extends TestCase
{
    /** @test */
    public function it_can_get_and_set_the_entity_namespace()
    {
        $entity = new NamespacedEntityTraitStub();

        $this->assertSame('Vspc\Support\Tests\Traits\NamespacedEntityTraitStub', $entity->getEntityNamespace());

        $entity->setEntityNamespace('Foo\Bar');

        $this->assertSame('Foo\Bar', $entity->getEntityNamespace());
    }
}

class NamespacedEntityTraitStub implements NamespacedEntityInterface
{
    use NamespacedEntityTrait;

    protected static $entityNamespace;
}
