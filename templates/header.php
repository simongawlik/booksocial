<!DOCTYPE html>

<html>

    <head>
        <link rel="stylesheet" media="screen" href="http://openfontlibrary.org/face/gnutypewriter" rel="stylesheet" type="text/css"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>sharemyshelf: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>sharemyshelf: Home</title>
        <?php endif ?>

        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/"><img src="/img/logo2.png" alt="sharemyshelf" width="400"></a>
            </div>

            <div id="middle">
