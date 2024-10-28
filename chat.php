<?php
// Arquivo: chat.php

// Verifica se o arquivo de mensagens existe. Se não existir, cria um novo arquivo vazio.
$arquivoMensagens = 'mensagens.txt';
if (!file_exists($arquivoMensagens)) {
    file_put_contents($arquivoMensagens, ""); // Cria o arquivo vazio
}

// Função para ler e exibir mensagens
function lerMensagens($arquivo) {
    $conteudo = file_get_contents($arquivo);
    echo "\n=== MENSAGENS ===\n";
    echo $conteudo;
    echo "\n=================\n";
}

// Função para enviar mensagem
function enviarMensagem($arquivo, $nome, $mensagem) {
    $linha = "[" . date('H:i:s') . "] $nome: $mensagem\n";
    file_put_contents($arquivo, $linha, FILE_APPEND);
}

// Início do chat
echo "Bem-vindo ao Chat! Digite seu nome: ";
$nome = trim(fgets(STDIN));

echo "Bem-vindo, $nome! Digite suas mensagens abaixo. Para sair, digite 'sair'.\n";

while (true) {
    lerMensagens($arquivoMensagens);
    echo "$nome> ";
    $mensagem = trim(fgets(STDIN));

    if ($mensagem === 'sair') {
        echo "Você saiu do chat.\n";
        break;
    }

    enviarMensagem($arquivoMensagens, $nome, $mensagem);

    // Atualizar mensagens em "tempo real" (espera de 1 segundo para simular tempo real)
    sleep(1);
}
