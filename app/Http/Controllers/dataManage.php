<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
