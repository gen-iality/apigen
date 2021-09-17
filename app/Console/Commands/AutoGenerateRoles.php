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

        $model = $this->argument('model');
        $modelPlural = strtolower(str_plural($model));
        $modelLower = strtolower($model);

        $file = fopen(base_path('/routes/api.php'), 'a+');
        $routesPermissions ="\n/****************\n* {$model}\n****************/
        Route::group(
            ['middleware' => 'auth:token'], function () {
                Route::get('$modelPlural', '$model"."Controller@index')->middleware('permission:list_$modelPlural');
                Route::post('$modelPlural', '$model"."Controller@store')->middleware('permission:create_$modelPlural');
                Route::get('$modelPlural/{"."$modelLower}', '$model"."Controller@show')->middleware('permission:show_$modelPlural');                
                Route::put('$modelPlural/{"."$modelLower}', '$model"."Controller@update')->middleware('permission:update_$modelPlural');
                Route::delete('$modelPlural/{"."$modelLower}', '$model"."Controller@destroy')->middleware('permission:delete_$modelPlural');
            }
        );";
        $routeCreate = fwrite($file , $routesPermissions);
    }
}
