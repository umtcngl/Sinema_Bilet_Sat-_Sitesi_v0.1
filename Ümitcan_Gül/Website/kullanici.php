<?php
session_start();
if($_POST){
    if (isset($_POST['cikis'])) {
        session_unset();
        session_destroy();
        header("Location: girisyap.php");
    }
}
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
/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
$servername="localhost";
$dbname="sinema_bilet";
$Name="root";
$Pass="";

$db=new PDO("mysql:host=$servername;dbname=$dbname;",$Name,$Pass);



if (isset($_SESSION['hesap']) && isset($_POST['hesap_sil'])) {
    $kullaniciAdi = $_SESSION['hesap'];


    $sorgu = $db->prepare("SELECT id FROM users WHERE kullaniciadi = :kullaniciadi");
    $sorgu->bindParam(':kullaniciadi', $kullaniciAdi);
    $sorgu->execute();


    $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);


    if ($sonuc) {
        $kullaniciID = $sonuc['id'];

        $silmeSorgusu = "DELETE FROM users WHERE id = :kullaniciID";

        try {
            $silmeSorgu = $db->prepare($silmeSorgusu);
            $silmeSorgu->bindParam(':kullaniciID', $kullaniciID, PDO::PARAM_INT);
            $silmeSorgu->execute();

            session_unset();
            session_destroy();
            header("Location: girisyap.php");
        } catch (PDOException $e) {
            echo "Hesap silme hatası: " . $e->getMessage();

            error_log("PDO Hata: " . $e->getMessage(), 0);
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Ana Sayfa</title>
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
<div class="containergiris">
    <div id="cikisdiv"class="cikisyap">
    <form action="" method="POST">

        <span style="font-size: 30px;color: white;">Hoş Geldin&nbsp;&nbsp;<span style="font-size: 30px; color: gold;">
            <?php echo isset($_SESSION['hesap']) ? $_SESSION['hesap'] : ''; ?>
        </span> !!!</span><br><br><br>

        <input type="submit" name="hesap_sil" class="formsubmit1" value="Hesabımı Sil !!!">

        <br><br><br>

        <input type="submit" class="formsubmit"value="Çıkış Yap"name="cikis" id="cikisyap">
        
        

    </form>
</div>
</div>
</body>
</html>