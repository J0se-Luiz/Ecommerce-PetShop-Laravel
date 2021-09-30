<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

require_once('/var/www/PatanaJanta_laravel/public/PHPMailer/src/PHPMailer.php');
require_once('/var/www/PatanaJanta_laravel/public/PHPMailer/src/SMTP.php');
require_once('/var/www/PatanaJanta_laravel/public/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EmailController extends Controller
{
    public function enviar($nome, $remetente, $mensagem)
    {
        try{
            $emailPataNaJanta = 'suporte.patanajanta@gmail.com';
            $senha = 'PataNaJanta@2020';
            $assunto = 'Fale Conosco Pata na Janta - Site';

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
            $mail->addAddress($emailPataNaJanta);

            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = "<strong>Nome do usuário:</strong> $nome<br>
                            <strong>Email de contato:</strong> $remetente<br><br>
                            <strong>Mensagem:</strong> $mensagem";


            //MSG ALTERNATIVA CASO O EMAIL NÃO RENDERIZE HTML
            //VERIFICA O SISTEMA OPERACIONAL EM QUE O PHP ESTA RODANDO
            switch (PHP_OS) {

                case 'Linux':
                    $mail->AltBody = "Nome do usuário: $mensagem\n
                                Email de contato: $remetente\n\n
                                Mensagem: $mensagem";
                    break;

                case 'Windows':
                    $mail->AltBody = "Nome do usuário: $mensagem\n\r
                                Email de contato: $remetente\n\r\n\r
                                Mensagem: $mensagem";
                    break;

                default:
                    $mail->AltBody = "Nome do usuário: $mensagem\r
                    Email de contato: $remetente\r\r
                    Mensagem: $mensagem";
                    break;
            }


            if($mail->send()) {
                return response()->json(['status' => 'Sucesso']);
            }

            return response()->json(['status' => 'Falha']);

        }catch(\Exception $e){
            return response()->json(['status' => 'Falha', 'Exception PHPMailer' => $mail->ErrorInfo]);
        }
    }


    public function enviarPedido($nome, $destinatario, $numeroPedido)
    {
        try{
            $emailPataNaJanta = 'suporte.patanajanta@gmail.com';
            $senha = 'PataNaJanta@2020';
            $assunto = 'Detalhes do Pedido - Site';

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
            $mail->addAddress($destinatario);

            $mail->isHTML(true);
            $mail->Subject = $assunto; //https://i.ibb.co/XtFJXsp/logov76etop.png
            $mail->Body = "<div style=\"background-color: #b7773f;\">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                <img width=\"130\" src=\"https://i.ibb.co/pzRtvYq/logov7.png\">
                                            </th>
                                            <th style=\"padding: 0px 5px; color: #351912;\">
                                                <h2>Detalhes do Pedido</h2>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                        </div><br><br>
                        Olá $nome!<br><br>
                            Seu pedido foi gerado com <strong>sucesso!</strong></h5><br>
                            O número do seu pedido é: <strong>$numeroPedido<strong><br><br>
                            Obrigado por comprar em nossa loja!<br>
                            <h6>*Por favor, não responder esse e-mail, pois esta é uma mensagem automática.</h6>";


            //MSG ALTERNATIVA CASO O EMAIL NÃO RENDERIZE HTML
            //VERIFICA O SISTEMA OPERACIONAL EM QUE O PHP ESTA RODANDO
            switch (PHP_OS) {

                case 'Linux':
                    $mail->AltBody = "Olá $nome!\n
                    Seu pedido foi gerado com sucesso!\n\n
                    O número do seu pedido é: $numeroPedido\n\n
                    Obrigado por comprar em nossa loja!\n
                    *Por favor, não responder esse e-mail, pois esta é uma mensagem automática.";
                    break;

                case 'Windows':
                    $mail->AltBody = "Olá $nome!\n
                    Seu pedido foi gerado com sucesso!\n\n
                    O número do seu pedido é: $numeroPedido\n\n
                    Obrigado por comprar em nossa loja!\n
                    *Por favor, não responder esse e-mail, pois esta é uma mensagem automática.";
                    break;

                default:
                    $mail->AltBody = "Olá $nome!\n
                    Seu pedido foi gerado com sucesso!\n\n
                    O número do seu pedido é: $numeroPedido\n\n
                    Obrigado por comprar em nossa loja!\n
                    *Por favor, não responder esse e-mail, pois ela é uma mensagem automática.";
                    break;
            }


            if($mail->send()) {
                return response()->json(['status' => 'Sucesso']);
            }

            return response()->json(['status' => 'Falha']);

        }catch(\Exception $e){
            return response()->json(['status' => 'Falha', 'Exception PHPMailer' => $mail->ErrorInfo]);
        }
    }
}
