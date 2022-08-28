<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Url extends Model
{
    use HasFactory;
    protected $table = 'url';
    const UPDATED_AT = null;

    public static function get_url($id){
        $data = DB::table('url')->where('url_userid',$id)->get();
        return $data;
    }
    public static function get_url_admin(){
        $data = DB::table('url')->join('users','url.url_userid','users.id')->get();
        return $data;
    }
}
