<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Управляющая компания ООО &quot;Золотой ключ&quot; г.Благовещенск">
        <meta name="keywords" content="Управляющая компания, Золотой ключ, Благовещенск">

        <link rel="icon" href="/favicon.png">
        <title>УК ООО "Золотой ключ"</title>
        <meta property="og:title" content="УК &quot;Золотой ключ&quot;">
        <meta property="og:description" content="Управляющая компания ООО &quot;Золотой ключ&quot; г.Благовещенск">
        <meta property="og:image" content="/favicon.png">
        <meta property="og:url" content="https://goldenkey28.ru/">
        <meta property="og:locale" content="ru_RU">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="GOLDENKEY28.RU">

        <link rel="stylesheet" href="/public/css/bootstrap.min.css?">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/public/css/sticky-footer.css?1">
        <link rel="stylesheet" href="/public/css/m.css?2">
    </head>
    <body>

        <div class="page-wrap" id="page">
            
            <nav class="navbar navbar-expand-md mdb-color lighten-2 text-white py-0 px-2 px-sm-0"> <!-- class="navbar-light py-0 px-sm-1" -->

                <div class="container px-0 position-relative">

                    <a class="navbar-brand mb-0 mr-md-4" href="/"><img src="/public/src/logo.png" width="170" height="70" class="d-inline-block align-top" alt="" title="Главная страница"></a>

                    <span class="navbar-text text-white"><i class="fa fa-phone-square"></i> 512721</span>

                    <button class="navbar-toggler py-1 px-2" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">МЕНЮ</span>
                    </button>

                    <div class="collapse navbar-collapse text-center" id="navbar-toggle">
                        <ul class="navbar-nav ml-auto">
                            <? foreach ($CFG['main_menu'] as $link_name => $link): ?>

                            <li class="nav-item">
                                <a class="nav-link<?= (($data['route'] === $link) ? ' active' : '') ?>" href="/<?= $link ?>"><?= $link_name ?></a>
                            </li>
                            <? endforeach; ?>

                        </ul>
                    </div>

                    <? if($_SESSION['admin']): ?>

                        <p class="admin-mode small mb-0 position-absolute">Режим администратора / <a href="/logout">выход</a></p>

                    <? // else: echo '<p class="admin-mode small mb-0 position-absolute">Сайт в разработке</p>'; ?>
                    <? endif; ?>

                </div>
 
            </nav>
