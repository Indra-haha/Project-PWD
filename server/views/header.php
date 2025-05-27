<div class="position-sticky d-flex justify-content-center align-items-center rubik-font bg-content-c p-0" style="width:100%;top:0;z-index:1000;">
    <div class="d-flex justify-content-start align-items-center d-flex p-0 mx-5" style="width:100%;">
        <img src="../ibarbo-park/images/logo-ibarbo.png" alt="logo" class="p-2 m-0" style="width:80px;">
    </div>
    <div class="d-flex align-items-center p-0" style="width:300px;">
        <div class="d-flex align-items-baseline justify-content-end" style="width:100%;">
            <div class="text-warna-primary fw-bold text-uppercase font-20 mx-5">
                <?= $_SESSION['nama'] ?>
            </div>
            <div class="text-warna-primary fw-semibold text-uppercase font-15">
                <?= $_SESSION['role'] ?>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mx-5">
        <a href="../server/logout.php" class="admin text-decoration-none px-3 py-2 rounded-2 fw-semibold">Logout</a>
    </div>
</div>
<div class="position-fixed d-flex flex-row bg-orange" style="z-index:1000;border-radius:0 0 10px 0;">
    <a href="index.php" class="p-3 text-decoration-none fw-semibold text-light">Destinasi</a>
    <a href="destinationDetailAdmin.php" class="p-3 text-decoration-none fw-semibold text-light">Destinasi Detail</a>
    <a href="tiketAdmin.php" class="p-3 text-decoration-none fw-semibold text-light">Tiket</a>
    <a href="fasilitasUmumAdmin.php" class="p-3 text-decoration-none fw-semibold text-light">Fasilitas Umum</a>
    <a href="fasilitasComboAdmin.php" class="p-3 text-decoration-none fw-semibold text-light">Fasilitas Combo</a>
</div>