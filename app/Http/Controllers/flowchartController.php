<?php

namespace App\Http\Controllers;

use App\Converttext;
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

//        foreach ($nodearradata as $node){
//            $text = explode(" ", $node->text);
//
//            foreach ($text as $t){
//                //echo $t." ";
//
//                if ($t =="Start" || $t =="Step"){}
//                if ($t =="Declare" || $t == "declare"){
//                  //  echo $t;
//
//                }
//                echo $t;
//            }
//            echo "<br>";
//        }


        foreach ($nodearradata as $node) {

            $nodedata = $this->checklinkdata($node['keyto']);
            echo $nodedata = json_decode($nodedata, true);

             break;

//            //  echo $node->text;

//                if (strpos($node->text, "Declare") !== false) {
//                    //  echo $node->text;
//                    $text = explode(" ", $node->text);
//                    $new = array();
//                    $arr = array_diff($text, array("Declare", "variables", ",", "and", "variable"));
//                    //print_r($arr);
//                    foreach ($arr as $a) {
//                        $c = "$" . $a;
//                        array_push($new, $c);
//                    }
//
//                    $string = implode(",", $new);
//
//                    $converttext = new Converttext();
//                    $converttext->text = $string;
//                   // $converttext->save();
//
//                    $linkdata = LinkDataArray::where('linkfrom', $node['keyto'])->get();
//                    foreach ($linkdata as $l){
//
//
//                    }
//
//                }
            }


            echo "<br>";
        }


        public function checklinkdata ($value){

            $linkdata = LinkDataArray::where('linkfrom', $value)->get();
           // $nodedata = Nodedataarray::where('keyto', $linkdata->linkto)->get();

            return $linkdata;
        }


}
