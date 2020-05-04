<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $title ?></title>
    <style>
        *{font-family:Arial,sans-serif;text-align:center}h1,h2,h3,h4,h5{font-weight:700}body{max-width:800px;min-width:400px;margin:0 auto}header{padding:64px 32px;display:flex;align-items:center;justify-content:space-around;background-color:#212121;color:#fff;text-align:center}article{padding:64px 32px;flex-grow:1;background-color:#efefef}ul{list-style:none;margin:0;padding:0}footer{padding:64px 32px 64px 32px;background-color:#dedede}
    </style>
</head>
<body>
<header>
    <h1>dzień dobry <?php echo $to ?></h1>
</header>
<article>
    <p>Dziekuję za wiadomość w kategorii <strong><?php echo $topic ?></strong>.</p>
    <p>Postaram się odpowiedzieć tak szybko, jak będzie to możliwe.
        W międzyczasie możesz zapoznać się z moimi zasobami:</p>
    <ul>
        <li><a href="https://bartusiak.com.pl/">Strona internetowa</a></li>
        <li><a href="https://bartusiak.com.pl/">LinkedIn</a></li>
        <li><a href="https://bartusiak.com.pl/">Github</a></li>
    </ul>
</article>
<footer>
    <h3><a href="https://bartusiak.com.pl">bartusiak.com.pl</a></h3>
    <h5><a href="mailto:jakub@bartusiak.com.pl">jakub@bartusiak.com.pl</a></h5>
</footer>
</body>
</html>