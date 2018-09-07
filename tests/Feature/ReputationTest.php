<?php

namespace Tests\Feature;

use App\User;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReputationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_earns_points_when_they_create_a_thread()
    {
        $thread = create(Thread::class);

        $this->assertEquals(10, $thread->creator->reputation);
    }

    public function test_a_user_earns_points_when_they_reply_to_a_thread()
    {
        $thread = create(Thread::class);

        $reply = $thread->addReply([
            'user_id' => create(User::class)->id,
            'body' => 'Here is a reply.'
        ]);

        $this->assertEquals(2, $reply->owner->reputation);
    }

    public function test_a_user_earns_points_when_their_reply_is_marked_as_best()
    {
        $thread = create(Thread::class);

        $reply = $thread->addReply([
            'user_id' => create(User::class)->id,
            'body' => 'Here is a reply.'
        ]);

        $thread->markBestReply($reply);

        $this->assertEquals(52, $reply->owner->reputation);
    }
}
