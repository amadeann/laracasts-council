<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class Trending
{
    public function get()
    {
        return Cache::get($this->cacheKey(), collect())
                    ->sortByDesc('score')
                    ->slice(0, 5)
                    ->values();
    }

    public function push(Thread $thread)
    {
        $trending = Cache::get($this->cacheKey(), collect());
        $trending[$thread->id] = (object) [
            // 'score' => $this->score($thread) + $increment,
            'title' => $thread->title,
            'path' => $thread->path(),
        ];
        Cache::forever($this->cacheKey(), $trending);
    }

    public function reset()
    {
        return Cache::forget($this->cacheKey());
    }

    public function cacheKey()
    {
        return app()->environment('testing') ? 'testing_trending_threads' : 'trending_threads';
    }
}
