<?php

namespace App\Exports;

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Concerns\FromArray;

class RoutesExport implements FromArray
{
    public function array(): array
    {
      // OBTENER TODAS LAS RUTAS DISPONIBLES Y MODIFICARLAS
      $routeCollection = Route::getRoutes();
      $allRoutes = [];
      foreach ($routeCollection as $value) {
          array_push($allRoutes, ['url' => $value->uri, 'method' => $value->methods[0]]);
      }
      $routesMod1 = [];
      foreach ($allRoutes as $route) {
          array_push($routesMod1, ['url' => str_replace('{', ':', $route['url']), 'method' => $route['method']]);
      }
      $routesMod2 = [];
      foreach ($routesMod1 as $route) {
          array_push($routesMod2, ['url' => str_replace('}', '', $route['url']), 'method' => $route['method']]);
      }
      // OBTENER TODAS LAS RUTAS DOCUMENTADAS
      $apidoc = json_decode( file_get_contents('/var/www/public/docs/collection.json'), true);
      $items = $apidoc['item'];
      $routeDocs = [];
      foreach ($items as $item) {
          $requests = $item['item'];
          foreach ($requests as $request) {
            array_push($routeDocs, [ 'url' => $request['request']['url']['path'], 'method' => $request['request']['method'] ]);
          }
      }
      // GENERAR EXCEL
      $routesToDownload = [];
      foreach ($routesMod2 as $route) {
	$doc = in_array($route, $routeDocs) ? '' : '';
	array_push($routesToDownload, ['url' => $route['url'], 'method' => $route['method'], 'doc' => $doc]);
      }

      return $routesToDownload;
    }

}
