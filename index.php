<?php
require_once 'bot.php';
$telegram->setWebhook(['url' => 'https://web.telegram.org/a/#6080931203']);
$update = $telegram->getWebhookUpdate();
