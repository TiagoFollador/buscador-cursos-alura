#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Alura\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;



$client = new Client(['base_uri' => 'https://www.alura.com.br/', 'verify'=> false]);

$crawler = new Crawler();

$cursos = $crawler->filter("span.card-curso__nome");

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    exibeMensagem($curso);
}