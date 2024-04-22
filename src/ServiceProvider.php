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

namespace Vspc\Support;

abstract class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * The alias pattern.
     *
     * @var string
     */
    protected $aliasPattern = '{class}Interface';

    /**
     * Registers a binding if it hasn't already been registered.
     *
     * @param string               $abstract
     * @param \Closure|string|null $concrete
     * @param bool                 $shared
     * @param bool|string|null     $alias
     *
     * @return void
     */
    protected function bindIf($abstract, $concrete = null, $shared = true, $alias = null): void
    {
        if (! $this->app->bound($abstract)) {
            $concrete = $concrete ?: $abstract;

            $this->app->bind($abstract, $concrete, $shared);
        }

        $this->alias($abstract, $this->prepareAlias($alias, $concrete));
    }

    /**
     * Alias a type to a shorter name.
     *
     * @param string $abstract
     * @param string $alias
     *
     * @return void
     */
    protected function alias($abstract, $alias): void
    {
        if ($alias) {
            $this->app->alias($abstract, $alias);
        }
    }

    /**
     * Prepares the alias.
     *
     * @param string $alias
     * @param mixed  $concrete
     *
     * @return mixed
     */
    protected function prepareAlias($alias, $concrete): mixed
    {
        if (! $alias && $alias !== false && ! $concrete instanceof \Closure) {
            $alias = str_replace('{class}', $concrete, $this->aliasPattern);
        }

        return $alias;
    }
}
