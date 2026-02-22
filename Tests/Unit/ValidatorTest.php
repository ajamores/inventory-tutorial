<?php

use Core\Validator;


it('validates a string', function() {
    // $result = Validator::string('foobar',3, 255);
    // expect($result)->toBeTrue();
    //you can inline

    expect(\Core\Validator::string('foobar',3))->toBeTrue();
    expect(\Core\Validator::string('',7))->toBeFalse();
});


it('validates a string with a minumum length', function(){
    expect(\Core\Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function(){
    expect(\Core\Validator::email('foobar'))->toBeFalse();
    expect(\Core\Validator::email('foobar@example.com'))->toBeTrue();
});

it('validates that a number is greater than given amount', function(){
    expect(\Core\Validator::greaterThan(10, 1))->toBeTrue();
    expect(\Core\Validator::greaterThan(10, 100))->toBeFalse();
})->only(); //note the only function.... runs just this test case