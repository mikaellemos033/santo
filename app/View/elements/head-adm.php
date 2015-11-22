<?php
/*
 * Head default das página de
 * administração do site
 *
 */
 ?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mikael Lemos">
    <title><?= ( empty($title_head) ? 'Adm Wolpac' : "{$title_head} | Wolpac" ) ?></title>
    <link rel="stylesheet" href="/webroot/bower_components/Materialize/dist/css/materialize.min.css">
    <!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link rel="stylesheet" href="/webroot/css/santo-theme.css">
    <link rel="stylesheet" href="/webroot/css/estilo.css">
    <link rel="stylesheet" href="/webroot/bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="/webroot/bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/webroot/bower_components/jquery.livequery/dist/jquery.livequery.min.js"></script>
    <script type="text/javascript" src="/webroot/bower_components/Materialize/dist/js/materialize.min.js"></script>
    <script type="text/javascript" src="/webroot/js/santo-theme.js"></script>
    <script type="text/javascript" src="/webroot/js/validacao.js"></script>
    <?php include 'css-html.php'; ?>
</head>
<body>
