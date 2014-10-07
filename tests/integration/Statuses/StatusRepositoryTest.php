<?php

use Cuitter\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;


class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    /**
    * @var Status Repository
    */
    protected $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

    /**
     * @test
     */
    public function it_gets_all_statuses_for_a_user()
    {
        // Given I have two users
        $users = TestDummy::times(2)->create('Cuitter\Users\User');

        // And statuses for both of them
        TestDummy::times(2)->create('Cuitter\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body'  =>  'My Status'
        ]);

        TestDummy::times(2)->create('Cuitter\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body'  =>  'His Status'
        ]);

        // When I fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]);

        // Then I should receive only the relevant ones
        $this->assertCount(2, $statusesForUser);
    }

    /**
     * @test
     */

    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = TestDummy::create('Cuitter\Statuses\Status', [
            'user_id' => null,
            'body'  =>  'My Status'
        ]);

        // and an existing user
        $user = TestDummy::create('Cuitter\Users\User');

        // when I try to persist this status
        $savedStatus = $this->repo->save($status, $user->id);

        // Then it should be saved
        $this->tester->seeRecord('statuses', [
            'body'  =>  'My Status'
        ]);

        // And the status should have the correct User ID
        $this->assertEquals($user->id, $savedStatus->user_id);
    }

}