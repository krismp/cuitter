<?php 

$I = new FunctionalTester($scenario);

$I->am('a Cuitter member');

$I->wantTo('I want to post statuses to my profile.');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My First Post!');

$I->seeCurrentUrlEquals('/statuses');

$I->see('My First Post!');