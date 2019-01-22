<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Places;
use App\Categories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
class HomePageController extends Controller
{
    //
    public function getHomePage()
    {
    	$services = DB::table('services')->leftJoin('users', 'users.id', '=', 'services.idUser')->where('services.status', 1)->orderBy('services.id', 'desc')->take(18)->get();

    	$products =  DB::table('products')->where('adminCheck', 1)->inRandomOrder()->limit(6)->get();

    	$newestProducts = DB::table('products')->where('adminCheck', 1)->orderBy('id','desc')->take(9)->get();

        return view('user.trangchu',compact('services','products','newestProducts'));
    }
}
