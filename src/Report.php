<?php
namespace sulaymankhan\analytics;
use Analytics;
use \Spatie\Analytics\Period;
use \Carbon\Carbon;
class Report extends Analytics{


	 public static function productAddsToCart(Period $period,$limit = 10)
    {
        $response = Analytics::performQuery(
            $period,
            'ga:productAddsToCart',
            [
            	'dimensions' => 'ga:date,ga:productName',
            	'sort'=>'-ga:productAddsToCart',
            	'filters'=>'ga:productAddsToCart>0',
            	'max-results'=>$limit
            ]
        );

        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
        
            return [
                'date' => Carbon::createFromFormat('Ymd', $dateRow[0]),
                'pageTitle' => $dateRow[1],
                'visitors' => (int) $dateRow[2]
            ];
        });
    }
	public static function topProductViews(Period $period,$limit=10)
    {
        $response = Analytics::performQuery(
            $period,
            'ga:productDetailViews',
            [
            	'dimensions' => 'ga:date,ga:productName',
            	'sort'=>'-ga:productDetailViews',
            	'filters'=>'ga:productDetailViews>0',
            	'max-results'=>$limit
            ]
        );

        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
        
            return [
                'date' => Carbon::createFromFormat('Ymd', $dateRow[0]),
                'pageTitle' => $dateRow[1],
                'visitors' => (int) $dateRow[2]
            ];
        });
    }
}