<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Endereco_usuario;
use App\Endereco;

class EnderecoController extends Controller
{
  
    public function salvarEndereco(Request $req,$id)
    {
        try{
            $endereco = $req->all();
            $objEndereco= Endereco::create($endereco);
            $todosEnderecos = endereco_usuario::create(['id_usuario'=>$id,'id_endereco'=>$objEndereco->id]);
            
            if(is_null($endereco)){
                throw new \Exception('Cliente não cadastrado');
            }
            return response()->json($todosEnderecos,201);
         
        }catch(\Exception $e){
            return response()->json(['erro' => $e->getMessage()], 404);
        }
    }

    public function BuscarEndereco($id)
    {
        try{
     
            $endereco = Endereco_usuario::where('id_usuario',$id)
                    ->join('enderecos as end','endereco_usuarios.id_endereco','end.id')
                    ->get();

            if(is_null($endereco) || $endereco->count() == 0){
                throw new \Exception('Endereço não encontrado');
            }
            return response()->json($endereco,200);
            
        }catch(\Exception $e){
            return response()->json(['erro' => $e->getMessage()], 404);
        }
        
     
    }

    public function DeletarEndereco($id)
    {
        $endereco = Endereco_usuario::where('id_endereco',$id);
        

        if(is_null($endereco)){
            return response()->json(['erro'=> 'Recurso não encontrado'],404);
        }

        $endereco->delete();

            return response()->json('Item removido',200);
    }

    public function atualizarEndereco(Request $req,$id)
    {
        $endereco = $req->all();

        $enderecoAtual = Endereco::find($id);

        if(is_null($enderecoAtual)){
            return response()->json(['erro'=>'Recurso não encontrado'],404);
        }

        return response()->json($enderecoAtual->update($endereco));

    }


}
    