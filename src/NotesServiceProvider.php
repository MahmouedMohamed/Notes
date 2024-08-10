<?php

namespace Mahmoued\Notes;

use Illuminate\Support\ServiceProvider;

class NotesServiceProvider extends ServiceProvider
{
    /**
     * Boot up Notes.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
    }

    /**
     * Register Notes migrations.
     *
     * @return void
     */
    private function registerMigrations()
    {
        $this->publishes([
            __DIR__ . '/Migrations' => database_path('migrations'),
        ], 'notes-migrations');
    }
}
