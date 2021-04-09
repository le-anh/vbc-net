<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;

class ServiceAPIController extends Controller
{
    public function LogIn(Request $request)
    {
        try {
            $data = [
                'org' => $request->organization,
                'user' => $request->username
            ];

            $response = self::ClientID($data);

            if($response->getStatusCode() == 200)
            {
                Cookie::queue('user_org', $data['org'], 60);
                Cookie::queue('user_name', $data['user'], 60);
                Cookie::queue('user_role' ,(($data['user'] == 'lhanh' || $data['user'] == 'tmtuyen') ? "Admin" : "User"), 60);
                Cookie::queue('user_token', json_decode($response->getBody())->result, 60);

                if($data['user'] == 'lhanh' || $data['user'] == 'tmtuyen')
                    return redirect()->route('user_home');
                else
                    return redirect()->route('user_home');
            }
            return redirect()->back()->withInput()->with(['msg_type' => 'success', 'msg' => "Sign in is successfully!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['msg_type' => 'danger', 'msg' => $th->getMessage()]);
        }
    }

    public static function InfoLogin()
    {
        $jar = new \GuzzleHttp\Cookie\CookieJar;
        $cookie = $jar->getCookieByName('user_name');

        echo $cookie->getValue(); // 'foo'
        echo '<br>';
        echo $cookie->getDomain(); // 'example.org'
        echo '<br>';
        echo $cookie->getExpires(); // expiration date as a Unix timestamp
        echo '<br>';
    }

    public function Transfer($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', 'http://40.65.145.154:3000/api/Transfer', [ 'json' => $data ]);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function RegisterUser($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', 'http://40.65.145.154:3000/api/registerUser', [ 'json' => $data ]);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function Mint($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', 'http://40.65.145.154:3000/api/Mint', [ 'json' => $data ]);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function ClientUTXOs($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', 'http://40.65.145.154:3000/api/ClientUTXOs', [ 'json' => $data ]);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function ClientID($data)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://40.65.145.154:3000/api/ClientID', [ 'json' => $data ]);
        return $response;
    }





    // public function API($method = 'post', $suffix = '', $data)
    // {
    //     try {
    //         $client = new Client();
    //         $response = $client->request($method, 'http://40.65.145.154:3000/api/'.$suffix, [ 'json' => $data ]);
    //         return $response;
    //     } catch (\Throwable $th) {
    //         return $th;
    //     }
    // }
}
