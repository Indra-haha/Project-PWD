<?php
require_once('../server/koneksi.php');
$query = "SELECT kode, nama FROM desdes";
$result = mysqli_query($connect, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}
$getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="d-flex bg-bar-c rubik-font position-sticky top-0 shadow-lg header z-index-99 fw-bold">
    <div class="d-flex justify-content-between align-items-center mx-5 font-20" style="width: 85%;">
        <img src="images/logo-ibarbo.png" alt="logo" class="m-2" style="width:70px;">
        <div class="d-flex m-0 p-0">
            <ul class="nav justify-content-center align-items-center py-2 m-0">
                <li class="mx-4">
                    <a href="index.php" class="text-decoration-none text-uppercase">Home</a>
                </li>
                <li class="mx-4">
                    <a href="about.php" class="text-decoration-none text-uppercase">About</a>
                </li>
                <li id="destinasi-box" class="mx-3 d-flex align-items-baseline">
                    <a href="destination.php" class="text-decoration-none text-uppercase">Destination</a>
                    <div id="destinasi-arrow" class="mx-1 arrow-bot rounded-2"></div>
                    <!-- menu destinasi -->
                    <div id="destinasi-detail" class="invisible position-absolute my-4">
                        <div id="arrow1" class="arrow-top"></div>
                        <ul class="nav d-block p-0 m-0 box-c d-block">
                            <?php
                            foreach ($getData as $row => $value) {
                            ?>
                            <li id="sub-menu-des" class="p-2 px-3">
                                <a href="detail.php?detail=<?= htmlspecialchars($value['kode']) ?>" class="text-decoration-none"><?= htmlspecialchars($value['nama']) ?></a>
                            </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                </li>
                <li id="tiket-box" class="mx-3 d-flex align-items-baseline">
                    <a href="ticket.php" class="text-decoration-none text-uppercase">Ticket</a>
                    <div id="tiket-arrow" class="mx-1 arrow-bot rounded-2"></div>
                    <!-- menu tiket -->
                    <div id="tiket-detail" class="invisible position-absolute my-4">
                        <div id="arrow2" class="arrow-top"></div>
                        <ul class="nav d-block p-0 m-0 box-c d-block">
                            <?php
                            $query = "SELECT id FROM tiket";
                            $result = mysqli_query($connect, $query);
                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }
                            $getTiket = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach ($getTiket as $value) {
                            ?>
                            <li id="sub-menu-tik" class="p-2 px-3">
                                <a href="ticket.php?tiket=<?= htmlspecialchars($value['id']) ?>" class="text-decoration-none"><?= htmlspecialchars($value['id']) ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <a id="login" href="loginUser.php" class="bg-kuning px-3 p-3 m-0 font-20 border-0 text-uppercase text-center text-decoration-none text-orange rubik-font" style="font-weight: 700;width:15%;">Login</a>
</div>
<script>
    const login = document.getElementById('login');
    const destinasiBox = document.getElementById('destinasi-box');
    const destinasiArrow = document.getElementById('destinasi-arrow');
    const destinasiDetail = document.getElementById('destinasi-detail');
    const tiketBox = document.getElementById('tiket-box');
    const tiketArrow = document.getElementById('tiket-arrow');
    const tiketDetail = document.getElementById('tiket-detail');
    const arrowDestinasi = document.getElementById('arrow1');
    const hoverDestinasi = document.getElementById('sub-menu-des');
    const arrowTiket = document.getElementById('arrow2');
    const hoverTiket = document.getElementById('sub-menu-tik');
    login.addEventListener('mouseover', () => {
        login.classList.remove('bg-kuning');
        login.classList.add('bg-orange');
        login.classList.remove('text-orange');
        login.classList.add('text-kuning');
    });
    login.addEventListener('mouseout', () => {
        login.classList.remove('bg-orange');
        login.classList.add('bg-kuning');
        login.classList.remove('text-kuning');
        login.classList.add('text-orange');
    });
    destinasiBox.addEventListener('mouseover', () => {
        destinasiArrow.classList.add('invisible');
        destinasiDetail.classList.remove('invisible');
        destinasiDetail.classList.add('visible');
    });
    destinasiBox.addEventListener('mouseout', () => {
        destinasiArrow.classList.remove('invisible');
        destinasiDetail.classList.remove('visible');
        destinasiDetail.classList.add('invisible');
    });
    tiketBox.addEventListener('mouseover', () => {
        tiketArrow.classList.add('invisible');
        tiketDetail.classList.remove('invisible');
        tiketDetail.classList.add('visible');
    });
    tiketBox.addEventListener('mouseout', () => {
        tiketArrow.classList.remove('invisible');
        tiketDetail.classList.remove('visible');
        tiketDetail.classList.add('invisible');
    });
    hoverDestinasi.addEventListener('mouseover', () => {
        arrowDestinasi.classList.remove('arrow-top');
        arrowDestinasi.classList.add('arrow-top-hover');
    });
    hoverDestinasi.addEventListener('mouseout', () => {
        arrowDestinasi.classList.remove('arrow-top-hover');
        arrowDestinasi.classList.add('arrow-top');
    });
    hoverTiket.addEventListener('mouseover', () => {
        arrowTiket.classList.remove('arrow-top');
        arrowTiket.classList.add('arrow-top-hover');
    });
    hoverTiket.addEventListener('mouseout', () => {
        arrowTiket.classList.remove('arrow-top-hover');
        arrowTiket.classList.add('arrow-top');
    });
</script>
