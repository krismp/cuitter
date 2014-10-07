<?php 

$I = new FunctionalTester($scenario);

$I->am('a Cuitter member');
$I->wantTo('sign in to my Cuitter account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Selamat Datang Kembali');

$I->assertTrue(Auth::check());