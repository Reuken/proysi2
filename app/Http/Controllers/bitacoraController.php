<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\bitacora;
use App\User;
use Auth;
use Datetime;

class bitacoraController extends Controller
{
    
      public function index(Request $request)
   {    


     $r=(new summaryController)->pass($act='bitacora');
        if($r>0){

        $hoy = new DateTime('now');   
        $bitacora = bitacora::all();
        $user = User::all();
		    $start = $request->input('start');
		    $finish = $request->input('finish');
		    $dias = $request->input('dias');
		    $tipo = $request->input('tipo');
		    $usuarios = $request->input('usuarios');
		    $actividad = $request->input('actividad');
        
        $filter=array();      
        if(isset($tipo)) {
          $filter[] = array('type','=',$tipo);
          $bitacora = bitacora::where($filter)->get();       
        }
        if(isset($usuarios)) {  

          $filter[] = array('id_user','=',$usuarios);
          $bitacora = bitacora::where($filter)->get();

         }
        if(isset($actividad)) {  
          $filter[] = array('activity','=',$actividad);
          $bitacora = bitacora::where($filter)->get();
        }

        if((isset($start)) and (isset($finish))){
          $start = new Datetime($start);
          $finish = new Datetime($finish);


          $bitacora1 = bitacora::whereBetween('created_date', [$start, $finish])->where($filter)->get();
            }elseif((isset($dias))){

            if($dias==30){
              $start=date('Y-m-d',strtotime('today - 30 days'));
            }
            if($dias==15){
              $start=date('Y-m-d',strtotime('today - 15 days'));
            }
            if($dias==7){
              $start=date('Y-m-d',strtotime('today - 7 days'));
            }
            if($dias==1){
              $start=date('Y-m-d',strtotime('today'));
            }

          $bitacora = bitacora::whereBetween('created_date', [$start, $hoy])->where($filter)->get();
        }else{

          $bitacora = bitacora::where('created_date','<=',$hoy)->get();

        }


        foreach ($bitacora as $s) {
          $name_user = User::find($s->id_user);
          $s->setAttribute('name_user',$name_user->name);
        }
      

        return view('vendor.adminlte.bitacora.bitacora',['bitacora'=>$bitacora,'user'=>$user]);
       }
        else{
            return view('vendor.adminlte.permission',['summary'=>null]);
          }
   }	
}


public function detalle(Request $request, $id=null)
   {  

    $r=(new summaryController)->pass($act='cuentas');
        if($r>0){

      $hoy = new DateTime('now');
     // $hoy=date('Y-m-d',strtotime('today + 1 day'));
        $categories = categories::all();
        $account = account::all();
        $divisa = settings::where('name','divisa')->first();
        $response =array();
        foreach ($account as $a) {
          $tmp = summary::where('created_at','<=',$hoy)->where('account_id',$id)->get();
          $total = 0;
          foreach ($tmp as $t) {
            if($t->type=='out'){
              $total -= $t->amount;
            }else{
            $total+= $t->amount;
            }
          }
            $a->setAttribute('total',$total);
        }
        $totalf=$total;



      if(!is_null($id)){
        if(summary::where('account_id',$id)->exists()){
          $summary = summary::where('account_id',$id)->get();
         
            $start = $request->input('start');
            $finish = $request->input('finish');


            if((isset($start)) and (isset($finish))){
                 
              $summary = summary::where('account_id',$id)->whereBetween('created_at', [$start, $finish])->get();
            }else{        
              $summary = summary::where('created_at','<=',$hoy)->where('account_id',$id)->get();
            }
            foreach ($summary as $s) {
                $name_account = account::find($s->account_id);
                $s->setAttribute('name_account',$name_account->name);
                $name_categories = categories::find($s->categories_id);
                $s->setAttribute('name_categories',$name_categories->name);

                  if(attached::where('summary_id',$s->id)->exists()){
                    $data_attached = attached::where('summary_id',$s->id)->first();
                    $s->setAttribute('attached',$data_attached);
                  }else{
                    $s->setAttribute('attached',null);
                  }
            }
        }else{
                $summary=array();
              }
            $nombre = account::where('id',$id)->first();

          
         
              return view('vendor.adminlte.account.detalle',['summary'=>$summary,'divisa'=>$divisa,'id'=>$id,'nombre'=>$nombre,'totalf'=>$totalf]);
      }

        $start = $request->input('start');
        $finish = $request->input('finish');

        if((isset($start)) and (isset($finish))){
          $start = new Datetime($start);
          $finish = new Datetime($finish);
          $summary = summary::whereBetween('created_at', [$start, $finish])->get();
        }else{
          $summary = summary::where('account_id',$id)->get();
        }

        
        foreach ($summary as $s) {
          $name_account = account::find($s->account_id);
          $s->setAttribute('name_account',$name_account->name);
          $name_categories = categories::find($s->categories_id);
          $s->setAttribute('name_categories',$name_categories->name);

          if(attached::where('summary_id',$s->id)->exists()){
            $data_attached = attached::where('summary_id',$s->id)->first();
            $s->setAttribute('attached',$data_attached);
          }else{
            $s->setAttribute('attached',null);
    
        }

        return view('vendor.adminlte.account.detalle',['summary'=>$summary,'divisa'=>$divisa,'id'=>null,'nombre'=>null,'totalf'=>null]);
         }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }    