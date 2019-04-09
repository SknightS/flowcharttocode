<?php

namespace App\Http\Controllers;

use App\Nodedataarray;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class flowchartController extends Controller
{
    //

    public function index(Request $r){

        $jsondata = $r->jsondata;

       // return $jsondata;
        $json = json_decode($jsondata, true);
        $count= count($json['nodeDataArray']);
       // return $count;
//        foreach($json as $key => $value) {
//            return $value->nodeDataArray;
//        }
          // return $count;
           // return $json['nodeDataArray'][0]['text'];

        foreach($json['nodeDataArray'] as $item) {
            //return $item['text'];
        $nodedataarray = new Nodedataarray();
       try{
           $nodedataarray->category = $item['category'];
           $nodedataarray->text = $item['text'];
           $nodedataarray->keyto = $item['key'];
           $nodedataarray->loc = $item['loc'];
           $nodedataarray->save();

       }
       catch(\Exception $e){}

        }
          //  return $json;

        //return $json['nodeDataArray'][0]['category'];
    }
}
