<?php 
$I = new FunctionalTester($scenario);

$I->am('a Cuitter member');
$I->wantTo('review all users who are registered for Cuitter');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');
