<?php

namespace App\Http\Controllers;
use DB;
use Log;

use Illuminate\Http\Request;

class BetController extends Controller
{

    public function gamelist(Request $Request)
    {
        return view('gamelist');
    }

    public function gamedetails(Request $Request)
    {
        return view('gamedetails');
    }

    public function gamedetails_userlist(Request $Request)
    {
        //$db = DB::table('transactions')->groupBy('account')->get();
        $db = DB::SELECT("SELECT sum(betAmount) as totalBet, sum(backAmount) as totalBackAmount, account FROM transactions GROUP BY account");
        $betArr = array();

        foreach($db as $bet)
        {
            $array = array(
                'account' => $bet->account,
                'totalBackAmount' => number_format($bet->totalBackAmount,2),
                'totalBetAmount' => number_format($bet->totalBet,2),
            );

            array_push($betArr,$array);
        }

        return view('gamedetails_userlist')->with('betArr',$betArr);
    }

    public function gamedetails_userlist_betdetails(Request $Request)
    {
        //$db = DB::table('transactions')->groupBy('account')->get();
        $db = DB::SELECT("SELECT * FROM transactions");
        $betArr = array();

        foreach($db as $bet)
        {

            if($bet->betStatus == 1)
            {
                $status = 'Calculated';
            }
            if($bet->betStatus == 0)
            {
                $status = 'Pending';
            }
            if($bet->betStatus == -1)
            {
                $status = 'Rejected';
            }

            $array = array(
                'refid' => $bet->refId,
                'betid' => $bet->betId,
                'betAmount' => number_format($bet->betAmount,2),
                'backAmount' => number_format($bet->backAmount,2),
                'resultStatus' => $bet->resultStatus,
                'account' => $bet->account,
                'betStatus' => $status,
                'created_at' => $bet->account,
            );

            array_push($betArr,$array);
        }

        return view('gamedetails_userlist_betdetails')->with('betArr',$betArr);
    }
}
