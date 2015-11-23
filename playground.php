<?php

include_once 'vendor/autoload.php';

use Symfony\Component\Stopwatch\Stopwatch;

$stopwatch = new Stopwatch();
$stopwatch->start('eventName');

include_once 'vendor/autoload.php';

$url = 'http://api.openweathermap.org/data/2.5/weather?q=London&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
$browser = new Buzz\Browser();
$response = $browser->get($url);


$content = $response->getContent();

$weatherObject = json_decode($content);

// var_dump($weatherObject->main->temp);

$a = $weatherObject->main->temp;
$b = $a - 273;
$c = round($b);

echo ('Temperatura w '. $weatherObject->name . ' wynosi: ' . "\xA" . $c . '.' . ' st. Celcjusza'. "\xA");

$event = $stopwatch->stop('eventName');
echo('Wyswietlono w: '. $event->getDuration() . 'ms' . "\xA");

?>
