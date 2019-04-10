<?php

namespace App\Http\Controllers;

use App\LinkDataArray;
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
        $json2 = json_decode($jsondata, true);
      //  $count= count($json['nodeDataArray']);
       // return $count;
//        foreach($json as $key => $value) {
//            return $value->nodeDataArray;
//        }
          // return $count;
     //       return $json['linkDataArray'][0]['from'];

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

//        foreach($json2['linkDataArray'] as $item2) {
//
//          //  return $item2['from'].$item2['to'];
//
//              $linkdataarray = new LinkDataArray();
////              if (isset($item2['text'])) {
////                   $linkdataarray->text = $item2['text'];
////              }else
//
//              $linkdataarray->linkfrom = $item2['from'];
//              $linkdataarray->linkto = $item2['to'];
//              $linkdataarray->fromPort = $item2['fromPort'];
//              $linkdataarray->toPort = $item2['toPort'];
//             // $linkdataarray->text = $item2['text'];
//              $linkdataarray->points = $item2['points'];
//              $linkdataarray->save();
//
//
//
//
//
//
//        }



        foreach($json['linkDataArray'] as $item) {
            //return $item['text'];
            $linkdataarray = new LinkDataArray();


                $linkdataarray->linkfrom = $item['from'];
                $linkdataarray->linkto = $item['to'];
                $linkdataarray->fromPort = $item['fromPort'];
                $linkdataarray->toPort = $item['toPort'];
                $linkdataarray->points = $item['points'];
                $linkdataarray->save();




        }








          //  return $json;

        //return $json['nodeDataArray'][0]['category'];
    }
}
