<?php

namespace App\Http\Controllers;

use App\Browser;
use Jenssegers\Agent\Agent;

class BrowserController extends Controller
{
    public static function checkBrowser() {
        $agent = new Agent();

        $browser_name = $agent->browser();

        $browser = new Browser;

        $new_browser =  !(bool)$browser->where('name', $browser_name)->count();

        if ($new_browser){
            $browser->name = $browser_name;

            $browser->count = 1;

            $browser->save();
        }else{
            $browser->where('name', $browser_name)->increment('count');
        }
    }

    public static function Browsers() {
        BrowserController::checkBrowser();

        $return = [];

        $browsers = Browser::all();

        foreach ($browsers as $browser) {
            $return[$browser->name] = $browser->count;
        }

        return $return;
    }
}
