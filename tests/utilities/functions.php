<?php

function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}

function makeInState($state, $class, $attributes = [], $times = null)
{
    return factory($class, $times)->states($state)->make($attributes);
}

function createInState($state, $class, $attributes = [], $times = null)
{
    return factory($class, $times)->states($state)->create($attributes);
}
