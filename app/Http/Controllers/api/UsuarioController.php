<?php

namespace App\Http\Controllers\api;

use App\usuario;
use App\Endereco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;

require_once('/var/www/PatanaJanta_laravel/public/PHPMailer/src/PHPMailer.php');
require_once('/var/www/PatanaJanta_laravel/public/PHPMailer/src/SMTP.php');
require_once('/var/www/PatanaJanta_laravel/public/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->classe = usuario::class;
    }

    public function cadastrar(Request $req)
    {
        try{
            $dados = $req->all();
            $usuarios = usuario::all();

            //VERIFICA SE JA EXISTE USUARIO COM EMAIL OU CPF CADASTRADOS
            foreach($usuarios as $usuario){
                if($usuario['email'] == $dados['email']){
                    throw new \Exception('Este e-mail já está vinculado a outro usuário!');
                }

                if($usuario['CPF'] == $dados['CPF']){
                    throw new \Exception('Este CPF já está vinculado a outro usuário!');
                }
            }

            //CRIA USUARIO
            $this->classe::create($dados);

            return response()->json(['status'=>'sucesso'], 201);

        }catch(\Exception $e){
            return response()->json(['status'=>$e->getMessage()], 201);
        }
    }

    public function atualizar(Request $req, $id)
    {

        try{
            $dados = $req->all();
    
            $usuario = usuario::find($id);

            if (is_null($usuario)) {
                throw new \Exception ('Recurso não encontrado');
            }

            if($usuario->email != $dados['email']){

                //VERIFICA SE EMAIL ENVIADO NO FORMULARIO JA EXISTE NO BANCO DE DADOS
                if(!is_null(usuario::where('email', $dados['email'])->first())){
                    throw new \Exception("Email já existente!");
                }
            }

            $usuario->update($dados);
    
            return response()->json(['status'=>'sucesso'], 200);
        }
        catch(\Exception $e){
            return response()->json(['erro' => $e->getMessage()], 201);
        }
        
    } 

        public function listarUsuarioEndereco(Request $req, $id)
        {

            $usuario = $this->classe::where('id', $id)->first();
            $endereco = DB:: table ('endereco_usuarios as eu')
            ->join('enderecos as e', 'e.id', 'eu.id_endereco')
            ->where ('eu.id_usuario', $usuario->id)
            ->get();
        
            $array [] = $usuario;
            $array [] = $endereco;
            return response ()->json($array, 200); 

        }


        public function resetaSenhaUsuario($emailOuCPF)
        {
            $arrayLetrasMin = ['a','b','c','d','e','f','g','h','i','j','k','l','m',
                            'n','o','p','q','r','s','t','u','v','w','x','y','z'];

            $arrayCaracSpecial = ['@','#','$','*','!','?'];
            $arrayLetrasMai = [];
            $arrayNum = [];

            $tempArray = [];
            $novaSenha = '';


            //POPULA ARRAY DE LETRAS MAIUSCULAS
            foreach($arrayLetrasMin as $letras){
                $arrayLetrasMai[] = strtoupper($letras);
            }

            //POPULA ARRAY DE NUMEROS
            for($i = 0; $i<10; $i++){
                $arrayNum[] = $i;
            }

            //GERA SENHA ALEATORIA COM UM PADRAO
            for($i = 0; $i<9; $i++){
                
                switch ($i){
                    case 0:
                    case 1:
                    case 2:
                        $novaSenha .= $arrayLetrasMai[random_int(0,count($arrayLetrasMai)-1)];
                    break;

                    case 3:
                    case 4:
                    case 5:
                        $novaSenha .= $arrayNum[random_int(0,count($arrayNum)-1)];
                    break;

                    default:
                        $novaSenha .= $arrayLetrasMin[random_int(0,count($arrayLetrasMin)-1)];
                    break;
                }
            }

            //echo($novaSenha);

            try{

                $usuario = usuario::where('email',$emailOuCPF)
                    ->orWhere('CPF',$emailOuCPF)
                    ->first();

                if(is_null($usuario)){
                    throw new \Exception('Email ou CPF não está vinculado a nenhum usuário deste site.');
                }

                //CONVERTE OBJETO EM ARRAY E REALIZA O UPDATE
                $usuario->update((array) ['senha'=>"$novaSenha"]);



                //ENVIA EMAIL COM NOVA SENHA GERADA
                $emailPataNaJanta = 'suporte.patanajanta@gmail.com';
                $senha = 'PataNaJanta@2020';
                $assunto = 'Reset de senha - Pata na Janta';

                $mail = new PHPMailer(true);

                //CONFIGURAÇOES SMTP GMAIL
                /* $mail->SMTPDebug = SMTP::DEBUG_SERVER; */
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $emailPataNaJanta;
                $mail->Password = $senha;
                $mail->Port = 587;

                //DEFINE DESTINATARIOS E REMETENTE
                $mail->SetFrom($emailPataNaJanta);
                $mail->addAddress($usuario->email);

                $mail->isHTML(true);
                $mail->Subject = $assunto;  //https://i.ibb.co/XtFJXsp/logov76etop.png
                $mail->Body = "<div style=\"background-color: #b7773f;\">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <img width=\"130\" src=\"https://i.ibb.co/pzRtvYq/logov7.png\">
                                                </th>
                                                <th style=\"padding: 0px 5px; color: #351912;\">
                                                    <h2>Reset de senha</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                            </div><br><br>
                                Olá $usuario->nome!<br>
                                Sua nova senha é <strong>$novaSenha</strong></h5><br>
                                <h6>*Por favor, não responder esse e-mail, pois esta é uma mensagem automática.</h6>";


                //MSG ALTERNATIVA CASO O EMAIL NÃO RENDERIZE HTML
                //VERIFICA O SISTEMA OPERACIONAL EM QUE O PHP ESTA RODANDO
                switch (PHP_OS) {

                    case 'Linux':
                        $mail->AltBody = "Olá $usuario->nome!\n
                        Sua nova senha é $novaSenha\n\n
                        *Por favor, não responder esse e-mail, pois esta é uma mensagem automática.";
                        break;

                    case 'Windows':
                        $mail->AltBody = "Olá $usuario->nome!\n
                        Sua nova senha é $novaSenha\n\n
                        *Por favor, não responder esse e-mail, pois esta é uma mensagem automática.";
                        break;

                    default:
                        $mail->AltBody = "Olá $usuario->nome!\n
                        Sua nova senha é $novaSenha\n\n
                        *Por favor, não responder esse e-mail, pois esta é uma mensagem automática.";
                        break;
                }


                if($mail->send()){
                    return response()->json(['status'=>'sucesso', 201]);
                }

                return response()->json(['status' => 'Falha']);
                

            }catch(\Exception $e){
                return response()->json(['status'=>$e->getMessage()], 201);
            }
        }
}
