<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php require('views/header.php') ?>
    <div class="position-relative" style="height:auto; width:100%;">
        <img src="images/ibarbo depan.jpg" alt="" style="width:100%; height:70%;" class="position-relative">
        <div class="position-absolute top-0 start-50 translate-middle-x text-center">
            <h1 class="rubik-font p-5 text-kuning">
                Destination
            </h1>
        </div>
    </div>
    <div class="position-relative d-flex column-gap-5 row-gap-3 justify-content-center align-items-center flex-wrap" style="height:auto;top:120%;width:100%;z-index:99;">
        <div class="d-block my-3 mx-5 px-5 p-4 rounded-4 shadow bg-orange text-kuning text-center">
            <h3 class="py-2">2024</h3>
            <span class="py-3">dsadsa</span>
        </div>
        <div class="d-block my-3 mx-5 px-5 p-4 rounded-4 shadow bg-orange text-kuning text-center">
            <h3 class="py-2">243</h3>
            <span class="py-3">dsds</span>
        </div>
        <div class="d-block my-3 mx-5 px-5 p-4 rounded-4 shadow bg-orange text-kuning text-center">
            <h3 class="py-2">454</h3>
            <span class="py-3">dsds</span>
        </div>
    </div>
    <div class="position-relative bg-content-c z-index-1">
        <h2 class="rubik-font p-2 mt-4 mb-2 text-center">
            Desk
        </h2>
        <div class="m-3 mx-5 text-center text-warna-primary">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae rem accusamus dolorum debitis assumenda praesentium inventore laboriosam laudantium consequatur impedit? Quibusdam sapiente maxime non in sunt nihil alias iste ipsa.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, cumque nesciunt in repellendus porro cum iure explicabo ipsum ullam, aut a voluptatem laborum repellat quae libero ipsam, aliquid aperiam. Repellendus.
        </div>
        <h2 class="rubik-font p-0 mt-4 mb-2 text-center">
            Destination
        </h2>
        <div class="d-flex  column-gap-5 row-gap-3 justify-content-center flex-wrap" style="width:100%;">
            <div class="position-relative mx-2">
                <video width="280" height="560" controls autoplay class="rounded-5">
                    <source src="videos/ibarbo-testing-video.mp4" type="video/mp4">
                </video>
                <div class="position-absolute z-index-5 d-block" style="top:350px;">
                    <h4>Funtown</h4>
                    <span>Menyenangkan</span>
                </div>
            </div>
            <div class="position-relative mx-2">
                <video width="280" height="560" controls autoplay class="rounded-5">
                    <source src="videos/ibarbo-testing-video.mp4" type="video/mp4">
                </video>
                <div class="position-absolute z-index-5 d-block" style="top:350px;">
                    <h4>Funtown</h4>
                    <span>Menyenangkan</span>
                </div>
            </div>
            <div class="position-relative mx-2">
                <video width="280" height="560" controls autoplay class="rounded-5">
                    <source src="videos/ibarbo-testing-video.mp4" type="video/mp4">
                </video>
                <div class="position-absolute z-index-5 d-block" style="top:350px;">
                    <h4>Funtown</h4>
                    <span>Menyenangkan</span>
                </div>
            </div>
        </div>
        <h2  class="rubik-font p-0 mt-4 mb-2 text-center">
            Promo
        </h2>
        <div class="d-flex justify-content-center flex-wrap column-gap-5 row-gap-3" style="width:100%;">
            <div>
                <img src="images/ibarbo.jpg" alt="" style="width:280px;">
                <h4></h4>
                <span></span>
            </div>
            <div>
                <img src="images/ibarbo.jpg" alt="" style="width:280px;">
                <h4></h4>
                <span></span>
            </div>
            <div>
                <img src="images/ibarbo.jpg" alt="" style="width:280px;">
                <h4></h4>
                <span></span>
            </div>
        </div>
    </div>

    <?php require('views/footer.php') ?>
    <script src="behavior.js "></script>
</body>

</html>