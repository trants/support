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

use Illuminate\Contracts\Events\Dispatcher;

interface EventHandlerInterface
{
    /**
     * Registers the event listeners using the given dispatcher instance.
     *
     * @param Dispatcher $dispatcher
     *
     * @return void
     */
    public function subscribe(Dispatcher $dispatcher);
}
