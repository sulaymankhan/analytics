<?php
namespace sulaymankhan\analytics\Http;

use Illuminate\Routing\Controller as BaseController;
use Analytics;
use Spatie\Analytics\Period;



class AppController extends BaseController
{
    public function dashboard()
    {
        //fetch the most visited pages for today and the past week
			$result=Analytics::fetchMostVisitedPages(Period::days(7));
			dd($result);
    }
}