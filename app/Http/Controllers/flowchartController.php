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
       // $json2 = json_decode($jsondata, true);
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

        foreach($json['linkDataArray'] as $item) {
            //   return $item['text'];
            try {
                $linkdataarray = new LinkDataArray();

                if (isset($item['text'])) {
                    $linkdataarray->text = $item['text'];
                } else

                $linkdataarray->linkfrom = $item['from'];
                $linkdataarray->linkto = $item['to'];
                $linkdataarray->fromPort = $item['fromPort'];
                $linkdataarray->toPort = $item['toPort'];
                $linkdataarray->userid = 1;
                $linkdataarray->save();

            }
            catch (\Exception $e){}
        }



          //  return $json;

        //return $json['nodeDataArray'][0]['category'];
    }

    public function convert(){

        $nodearradata = Nodedataarray::get();

        foreach ($nodearradata as $node){
            echo $node->category . "<br>";
        }

    }
}
