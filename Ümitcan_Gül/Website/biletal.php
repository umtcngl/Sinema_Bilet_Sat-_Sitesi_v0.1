<?php
session_start();
if(isset($_SESSION['hesap'])) {
    // Yönlendirme için hedef URL
    $hedefURL = "kullanici.php";
    $baglantiMetni = $_SESSION['hesap'];
    $baglantiIkon = "fas fa-user";
}
else{
    $baglantiMetni = "GİRİŞ YAP";
    $baglantiIkon = "fas fa-sign-in-alt";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bilet Al</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<!-- MENU -->
<header class="header">
        <div class="btn1"><a href="index.php"><i class="fas fa-home"></i>ANA SAYFA</a></div>
        <div class="btn1"><a href="biletal.php"><i class="fas fa-film"></i>BİLET AL</a></div>
        <div class="btn1"><a href="iletisim.php"><i class="fas fa-address-card"></i>HAKKIMIZDA</a></div>
        <div class="btn1"><a href="<?php echo isset($_SESSION['hesap']) ? $hedefURL : 'girisyap.php'; ?>">
        <i class="<?php echo $baglantiIkon; ?>"></i>
        <span class="girisyapyazisindex"><?php echo $baglantiMetni; ?></span></a>
        </div>
</header>
<!-- MENU SONU -->
    <div class="ortala">
        <div class="screen"></div>
    </div>

    <div class="container1">
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat "></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat reserved"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat reserved"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="sira">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
    </div>

    <div class="movie-list ortala">
        <select id="movie" class="ozellestirilmis-select ozellestirilmis-option">
            <option class="ozellestirilmis-option" disabled>Film Seçiniz</option>
            <option class="ozellestirilmis-option" value="90">JİGSAW X&nbsp;&nbsp;&nbsp;(90TL)</option>
            <option class="ozellestirilmis-option" value="80">WHO AM I&nbsp;&nbsp;&nbsp;(80TL)</option>
            <option class="ozellestirilmis-option" value="70">OPPENHEIMER&nbsp;&nbsp;&nbsp;(70TL)</option>
            <option class="ozellestirilmis-option" value="60">BATMAN&nbsp;&nbsp;&nbsp;(60TL)</option>
        </select>
    </div>

    <ul class="info">
        <li>
            <div class="seat selected"></div>
            <small>Seçili</small>
        </li>
        <li>
            <div class="seat"></div>
            <small>Boş</small>
        </li>
        <li>
            <div class="seat reserved"></div>
            <small>Dolu</small>
        </li>
    </ul>


    <p class="ortala text">
        <span id="count">0</span>&nbsp;Adet Koltuk İçin Hesaplanan Ücret &nbsp;<span id="amount">0</span> &nbsp;TL
    </p>
    <script src="biletal.js"></script>
</body>
</html>