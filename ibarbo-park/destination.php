<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination | IBARBO</title>
    <link rel="icon" href="images/logo-ibarbo.png" type="image/x-icon">
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
    <?php require('views/header.php');
    require_once('../server/koneksi.php');
    $pilUmum = $_GET['destinasi'];
    if ($pilUmum == 'semua') {
        $queryUmum = "SELECT kode, nama, deskripsi FROM desdes";
        $resultUmum = mysqli_query($connect, $queryUmum);
        $result = mysqli_fetch_all($resultUmum, MYSQLI_ASSOC);
        foreach ($result as $key => $value) {
            echo "Kunci: " . $key . "<br>";
            echo "Nilai: ";
          
            if (is_array($value)) {
              echo "Array<br>";
              foreach ($value as $key_array => $value_array) {
                if ($value_array % 2 == 1){
                    echo "Kiri <br>";
                }
                //   echo "   Kunci: " . $key_array . ", Nilai: " . $value_array . "<br>";
              }
            } elseif (is_bool($value)) {
            //   echo ($value ? "true" : "false") . "<br>";
            } else {
            //   echo $value . "<br>";
            }
          }
    }
    ?>
    <div class="bg-content-c d-flex flex-wrap text-warna-primary" style="width:100%;">
                        <div class="d-flex justify-content-center align-items-center p-5" style="width:50%;">
                            <img src="images/about.jpg" alt="" style="width:75%;transform:rotate(356deg)" class="shadow-lg rounded-4">
                        </div>
                        <div class="d-block justify-content-center align-items-center" style="width:50%;">
                            <div class="d-block justify-content-center align-items-center px-5 py-5">
                                <h4 class="d-flex justify-content-center align-items-center px-5 py-3">
                                    <?= $value['nama'] ?>
                                </h4>
                                <p class="d-flex justify-content-center align-items-center px-5 py-5"><?= $value['deskripsi'] ?></p>
                                <div class="px-4">
                                    <input type="checkbox" class="btn-check" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="btn btn-outline-primary px-3 py-3 bg-orange text-kuning rounded-3 font-16" for="flexCheckDefault">
                                        Selengkapnya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-block justify-content-center align-items-center" style="width:50%;">
                        <div class="d-block justify-content-center align-items-center px-5 py-5">
                            <h4 class="d-flex justify-content-center align-items-center px-5 py-3">
                                lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </h4>
                            <p class="d-flex justify-content-center align-items-center px-5 py-5">Quisquam, voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus</p>
                            <div class="px-4">
                                <input type="checkbox" class="btn-check" type="checkbox" value="" id="flexCheckDefault">
                                <label class="btn btn-outline-primary px-3 py-3 bg-orange text-kuning rounded-3 font-16" for="flexCheckDefault">
                                    Selengkapnya
                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center p-5" style="width:50%;">
                            <img src="images/about.jpg" alt="" style="width:75%;transform:rotate(356deg)" class="shadow-lg rounded-4">
                        </div>
                        </div>                    
                        <?php require('views/footer.php') ?>
                        <script src="behavior.js "></script>
</body>

</html>