<?php

namespace App\Http\Controllers;
use DB;
use Log;

use Illuminate\Http\Request;

class SeamlessController extends Controller
{
    //add token when u check amount
    public function checkAmount(Request $Request)
    {
        //$executionStartTime = microtime(true);
        $currentTime = date('Y-m-d H:i:s');
        Log::debug("Start time : $currentTime");
        DB::Begintransaction();
        try
        {
            // $request->session()->token();
            //get json from game provider
            $amount = $Request->Amount;
            $account= trim($Request->strAccount);
            $refId  = $Request->RefID;

            //$token  = $Request->token;

            $db = DB::SELECT("SELECT balance FROM users WHERE name = ?",array($account));

            //check token here correct or not
            // if()
            // {
            //
            // }

            if(count($db) == 1)
            {
                $balance = $db[0]->balance;

                if($amount > $balance)
                {
                    DB::Rollback();

                    $response = array(
                        'Status' => -1,
                        'Message'=> 'INSUFFICIENT FUND'
                    );
                }
                else
                {
                    $newBalance = $balance - $amount;
                    //deduct amount in users table
                    DB::UPDATE("UPDATE users
                        SET balance = ?
                        WHERE name = ?",array($newBalance,$account));

                    //store transaction in transaction table
                    DB::INSERT("INSERT INTO transactions (account,refId,betId,betAmount,betStatus,backAmount,resultStatus)
                                VALUES (?,?,?,?,?,?,?)",array($account,$refId,0,$amount,0,0,0));

                    DB::Commit();

                    //send response back to game provider
                    $response = array(
                        'Status' => 1,
                        'Message'=> 'SUFFICIENT FUND',
                        'Balance'=> $newBalance
                    );
                    $currentTime2 = date('Y-m-d H:i:s');
                    Log::debug("End time : $currentTime2");
                }

                return json_encode($response);
            }
            else
            {
                DB::Rollback();

                $response = array(
                    'Status' => -1,
                    'Message'=> 'USER DOESNT EXIST'
                );
                return json_encode($response);
            }
        }
        catch(\Exception $ex)
        {
            Log::warning($ex);

            DB::Rollback();

            $response = array(
                'Status' => -1,
                'Message'=> 'API ERROR'
            );

            return $response;
        }
    }

    public function receiveAmount(Request $Request)
    {
        DB::Begintransaction();
        try
        {
            $refId  = $Request->RefID;
            $status = $Request->IntegerStatus;
            $betId  = $Request->BetID;

            //check ref id exist or not
            $checkRefId = DB::SELECT("SELECT * FROM transactions WHERE refId = ?",array($refId));
            if(count($checkRefId) == 1)
            {
                if($status == -1)
                {
                    //add money back to user account
                    DB::UPDATE("UPDATE users SET balance = balance + ? WHERE name = ?",array($amount,$account));
                }

                $account = $checkRefId[0]->account;
                $amount = $checkRefId[0]->betAmount;

                //update data
                DB::UPDATE("UPDATE transactions SET betStatus = ?,betid = ? WHERE refid = ?",array($status,$betId,$refId));

                DB::Commit();

                $response = array(
                    'Status' => 1,
                    'Message'=> 'SUCCESS'
                );
            }
            else
            {
                DB::Rollback();

                $response = array(
                    'STATUS' => -1,
                    'Message'=> 'INVALID REFID'
                );
            }
        }
        catch(\Exception $ex)
        {
            DB::Rollback();

            $response = array(
                'Status' => -1,
                'Message'=> 'API ERROR'
            );
        }

        return json_encode($response);
    }

    public function postResult(Request $Request)
    {
        // $refId       = $Request->RefID;
        // $resultStatus= $Request->Status;
        // $backAmount  = $Request->Win;
        //
        // //check ref id exist or not
        // $checkRefId = DB::SELECT("SELECT * FROM transactions WHERE refId = ?",array($refId));
        // if(count($checkRefId) == 1)
        // {
        //     //update data
        //     DB::UPDATE("UPDATE transactions SET resultStatus = ?,backAmount = ? WHERE refid = ?",array($resultStatus,$backAmount,$refId));
        //
        //     //add win amount to user balance in users table
        //
        //     $response = array(
        //         'Status' => 1,
        //         'Message'=> 'SUCCESS'
        //     );
        // }
        // else
        // {
        //     $response = array(
        //         'Status' => -1,
        //         'Message'=> 'INVALID REFID'
        //     );
        // }
        $response = array(
            'Status' => 1,
            'Message'=> 'SUCCESS'
        );

        return json_encode($response);
    }

    public function getBalance(Request $Request)
    {
        $account = $Request->MemberAccount;

        $db = DB::SELECT("SELECT balance FROM users WHERE name = ?",array($account));

        $response = array(
            'Status' => 1,
            'Message'=> number_format($db[0]->balance,2),
        );

        return json_encode($response);
    }

    public function rollback(Request $Request)
    {
        $refId = $Request->RefID;

        //check if refID exist or not in transactions table
        //if exist , then rollback the last transaction . if already deduct , then return money back to customer
        //if doesn't exist , then can just ignore

        $array = array(
            'status' => 1,
            'message'=> 'testing rollback'
        );

        return json_encode($array);
    }


}
