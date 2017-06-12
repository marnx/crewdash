<?php

Use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  public function testUsersCanBeCreated()
  {
    $user = factory(App\User::class)->create();

    $found_user = User::find(1);

    $test_strings = ['name', 'employeenumber', 'email'];

    for ($i = 0; $i < count($test_strings); $i++) {
      $this->assertEquals($found_user->$test_strings[$i], $user->$test_strings[$i]);
    }
  }
}
