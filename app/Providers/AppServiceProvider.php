<?php

namespace CodeFlix\Providers;

use CodeFlix\Models\Video;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Dingo\Api\Exception\Handler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Video::updated(function($video){
            if (!$video->completed ) {
                if ($video->file != null &&
                    $video->thumb != null &&
                    $video->duration != null
                ) {
                    $video->completed = true;
                    $video->save();
                }
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            'bootstrapper::form',
            function ($app) {
                $form = new Form(
                    $app->make('collective::html'),
                    $app->make('url'),
                    $app->make('view'),
                    $app['session.store']->Token()
                );

                return $form->setSessionStore($app['session.store']);
            },
            true
        );

        $handler = app(Handler::class);
        $handler->register(function(AuthenticationException $exception)
        {
           return response()->json(['error' => 'Unauthenticated'], 401);
        });

    }
}
