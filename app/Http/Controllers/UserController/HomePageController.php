<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Cookie;
class HomePageController extends Controller
{
    //
    public function getHomePage()
    {
        $idPlace = 1;
        if(Cookie::get('place')!= null){
            $idPlace = Cookie::get('place');
        }
        else{
            $idPlace = 1;
        }
    	$tindang = DB::table('tindang')
            ->leftJoin('users', 'users.id', '=', 'tindang.idUser')
            ->where('tindang.status', 1)
            ->where('tindang.idPlace', $idPlace)
            ->orderBy('tindang.id', 'desc')
            ->take(18)
            ->select('tindang.*','users.id as idChuShop','users.name as tenChuShop','users.address as diaChiChuShop')
            ->get();

    	$products =  DB::table('products')->where('adminCheck', 1)->inRandomOrder()->limit(6)->get();

    	$newestProducts = DB::table('products')
            ->join('place_product','products.id','place_product.idProduct')
            ->where('products.adminCheck', 1)
            ->where('place_product.idPlace', $idPlace)          
            ->orderBy('id','desc')
            ->take(9)->get();

    	$categories = DB::table('categories')->where('idParent', 0)->where('enable',1)->select('id','name','image')->get();
    	$cate_count = array();
    	foreach($categories as $child){

    		$id = $child->id;
    		$count= DB::table('tindang')
    					->join('categories',function($join) use($id){
    						$join->on('categories.id','tindang.idCate')
    							->where('categories.enable',1)
    							->where('tindang.status', 1)
                                ->where('tindang.adminCheck', 1)
    							->where('categories.idParent',$id);
    					})->count();
    		$arrval = array(
    			'cate'=>$child,
    			'count'=>$count
    		);
    		array_push($cate_count, $arrval);
    	}

        return view('user.trangchu',compact('tindang','products','newestProducts','cate_count'));
    }
    
}
