<?php

namespace App\Http\Controllers;
use DB;
use Log;
use Auth;
use Redirect;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList()
    {
        $db = DB::table("users")->get();

        $userArr = array();

        foreach($db as $user)
        {
            $array = array(
                'name' => $user->name,
                'email' => $user->email,
                'balance' => number_format($user->balance,2),
                'phone_number' => '',
                'status' => 'Active',
            );

            array_push($userArr,$array);
        }

        return view('user')->with('userArr',$userArr);
    }

    //register code will be in auth/RegisterController.php
    //this code is just for testing purposes ONLY
    public function register(Request $Request)
    {
        $data = json_decode($Request->getContent(), true);
        $apiPassword  = $data['APIPassword'];
        $agentAccount = $data['AgentAccount'];
        $nickName     = $data['NickName'];
        $currency     = $data['Currency'];
        $memberAccount= $data['MemberAccount'];

        //add validations
        if($apiPassword == '') //f1bf4faf87fb64b02f3354c49159e51e
        {
            $response = array(
                'status' => -1,
                'message' => 'API Password is empty'
            );

            return json_encode($response, true);
        }

        if($agentAccount == '') //2bc00000
        {
            $response = array(
                'status' => -1,
                'message' => 'Agent Account is empty'
            );

            return json_encode($response, true);
        }

        if($nickName == '')
        {
            $response = array(
                'status' => -1,
                'message' => 'Nickname is empty'
            );

            return json_encode($response, true);
        }

        if($currency == '')
        {
            $response = array(
                'status' => -1,
                'message' => 'Currency is empty'
            );

            return json_encode($response, true);
        }

        if($memberAccount == '')
        {
            $response = array(
                'status' => -1,
                'message' => 'Member Account is empty'
            );

            return json_encode($response, true);
        }

        try
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_PORT => "51528",
                CURLOPT_URL => "http://localhost:51528/api/user/Register",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\"APIPassword\":\"$apiPassword\",\n\"AgentAccount\":\"$agentAccount\",\n\"NickName\":\"$nickName\",\n\"Currency\":\"$currency\",\n\"MemberAccount\":\"$memberAccount\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            return $response;
        }
        catch(\Exception $ex)
        {
            return $ex;
        }
    }

    //this will redirect to ASCBET page , login using API
    public function apiLogin()
    {
        $curl   = curl_init();
        $name   = Auth::user()->name;
        $apiPass= "f1bf4faf87fb64b02f3354c49159e51e";
        $url    = "http://172.30.30.223:8006/api/user/Login";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\"APIPassword\":\"$apiPass\",\n\"MemberAccount\":\"$name\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response,true);

        $loginUrl = "http://172.30.30.223:8005/memberlogin.aspx?logincode=".$response['Message'];

        return Redirect::to($loginUrl);
    }

    //to get betting records , can filter by betid , status , member account , FromDate , ToDate
    public function getbetsheet(Request $Request)
    {
        $apiPassword  = $Request->APIPassword;
        $memberAccount= $Request->MemberAccount;
        $betID        = $Request->BetID;
        $status       = $Request->Status;
        $fromDate     = $Request->FromDate;
        $toDate       = $Request->ToDate;

        $url = "http://localhost:51528/api/sports/GetBetSheet";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "51528",
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\n\"APIPassword\":\"$apiPassword\",\n\"MemberAccount\":\"$memberAccount\",\n\"FromDate\":\"$fromDate\",\n\"ToDate\":\"$toDate\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
    }

    //cannot test yet , no data to test
    public function getparlaybetsheet(Request $Request)
    {
        $apiPassword  = $Request->APIPassword;
        $memberAccount= $Request->MemberAccount;
        $betID        = $Request->BetID;
        $status       = $Request->Status;
        $fromDate     = $Request->FromDate;
        $toDate       = $Request->ToDate;


    }

    public function getleaguename()
    {
        /*********************
        string APIPassword,
        int LeagueID
        *********************/
    }

    public function getteamname()
    {
        /*********************
        string APIPassword,
        int TeamID,
        bool MinTeamID
        *********************/
    }
    
    public function getmatchresult()
    {
        /*********************
        string APIPassword,
        int MatchID
        *********************/
    }

    public function getmatchdata()
    {
        /*********************
        string APIPassword,
        int MatchID
        *********************/
    }

    public function getSeamlessTransaction()
    {
        /*********************
        int Method ,
        string Reference ,
        string APIPassword,
        string CompanyName ,
        int CWID ,
        *********************/
    }
}
