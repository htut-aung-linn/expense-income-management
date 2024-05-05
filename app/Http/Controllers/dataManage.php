<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\manage;

class dataManage extends Controller
{
    //

    public function newData(Request $req){
        $data = $req->input(); 
        $newM = new manage;
        $newM->ID = uniqid();
        $eori = 1;
        if($data["e-or-i"]=="i"){
            $eori = 0;
        }
        $newM->Name = $data["p-name"];
        $newM->EorI = $eori;
        $newM->Amount = $data["amount"];
        $newM->Description = $data["description"];
        $newM->save();
        return var_dump($data);
    }

    public function del($id){
        
        DB::delete("DELETE FROM manage WHERE `manage`.`ID` = '".$id."'");
        return $id;
    }

    public function initHistory(){
        $hdata = DB::select("SELECT * FROM `manage` ORDER BY manage.Date DESC LIMIT 5;");
        $array = json_decode(json_encode($hdata), true);
        $array = $this->adjustData($array);
        //var_dump($array);
        $count = json_decode(json_encode(DB::select("SELECT COUNT(*) FROM manage;")), true);
        $c = $count[0]['COUNT(*)'];
        //var_dump($c);
        return view("history",["hdata"=>$array, "count" => $c, "current" => "10"]);
    }
    public function adjustData($array){
        $return=array();
        foreach($array as $item){
            if($item['Name']=="p1"){
                $item['Name']= 'Father';
            }elseif($item['Name']=="p2"){
                $item['Name']= 'Mother';
            }elseif($item['Name']=="p3"){
                $item['Name']= 'Daughter';
            }else{
                $item['Name']= 'Son';
            }
            $d=strtotime($item['Date']);
            $item['Date'] = date("Y-m-d", $d);
            array_push($return,$item);
        }
        return $return;
    }

    public function getMore($count){
        $hdata = DB::select("SELECT * FROM `manage` ORDER BY manage.Date DESC LIMIT ".$count.";");
        $array = json_decode(json_encode($hdata), true);
        $array = $this->adjustData($array);
        //var_dump($array);
        $cou = json_decode(json_encode(DB::select("SELECT COUNT(*) FROM manage;")), true);
        $c = $cou[0]['COUNT(*)'];
        //var_dump($c);
        return view("history",["hdata"=>$array, "count" => $c, "current" => $count+5]);
    }

}
