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
                   //$linkdataarray->text = $item['text'];

                    $linkdataarray2 = LinkDataArray::where('linkfrom',$item['from'] )->where('linkto',$item['to'] )
                        ->update(['text'=>$item['text']]);

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

        $nodearradata = Nodedataarray::where('text' ,'!=','Step')->where('text' ,'!=','???')->get();

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


//        foreach ($nodearradata as $no){
//
//
//            $linkdata = LinkDataArray::where('linkto', $no->keyto)->get();
//
//            $nodedata = Nodedataarray::where('keyto', $linkdata->first()['linkto'])->get();
//
//            foreach ($nodedata as $n ){
//                echo $n."<br>";
//            }
//        }







        foreach ($nodearradata as $node) {

            $nodedata = $this->checklinkdata($node['keyto']);
             //echo $nodedata."<br>";
            // echo $nodedata = json_decode($nodedata, true);
             $linkto =  $nodedata->first()['linkto'];
            foreach ($nodedata as $n) {
                //   echo  $n->text."<br>";


//            //  echo $node->text;

                if ($n->category == "step") {
                    if (strpos($n->text, "Declare") !== false) {
                        //  echo $node->text;
                        $text = explode(" ", $n->text);
                        $new = array();
                        $arr = array_diff($text, array("Declare", "variables", ",", "and", "variable", "take"));
                        //print_r($arr);
                        foreach ($arr as $a) {
                            $c = "int " . $a;
                            array_push($new, $c);
                        }

                        $string = implode(",", $new);

                        try {
                            $converttext = new Converttext();
                            $converttext->text = $string;
                            $converttext->save();
                        }
                        catch (\Exception $e){}
                        //   $linkdata = LinkDataArray::where('linkfrom', $node['keyto'])->get();
                        //  foreach ($linkdata as $l){


                    } else if (strpos($n->text, "Read") !== false){
                        $text = explode(" ", $n->text);
                        $new = array();
                        $arr = array_diff($text, array("Read", "Scan", ",", "and", "variable"));
                        //print_r($arr);
                        foreach ($arr as $a) {
                            $c = 'scanf("%d", &' . $a . ')';
                            //array_push($new, $c);


                            // $string = implode(",", $new);
                            try {
                                $converttext = new Converttext();
                                $converttext->text = $c;
                                $converttext->save();
                            }
                            catch (\Exception $e){}
                        }
                    }

                }else if ($n->category == "Conditional") {


                    $this->conditional($n);


                }

            }
        }


            echo "<br>";
        }


        public function checklinkdata ($value){

            $linkdata = LinkDataArray::where('linkfrom', $value)->get();
            $nodedata = Nodedataarray::where('keyto', $linkdata->first()['linkto'])->get();

            return $nodedata;
        }



        public function conditional ($val)
        {

            if (strpos($val->text, "???") !== false) {
            } else {

                //  $string = implode(",", $new);
                try {
                    $converttext = new Converttext();
                    $converttext->text = "if (" . $val->text . ") {";
                    $converttext->save();
                } catch (\Exception $e) {
                }

                $linkdatacheck = LinkDataArray::where('linkfrom', $val->keyto)->where('text', "YES")->get();
                $nodedatacheck = Nodedataarray::where('keyto', $linkdatacheck->first()['linkto'])->get();
                foreach ($nodedatacheck as $nodecheck) {

                    if ($nodecheck->category == "step") {
                        if ($nodecheck->text != "Step") {

                              $string = str_replace('Print', '',$nodecheck->text);
                             // $string = chop($nodecheck->text,"Print");
                              // $string;

                                try {
                                    $converttext = new Converttext();
                                    $converttext->text = $string;
                                     //  $converttext->save();
                                } catch (\Exception $e) {
                                }
                                //   $linkdata = LinkDataArray::where('linkfrom', $node['keyto'])->get();
                                //  foreach ($linkdata as $l){

                            }

                        } else {
                            $this->conditional($nodedatacheck);
                        }
                    }
                }
            }


}
