<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Open+Sans:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>body{font-family:'Open Sans',sans-serif;text-align:center}h1,h2,h3,h4,h5{font-family:Montserrat,sans-serif}header{display:flex;align-items:center;justify-content:space-around;background-color:#212121;color:#fff}header.jumbotron{background-color:#212121}article{margin:64px 0;flex-grow:1}ul{list-style:none;margin:0;padding:0}footer{margin-top:16px;padding:64px 32px 64px 32px;background-color:#eee}</style>
</head>
<body>
<div class="container d-flex flex-column">
    <header class="jumbotron d-flex text-center justify-content-center">
        <h1>dzień dobry <?php echo $to ?></h1>
    </header>
    <article>
        <p>Dziekuję za wiadomość w kategorii <strong><?php echo $topic ?></strong>.</p>
        <p>Postaram się odpowiedzieć tak szybko, jak będzie to możliwe.
            W międzyczasie możesz zapoznać się z moimi zasobami:</p>
        <ul>
            <li><a href="https://bartusiak.com.pl/">Strona internetowa <i class="fas fa-globe"></i></a></li>
            <li><a href="https://bartusiak.com.pl/">LinkedIn <i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://bartusiak.com.pl/">Github <i class="fab fa-github-square"></i></a></li>
        </ul>
    </article>
    <footer>
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center"><h3>bartusiak</h3></div>
            <div class="col-12 col-md-6">
                <h3><a href="https://bartusiak.com.pl">bartusiak.com.pl</a></h3>
                <h5><a href="mailto:jakub@bartusiak.com.pl">jakub@bartusiak.com.pl</a></h5>
            </div>
        </div>
    </footer>
</div>
</body>
</html>