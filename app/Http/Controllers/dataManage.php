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
        $myfile = fopen("requireInfo.txt", "r") or die("Unable to open file!");
        $total = fread($myfile,filesize("requireInfo.txt"));
        fclose($myfile);
                                
        if($eori==0){
            $total+=$data["amount"];
        }else{
            $total-=$data["amount"];
        }

        $myfile = fopen("requireInfo.txt", "w") or die("Unable to open file!");
        
        fwrite($myfile, $total);
        fclose($myfile);

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

    public function showEdit($id){
        return $id;
    }

    public function showHome(Request $req){
        
        $d=strtotime("now");
        $endDate = date("Y-m-d", $d);
        $startDate =date("Y-m-d", strtotime("-1month",$d));

        $in = $req->input();
        if(count($in)>0){

            $endDate = $in['toDate'];
            $startDate = $in['fromDate'];
        }
        $myfile = fopen("requireInfo.txt", "r") or die("Unable to open file!");
        $total = fread($myfile,filesize("requireInfo.txt"));
        fclose($myfile);
     
        $requireData =  DB::select("SELECT `ID`, `Name`, `EorI`, `Amount` FROM `manage` WHERE `Date`>'".$startDate." 00:00:00' AND `Date`< '".$endDate." 23:59:59';");
        $rdata = json_decode(json_encode($requireData), true);
        $p1eamount = 0;
        $p1iamount = 0;
        $p2eamount = 0;
        $p2iamount = 0;
        $p3eamount = 0;
        $p3iamount = 0;
        $p4eamount = 0;
        $p4iamount = 0;
        foreach($rdata as $item){
            if($item['Name']=='p1'){
                if($item['EorI']=='1'){
                    $p1eamount+=$item['Amount'];
                }else{
                    $p1iamount+=$item['Amount'];
                }
            }elseif($item['Name']=='p2'){
                if($item['EorI']=='1'){
                    $p2eamount+=$item['Amount'];
                }else{
                    $p2iamount+=$item['Amount'];
                }
            }elseif($item['Name']=='p3'){
                if($item['EorI']=='1'){
                    $p3eamount+=$item['Amount'];
                }else{
                    $p3iamount+=$item['Amount'];
                }
            }else{
                if($item['EorI']=='1'){
                    $p4eamount+=$item['Amount'];
                }else{
                    $p4iamount+=$item['Amount'];
                }
            }
        }
        $maxValue = max($p1eamount,$p1iamount,$p2eamount,$p2iamount,$p3eamount,$p3iamount,$p4eamount,$p4iamount);
        $p1e = $p1eamount*100/$maxValue;
        $p1i = $p1iamount*100/$maxValue;
        $p2e = $p2eamount*100/$maxValue;
        $p2i = $p2iamount*100/$maxValue;
        $p3e = $p3eamount*100/$maxValue;
        $p3i = $p3iamount*100/$maxValue;
        $p4e = $p4eamount*100/$maxValue;
        $p4i = $p4iamount*100/$maxValue;
        echo $maxValue;
        
        return view("home",["total"=>$total,"p1e"=>$p1e,"p1i"=>$p1i, "p2e"=>$p2e,"p2i"=>$p2i
    ,"p3e"=>$p3e,"p3i"=>$p3i,"p4e"=>$p4e,"p4i"=>$p4i,"startDate"=>$startDate,"endDate"=>$endDate, 'max'=>$maxValue]);
    }
    
    
    
}
