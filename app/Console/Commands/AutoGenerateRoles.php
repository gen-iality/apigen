<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Rol;
use App\Permission;
use App\RolesPermissions;


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
        //El nuevo modelo
        $model = $this->argument('model');
        $modelPlural = strtolower(str_plural($model));
        $modelLower = strtolower($model);

        //Por defecto en este será el archivo donde se van a crear las rutas con los permisos
        $file = fopen(base_path('/routes/api.php'), 'a+');

        $list = "list_$modelPlural";
        $create = "create_$modelPlural";
        $show = "show_$modelPlural";
        $update = "update_$modelPlural";
        $delete = "delete_$modelPlural";

        $permissionsCrud = [$list, $create, $show, $update, $delete];
        $routesPermissions ="\n/****************\n* {$model}\n****************/
        Route::group(
            ['middleware' => 'auth:token'], function () {
                Route::get('$modelPlural', '$model"."Controller@index')->middleware('permission:$list');
                Route::post('$modelPlural', '$model"."Controller@store')->middleware('permission:$create');
                Route::get('$modelPlural/{"."$modelLower}', '$model"."Controller@show')->middleware('permission:$show');                
                Route::put('$modelPlural/{"."$modelLower}', '$model"."Controller@update')->middleware('permission:$update');
                Route::delete('$modelPlural/{"."$modelLower}', '$model"."Controller@destroy')->middleware('permission:$delete');
            }
        );";
        $routeCreate = fwrite($file , $routesPermissions);

        //Roles por defecto
        $idRolAdmin = Rol::ID_ROL_ADMINISTRATOR;
        $idRolMoredator = Rol::ID_ROL_MOREDATOR;

        //Se agregan los permisos a los roles por defecto según corresponda.
        for ($i=0; $i < count($permissionsCrud); $i++) 
        { 
            $permission = Permission::updateOrCreate(
                [
                    "name" => $permissionsCrud[$i]
                ],
                [                    
                    "module" => $modelPlural,
                    "guard_name" => "web"                    
                ]
            );

            RolesPermissions::updateOrCreate(
                [
                    "rol_id" => $idRolAdmin,
                    "permission_id" => $permission->_id
                ]
            );
            
            if($permissionsCrud[$i] !== "delete_$modelPlural")
            {
                RolesPermissions::updateOrCreate(
                    [
                        "rol_id" => $idRolMoredator,
                        "permission_id" => $permission->_id
                    ]
                );
            }
            
        }
    }
}
