<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
class HomePageController extends Controller
{
    //
    public function getHomePage()
    {
    	$tindang = DB::table('tindang')->leftJoin('users', 'users.id', '=', 'tindang.idUser')->where('tindang.status', 1)->orderBy('tindang.id', 'desc')->take(18)->select('tindang.*','users.id as idChuShop','users.name as tenChuShop','users.address as diaChiChuShop')->get();

    	$products =  DB::table('products')->where('adminCheck', 1)->inRandomOrder()->limit(6)->get();

    	$newestProducts = DB::table('products')->where('adminCheck', 1)->orderBy('id','desc')->take(9)->get();

        return view('user.trangchu',compact('tindang','products','newestProducts'));
    }
    
}
