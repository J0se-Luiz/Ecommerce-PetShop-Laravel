<?php

namespace App\Http\Controllers\api;
use Auth;
use App\usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class LoginController extends Controller
{

    private $dado1;
    private $dado2;

    public function login($dado1,$dado2){
    
        $this->dado1=$dado1;
        $this->dado2=$dado2;

        try{
            $resultado = DB::table('usuarios')
            ->where(function($query){
                $query->where('CPF','=',$this->dado1)
                ->orWhere('email','=',$this->dado1); 
            })->where(function($query){
                $query->where('senha','=',$this->dado2);
            })
            ->first();

            if(is_null($resultado)){
                throw new \Exception('Usuário ou senha inválidos');
            }

            $usuario=usuario::where('id','=',$resultado->id)->get();
            
            return response()->json($usuario,200); 
        }catch(\Exception $e){
            return response()->json(['status'=>$e->getMessage()]);
        }
    } 
}