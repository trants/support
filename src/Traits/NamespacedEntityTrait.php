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

namespace Vspc\Support\Traits;

trait NamespacedEntityTrait
{
    /**
     * Returns the entity namespace.
     *
     * @return string
     */
    public static function getEntityNamespace(): string
    {
        return static::$entityNamespace ?? get_called_class();
    }

    /**
     * Sets the entity namespace.
     *
     * @param string $namespace
     *
     * @return void
     */
    public static function setEntityNamespace($namespace): void
    {
        static::$entityNamespace = $namespace;
    }
}
