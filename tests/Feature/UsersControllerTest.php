<?php

namespace Tests\Feature;

use CodeFlix\Models\User;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIfUserDoesntSeeUsersList()
    {
        $this->get(route('admin.users.index'))
                ->assertRedirect(route('admin.login'))
                ->assertStatus(302);
    }


    public function testIfUserSeeUsersList()
    {
        Model::unguard();
        $user = factory(User::class)
            ->states('admin')
            ->create(['verified' => true]);

        $this->actingAs($user)
            ->get(route('admin.users.index'))
            ->assertSee('Listagem');
    }

}
