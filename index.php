<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/Config/config.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Logs\Telegram\LogTelegram;

/**
 * Instanciamos a classe Logger e criamos um canal de Logs
 */
$log = new Logger('myChannel');

/**
 *Setamos um caminho e nome para o arquivo de log que será criado em DISCO
 */
$log->pushHandler(new StreamHandler('myLogs.log'));

/**
 * Instanciamos a classe LogTelegram passando nossa apiKey e chatId
 */
$telegram = new LogTelegram(TELEGRAM['apiKey'], TELEGRAM['chatId']);

try {

    /**
     * Simulamos um erro na conexão PDO com nossa base de dados
     */
    $pdo = new PDO('mysql:dbname=seubanco;host=localhost', 'root', '');

} catch (PDOException $e) {

    /**
     * Vamos escrever no log de erros em DISCO
     */
    $log->warning("Mensagem: {$e->getMessage()} Arquivo: {$e->getFile()}  Linha: {$e->getLine()}");

    /**
     * Vamos enviar os erros ao TELEGRAM
     */
    $telegram->write($telegram->records('ERROR', $e->getMessage(), $e));

    /**
     * Mostramos um erro personalizado ao usuario final
     */
    die('Erro ao conectar');
}
