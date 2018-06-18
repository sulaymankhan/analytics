<?php
namespace sulaymankhan\analytics\Http;

use Illuminate\Routing\Controller as BaseController;
use sulaymankhan\analytics\Report;


use \Spatie\Analytics\Period;

class AppController extends BaseController
{
    public function dashboard()
    {
        $totalPageViews		=	Report::fetchTotalVisitorsAndPageViews(Period::days(7));
		$topViews			=	Report::fetchMostVisitedPages(Period::days(7),10);
		$productAddsToCart	=	Report::productAddsToCart(Period::days(7),10);
		$topProductViews		=	Report::topProductViews(Period::days(7),50);
		
		$totalPageViews=$totalPageViews->map(function($v){
			$v['date']= $v['date']->format('Y-m-d');
			return $v;
		});

		
    	return view('analytics::dashboard',[
    		'topViews'=>$topViews,
    		'topProductViews'=>$topProductViews,
    		'productAddsToCart'=>$productAddsToCart,
    		'chart1Data'=>$totalPageViews
    	]);
    }
}