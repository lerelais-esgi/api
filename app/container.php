<?php

$container = $app->getContainer();

$container['debug'] = function() {
    return true;
};

$container['db'] = function () {
        $p = new PDO('mysql:dbname=lerelais;host=localhost', 'finley', file_get_contents(__DIR__.'/.htmysql'));
        return $p;
};


$container['mailer'] = function ($container) {
    $transport = (new Swift_SmtpTransport('mail18.lwspanel.com', 587));
    $transport->setUsername('support@regularweb.eu');
    $transport->setPassword(file_get_contents(__DIR__.'/.htsmtp'));

    $mailer = new Swift_Mailer($transport);
    return $mailer;
};