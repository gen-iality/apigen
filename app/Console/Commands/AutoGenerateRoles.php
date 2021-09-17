<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AutoGenerateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:resourceRol {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This comand create the routes crud with your permissions and create the new permissions in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $modelPlural = $this->argument('model');
        
        $file = fopen('', 'a+');
        $routesPermissions =`/****************\n* {$model}\n****************/
        Route::group(
            ['middleware' => 'auth:token'], function () {
                Route::post('{$modelPlural}', 'CommentController@store');
                Route::put('comments/{comment}', 'CommentController@update');
                Route::delete('comments/{comment}', 'CommentController@destroy');
                Route::get('comments', 'CommentController@index');
        
            }
        );`;
        $routeCreate = fwrite($file , $routesPermissions);
    }
}
