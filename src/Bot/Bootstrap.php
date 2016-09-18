<?php
declare(strict_types = 1);

namespace Bot;

use Longman\TelegramBot\Telegram;

class Bootstrap
{

    public static function setup(Telegram $telegram)
    {
        $mysql_credentials = [
            'host' => self::getEnvVariable('DB_PORT_3306_TCP_ADDR'),
            'user' => 'root',
            'password' => self::getEnvVariable('DB_ENV_MYSQL_ROOT_PASSWORD'),
            'database' => self::getEnvVariable('DB_ENV_MYSQL_DATABASE'),
        ];

        $telegram->enableMySql($mysql_credentials);
        $telegram->addCommandsPath(ROOT_PATH.'/src/Bot/Commands');
        $telegram->enableAdmin(214366136);
        $telegram->setDownloadPath(ROOT_PATH.'/var/media/Download');
        $telegram->setUploadPath(ROOT_PATH.'/var/media/Upload');
    }

    private function getEnvVariable(string $name)
    {
        return $_SERVER[$name] ?? null;
    }
}