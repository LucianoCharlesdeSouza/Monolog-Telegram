<?php
namespace Logs\Telegram;

use Logs\Telegram\Handler\TelegramBotHandler;

class LogTelegram extends TelegramBotHandler
{
    /**Método que irá sobreescrever de TelegramBotHandler
     * @param array $record
     */
    public function write(array $record): void
    {
        $message = "[{$record['level_name']}] - data: {$record['datetime']->format('d/m/Y H:i:s')} - mensagem: {$record['message']}";
        if (isset($record['context']['exception'])) {
            $message .= "- Arquivo: {$record['context']['exception']->getFile()} - Linha: {$record['context']['exception']->getLine()}";
        }
        $record['formatted'] = $message;
        parent::write($record);
    }

    /**
     * @param $level
     * @param $message
     * @param $exception
     * @return array
     * @throws \Exception
     */
    public function records($level, $message, $exception): array
    {
        return [
            'level_name' => $level,
            'datetime'   => new \DateTime,
            'message'    => utf8_encode($message),
            'context'    => ['exception' => $exception]
        ];
    }
}