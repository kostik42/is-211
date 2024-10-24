<?php
use Routers\Router;
require_once("./vendor/autoload.php");

$router = new Router();
$url = $_SERVER['REQUEST_URI'];

echo $router->route($url);

exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BURGER KRIG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="./index.php">Главная</a>
                    <a class="nav-link" href="./products.html">Каталог</a>
                    <a class="nav-link" href="/orders/">Сделать заказ</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mb-5 mt-5">
            <div class="h-50 w-75 mx-auto">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./img/5347.jpg" class="d-block w-100" alt="..." height="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/1522.png" class="d-block w-100" alt="..." height="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/bekon.jpg" class="d-block w-100" alt="..." height="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>