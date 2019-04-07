<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class flowchartController extends Controller
{
    //

    public function index(Request $r){

        $jsondata = $r->jsondata;

        //return $jsondata;
        $json = json_decode($jsondata, true);
        $count= count($json['nodeDataArray']);
       // return $count;
        foreach($json['nodeDataArray']['text'] as $stat => $value) {

            return $value;
        }
        while ($count >0){

          // return $count;
            return $json['nodeDataArray'][$count]['text'];

        }

        //return $json['nodeDataArray'][0]['category'];
    }
}
