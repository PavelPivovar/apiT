<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use App\Model\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_indel_all()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get('api/task' , ['title' => 'oinionoi' ])->assertStatus(200);
    }

    public function test_show_method()
    {
        $task = factory(Task::class)->create();
        $this->get('/api/task/' . $task->id,  ['body' => 'Sally'])->assertStatus(200);
    }

    public function test_store_method()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->json('POST', 'api/task', ['title' => 'heeelll','body' => 'heloo' ])->assertStatus(201);
    }

    public function test_delete_method()
    {
        $task = factory(Task::class)->create();
        $user = factory(User::class)->create();
        $this->actingAs($user)->json('DELETE', 'api/task/' . $task->id, ['title' => 'gtmgt', 'body' => 'gfnff'])->assertStatus(204);
    }

    public function test_update_method()
    {
        $task = factory(Task::class)->create();
        $user = factory(User::class)->create();
        $this->actingAs($user)->json('PUT', 'api/task/' . $task->id, ['title' => 'dsdsdsd', 'body' => 'dsdsdsd'])->assertStatus(201);
    }

}
