<?php

// Divido em 3 partes
//
// 1 - header -> qual tipo de token e algoritimo da assinatura
// 2 - payload -> quem é o emissor do token, expiração, email, name..
// 3 - assinatura -> documento assinado
//

$cabecalho = [
  'alg' => 'HS256',
  'typ' => 'JWT'
];

$corpoDaInformacao =[
    'name' => 'administrador',
    'email' => 'admin@user.com',
    'role'  => 'admin'
];

$cabecalho = json_encode($cabecalho);
$corpoDaInformacao = json_encode($corpoDaInformacao);


echo "Cabeçalho JSON: $cabecalho";
echo "\n";
echo "Corpo da Informação JSON $corpoDaInformacao";
echo "\n\n";


$cabecalho = base64_encode($cabecalho);
$corpoDaInformacao = base64_encode($corpoDaInformacao);

echo "Cabeçalho BASE64: $cabecalho";
echo "\n";
echo "Corpo da Informação BASE64 $corpoDaInformacao";
echo "\n\n";

echo "$cabecalho.$corpoDaInformacao";
echo "\n\n";
$chave = "asdasidiuyilsjdadwe4d89we4f984f43sd";

$assinatura = hash_hmac('sha256', "$cabecalho.$corpoDaInformacao", $chave, true);
echo "Assinatura RAW: $assinatura";
echo "\n\n";

$assinatura = base64_encode($assinatura);
echo "Assinatura BASE64: $assinatura";
echo "\n\n";

echo "JWT: $cabecalho.$corpoDaInformacao.$assinatura";
echo "\n\n";