<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

require (__DIR__ . '/attendize/attendize.php');


Route::get('testsendemail', 'TestingController@sendemail');


Route::get('test', 'EventController@index');

// Route::get('/rsvptemplate', function () {

//     $event = new App\Event();
//     $event->name="event best";
//     $event->venue    ="venue";
//     $event->location ="location";
//     $event->description ="description";

//     $eventUser = new App\Attendee();
//     $eventUser->name ="odiseo";
//     $eventUser->email ="odiseo@iliada.com";

//     return new App\Mail\RSVP("message", $event, $eventUser, null, "footer", "subject");
// });


Route::post('testpush', 'SendContentController@sendPushNotification');

// Ver rutas que tienen documetación
Route::get('routes', function() { 
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
  $apidoc = json_decode( file_get_contents('../public/docs/collection.json'), true);
  $items = $apidoc['item'];
  $routeDocs = [];
  foreach ($items as $item) {
      $requests = $item['item'];
      foreach ($requests as $request) {
        array_push($routeDocs, [ 'url' => $request['request']['url']['path'], 'method' => $request['request']['method'] ]);
      }
  }
  // Ver rutas sin docs
  $routeWithoutDocs = [];
  foreach ($routesMod2 as $route) {
    !in_array($route, $routeDocs) ? array_push($routeWithoutDocs, $route) : null ;
  }

  return view('routes')->with(['withoutDocs' => $routeWithoutDocs, 'withDocs' => $routeDocs, 'allRoutes' => $routesMod2]);
});
