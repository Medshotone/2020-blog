<?php

namespace App\Services;

use App\Browser;
use Jenssegers\Agent\Agent;

class BrowserCheckService
{
    public static function checkBrowser() {
        $agent = new Agent();

        $browserName = $agent->browser();

        $browser = new Browser;

        $newBrowser =  !(bool)$browser->where('name', $browserName)->count();

        if ($newBrowser){
            $browser->name = $browserName;

            $browser->count = 1;

            $browser->save();
        }else{
            $browser->where('name', $browserName)->increment('count');
        }
    }

    public static function getBrowsers() {
        $return = [];

        $browsers = Browser::all();

        foreach ($browsers as $browser) {
            $return[$browser->name] = $browser->count;
        }

        return $return;
    }
}
