<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class MobileUserTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testIndex() {
        $user = new User(array('name' => 'Unit Tester'));
        $this->be($user);
        $this->get('/api/v1/mobile_user')->seeJson(['success' => true]);
  
    }

}
