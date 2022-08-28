<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){$this->middleware('auth');}
    public function index()
    {


        return view('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        date_default_timezone_set('Asia/Bangkok');
        function check_url($url){
            try {
                $client = new Client;
                $client->get($url, [
                    'on_stats' => function (TransferStats $stats) use (&$url) {
                        $url = $stats->getEffectiveUri();
                    }
                ])->getBody()->getContents();

                return $url;
            } catch (\Exception $e) {
                return false;
            }
        }
        function getName($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            return $randomString;
        }


        $data_url = check_url($r->url);
        if($data_url){
            $chack_id = 1;
            $url_check = DB::table('url')->where('url_old',$data_url)->count();
            if($url_check==0){
                while($chack_id != 0) {
                    $rand_str = getName(rand(2,7));
                    $chack_id = DB::table('url')->where('url_id',$rand_str)->count();
                }
                $data['url_id']    = $rand_str;
                $data['url_old']    = $data_url;
                $data['url_userid'] = Auth::user()->id;
                $data['url_datetime'] = date('Y-m-d H:i:s');
                DB::table('url')->insert($data);
                $view['url'] = $r->url;
                $view['id']  = $rand_str;
                return view('home.index',$view);
            }else{
                $url = DB::table('url')->where('url_old',$data_url)->select('url_id','url_old')->first();
                $view['url'] = $url->url_old;
                $view['id']  = $url->url_id;
                return view('home.index',$view);
            }
        }else{
            $view['url'] = $r->url;
            $view['alert'] = 99;
            return view('home.index',$view);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = DB::table('url')->where('url_id',$id)->first();
        if(isset($url->url_old)){
            return redirect()->away($url->url_old);
        }else{
            return redirect('');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        dd($r);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
