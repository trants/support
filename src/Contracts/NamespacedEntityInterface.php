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

namespace Vspc\Support\Contracts;

interface NamespacedEntityInterface
{
    /**
     * Returns the entity namespace.
     *
     * @return string
     */
    public static function getEntityNamespace(): string;

    /**
     * Sets the entity namespace.
     *
     * @param string $namespace
     *
     * @return void
     */
    public static function setEntityNamespace(string $namespace): void;
}
