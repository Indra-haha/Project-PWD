<header class="d-flex bg-bar-c rubik-font position-sticky top-0 shadow-lg">
    <div class="d-flex justify-content-between align-items-center mx-5 font-20" style="width: 85%;">
        <img src="images/logo-ibarbo.png" alt="logo" class="m-2">
        <div class="d-flex m-0 p-0">
            <ul class="nav justify-content-center align-items-center py-2 m-0">
                <li class="mx-4">
                    <a href="index.php" class="text-decoration-none text-uppercase">Home</a>
                </li>
                <li class="mx-4">
                    <a href="about.php" class="text-decoration-none text-uppercase">About</a>
                </li>
                <li id="destinasi-box" class="mx-3 d-flex align-items-baseline">
                    <a href="destination.php?destinasi=semua" class="text-decoration-none text-uppercase">Destination</a>
                    <div id="destinasi-arrow" class="mx-1 arrow-bot rounded-2"></div>
                    <!-- menu destinasi -->
                    <div id="destinasi-detail" class="invisible position-absolute my-4">
                        <div id="arrow1" class="arrow-top"></div>
                        <ul class="nav d-block p-0 m-0 box-c d-block">
                            <li id="sub-menu-des" class="p-2 px-3">
                                <a href="?destination=aviary" class="text-decoration-none">AVIARY PARK</a>
                            </li>
                            <li class="p-2 px-3">
                                <a href="?destination=funtown" class="text-decoration-none">FUNTOWN</a>
                            </li>
                            <li class="p-2 px-3">
                                <a href="?destination=spashworld" class="text-decoration-none">SPLASHWORLD</a>
                            </li>
                            <li class="p-2 px-3">
                                <a href="?destination=souvenir" class="text-decoration-none">SOUVENIR CENTER</a>
                            </li>
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
                            <li id="sub-menu-tik" class="p-2 px-3">
                                <a href="tiket?=regular" class="text-decoration-none">REGULAR</a>
                            </li>
                            <li class="p-2 px-3">
                                <a href="tiket?=combo" class="text-decoration-none">COMBO</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <a href="loginUser.php" class="bg-kuning px-3 p-3 m-0 font-20 border-0 text-uppercase text-center text-decoration-none text-orange rubik-font" style="font-weight: 700;width:15%;">Login</a>
</header>