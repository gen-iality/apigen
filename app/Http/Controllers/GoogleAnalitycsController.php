<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use DateTime;



class GoogleAnalitycsController extends Controller
{
    public function __invoke(Request $req){  

        $json = $req->json()->all();      
        
        //retrieve visitors and pageview data for the current day and the last seven days
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        //retrieve visitors and pageviews since the 6 months ago
        // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));
        
        $startYear = explode('-', $json['startDate'])[0];                            
        $startMonth = explode('-', $json['startDate'])[1];
        $startDay = explode('-', $json['startDate'])[2];

        $start = Carbon::create($startYear, $startMonth, $startDay);
        
        $endYear = explode('-', $json['endDate'])[0];                             
        $endMonth = explode('-', $json['endDate'])[1];  
        $endDay = explode('-', $json['startDate'])[2];                            

        $end = Carbon::create($endYear, $endMonth, $endDay);  
                      
        $period = Period::create($start, $end);

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $analyticsData = Analytics::performQuery(
            $period,          
            'ga:sessions',                   
            [
              'metrics' => $json['metrics'],              
              'filters' => $json['filtersExpression'],
              'dimensions' => $json['dimensions'],              
              'sort' => $json['sortOrder'] === 'DESCENDING' ? 
              '-'.$json['fieldName'] : $json['fieldName'],
            ]                    
      );
    
      return json_encode($analyticsData);          
    }
  
}