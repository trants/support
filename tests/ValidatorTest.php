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

namespace Vspc\Support\Tests;

use Mockery as m;
use Vspc\Support\Validator;
use PHPUnit\Framework\TestCase;
use Illuminate\Validation\Factory as IlluminateValidator;

class ValidatorTest extends TestCase
{
    /**
     * The Validator instance.
     *
     * @var Validator
     */
    protected $validator;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->validator = new ValidatorStub(
            $this->getRealValidator()
        );
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_be_instantiated()
    {
        $validator = new ValidatorStub(
            $this->getRealValidator()
        );

        $this->assertInstanceOf('Vspc\Support\Validator', $validator);
    }

    /** @test */
    public function it_can_get_and_set_the_rules()
    {
        $this->assertCount(1, $this->validator->getRules());

        $this->validator->setRules([]);
        $this->assertCount(0, $this->validator->getRules());

        $this->validator->setRules([
            'name'  => 'required',
            'email' => 'required',
        ]);
        $this->assertCount(2, $this->validator->getRules());
    }

    /** @test */
    public function it_can_get_and_set_the_messages()
    {
        $this->validator->setMessages([
            'name'  => 'name is required',
            'email' => 'email is required',
        ]);
        $this->assertCount(2, $this->validator->getMessages());

        $this->validator->setMessages([]);
        $this->assertCount(0, $this->validator->getMessages());
    }

    /** @test */
    public function it_can_get_and_set_the_custom_attributes()
    {
        $this->validator->setCustomAttributes([
            'first_name' => 'First Name',
            'last_name'  => 'Last Name',
        ]);
        $this->assertCount(2, $this->validator->getCustomAttributes());

        $this->validator->setCustomAttributes([]);
        $this->assertCount(0, $this->validator->getCustomAttributes());
    }

    /** @test */
    public function it_can_define_scenarios()
    {
        $scenario = $this->validator->on('update', ['foo']);

        $this->assertInstanceOf('Vspc\Support\Validator', $scenario);
    }

    /** @test */
    public function it_can_register_bindings()
    {
        $this->validator->bind(['foo' => 'bar']);

        $this->assertSame(['foo' => 'bar'], $this->validator->getBindings());
    }

    /** @test */
    public function it_can_validate()
    {
        $messages = $this->validator->validate([]);

        $this->assertCount(1, $messages);

        $messages = $this->validator->on('update')->bind(['email' => 'popop@asdad.com'])->validate([
            'email' => 'john@doe.com',
        ]);

        $this->assertTrue($messages->isEmpty());
    }

    /** @test */
    public function it_can_by_pass_tests()
    {
        $this->validator->bypass();

        $messages = $this->validator->validate([]);

        $this->assertTrue($messages->isEmpty());
    }

    protected function getRealValidator()
    {
        $trans = new \Illuminate\Translation\Translator(new \Illuminate\Translation\ArrayLoader(), 'en');

        return new IlluminateValidator($trans);
    }
}

class ValidatorStub extends Validator
{
    protected $rules = [
        'email' => 'required|email',
    ];

    public function onUpdate()
    {
    }
}
