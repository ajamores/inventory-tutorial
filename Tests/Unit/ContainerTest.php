<?php

/**
 * Testing steps
 * 
 * 1. Arrange the world aka get what you need, dependencies etc
 * 2. Act, perform action on what you brougt to the world
 * 3. Assert /expect
 */

use Core\Container;

test('It can resolve something out of the container', function () {
    
    //1. Arrange
    $container = new Container();
    $container->bind('foo', fn() => 'bar');

    //2. Act
    $result = $container->resolve('foo');

    //3. Assert
    expect($result)->toEqual('bar');

});
