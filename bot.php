<?php
require_once 'vendor/autoload.php';
use TelegramBotApi;
$telegram = new Api('6080931203:AAGb82kefXNbkKIzT4wvXHY5H8ljvKRAk2c');
function handleStartCommand($update) {
    global $telegram;
    $message = $update->getMessage();
    $chatId = $message->getChat()->getId();
    $telegram->sendMessage([
      'chat_id' => $chatId,
      'text' => 'Привет! Я бот, как я могу тебе помочь?'
    ]);
  }
  function handleHelpCommand($update) {
    global $telegram;
    $message = $update->getMessage();
    $chatId = $message->getChat()->getId();
    $telegram->sendMessage([
      'chat_id' => $chatId,
      'text' => 'Список доступных команд:
  /start - начать общение с ботом
  /help - получить список доступных команд'
    ]);
  }
  function handleTextMessage($update) {
    global $telegram;
    $message = $update->getMessage();
    $chatId = $message->getChat()->getId();
    $text = $message->getText();
    $telegram->sendMessage([
      'chat_id' => $chatId,
      'text' => "Вы написали: $text"
    ]);
  }
  function handleUnknownCommand($update) {
    global $telegram;
    $message = $update->getMessage();
    $chatId = $message->getChat()->getId();
    $telegram->sendMessage([
      'chat_id' => $chatId,
      'text' => 'Неизвестная команда. Напишите /help, чтобы получить список доступных команд'
    ]);
  }
  $update = $telegram->getWebhookUpdate();
  if ($update->getMessage() !== null) {
    $message = $update->getMessage();
    if (strpos($message->getText(), '/start') === 0) {
      handleStartCommand($update);
    } elseif (strpos($message->getText(), '/help') === 0) {
      handleHelpCommand($update);
    } elseif ($message->getText() !== null) {
      handleTextMessage($update);
    } else {
      handleUnknownCommand($update);
    }
  }
          
