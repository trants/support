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

trait RepositoryTrait
{
    /**
     * Create a new instance of the model.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function createModel(array $data = [])
    {
        $class = '\\'.ltrim($this->model, '\\');

        return new $class($data);
    }

    /**
     * Returns the model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Runtime override of the model.
     *
     * @param string $model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Dynamically pass missing methods to the model.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $model = $this->createModel();

        return call_user_func_array([$model, $method], $parameters);
    }
}
