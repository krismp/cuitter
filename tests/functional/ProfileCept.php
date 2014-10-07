<?php 

$I = new FunctionalTester($scenario);

$I->am('a Cuitter member');
$I->wantTo('I want to view to my profile.');

$I->signIn();
$I->postAStatus('My New Post!');

$I->click('Your Profile');
$I->seeCurrentUrlEquals('/@FooBar');

$I->see('My New Post!');