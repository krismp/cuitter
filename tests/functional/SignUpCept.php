<?php 

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for Cuitter account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'JohnDoe');
$I->fillField('Email:', 'john@example.com');
$I->fillField('Password:', 'password');
$I->fillField('Password Confirmation:', 'password');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Cuitter!');

$I->seeRecord('users', [
	'username'	=>	'JohnDoe',
	'email'	=>	'john@example.com'
]);

$I->assertTrue(Auth::check());