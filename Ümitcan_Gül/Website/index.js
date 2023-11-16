const afisler = [
    "img/2.jpg",
    "img/3.jpg",
    "img/4.jpg",
    "img/5.jpg",
];

const basliklar = [
    "TESTERE X",
    "WHO AM I",
    "OPPENHEIMER",
    "THE BATMAN",
];

const aciklamalar = [
    "Testere 10, kendisini dolandıranlardan intikam almak için harekete geçen Jigsaw’un hikayesini konu ediyor. Kanser hastası olan John, bütün umudunu kaybetmiştir. Deneysel ve çok riskli bir ameliyat olmaya karar veren John, bunun için Meksika’ya doğru yola koyulur. Ancak onun hastalığını tedavi etmeye yönelik bu ameliyat tamamen düzmecedir. En savunmasız anında dolandırılan John, intikam almak için en iyi yaptığı işe geri döner. John, kendisini dolandıranları delice ve usta işi tuzaklarıyla sınamak için harekete geçer.",
    "Toplumla fazla bir ilişkisi bulunmayan genç bir hacker olan Benjamin (Tom Schilling), Max (Elyas M'Barek) adında bir başka hacker'la tanışır. Stephan ve Paul adlı yazılım ve donanım uzmanlarıyla birlikte CLAY adında bir hacker'lar grubu kurarlar. CLAY son derece yıkıcı faaliyetleriyle adını duyurmaktadır. Europol ve istihbarat teşkilatlarını peşine takan grup için işler yolunda gitse de onları hedefine alan karanlık bir hacker grubu, onlarla her yoldan rekabet etmeye çalışacaktır.",
    "Amerikalı fizikçi Julius Robert Oppenheimer'ın hayatına odaklanılan filmde, Julius Robert Oppenheimer’ın, İkinci Dünya Savaşı sırasında atom bombasının geliştirilme sürecindeki rolü gözler önüne seriliyor. New Mexico'daki Los Alamos Ulusal Laboratuvarında, o ve ekibi, uzun çalışmaların ardından bir nükleer silah geliştirmesinin ardından Oppenheimer 'atom bombasının babası' ilan edilir. Ancak ölümcül icadının Hiroşima ve Nagazaki'de kullanılacak olması, Oppenheimer'ın kendisini projeden uzaklaştırmasına neden olur. Savaş sona ermek üzereyken, Lewis Strauss'un ortak kurduğu ABD Atom Enerjisi Ajansı'nın danışmanı olan Robert Oppenheimer, nükleer enerjinin uluslararası kontrolüne ve nükleer silahlanma yarışına karşı olduğunu savunur ve bu nedenle ABD tarafından hedef haline gelir.",
    "The Batman, suçluların kalplerine korku salan Batman'in Riddler isimli bir seri katille mücadelesini konu ediyor. Batman olarak iki yıl sokaklarda dolaşmak ve suçlulara korku salmak Bruce Wayne'i Gotham City'nin karanlığının kalbine sürükledi. Gizemli bir seri katil Riddler, şehrin seçkinlerini hedef alıp bir dizi sadist ve hain saldırı gerçekleştirdiğinde Batman, Riddler'in izini sürmeye başlar. İpuçlarının peşinden giden Batman'in yolu bu süreçte Catwoman olarak bilinen Selina Kyle, Penguen olarak da bilinen Oswald Cobblepot ve Carmine Falcone gibi karakterlerle kesişir. Batman kurduğu yeni ilişkilerin de yardımıyla suçluların maskesini düşürmek ve Gotham Şehri’ni eski huzuruna kavuşturmak için zorlu bir mücadeleye girişir.",
];

const afisElement = document.querySelector(".afis");
const baslikElement = document.querySelector(".baslik");
const aciklamaElement = document.querySelector(".aciklama");
const solOk = document.querySelector(".soldüzenle");
const sagOk = document.querySelector(".sagdüzenle");

let currentIndex = 0;
let intervalID;

function gosterAfişi(index) {
    afisElement.src = afisler[index];
    baslikElement.textContent = basliklar[index];
    aciklamaElement.textContent = aciklamalar[index];
}

solOk.addEventListener("click", function() {
    currentIndex = (currentIndex - 1 + afisler.length) % afisler.length;
    gosterAfişi(currentIndex);
    sifirlaZamani();
});

sagOk.addEventListener("click", function() {
    currentIndex = (currentIndex + 1) % afisler.length;
    gosterAfişi(currentIndex);
    sifirlaZamani();
});

function otomatikAfişDegisimi() {
    currentIndex = (currentIndex + 1) % afisler.length;
    gosterAfişi(currentIndex);
}

function sifirlaZamani() {
    clearInterval(intervalID);
    intervalID = setInterval(otomatikAfişDegisimi, 10000);
}

gosterAfişi(currentIndex);

intervalID = setInterval(otomatikAfişDegisimi, 10000);
