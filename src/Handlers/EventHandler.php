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

namespace Vspc\Support\Handlers;

use Illuminate\Contracts\Container\Container;

class EventHandler
{
    /**
     * The container instance.
     *
     * @var Container
     */
    protected $app;

    /**
     * Dispatch after all db transactions are committed.
     *
     * @var bool|null
     */
    public $afterCommit;

    /**
     * Constructor.
     *
     * @param Container $app
     *
     * @return void
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Dynamically retrieve objects from the container.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->app[$key];
    }
}
