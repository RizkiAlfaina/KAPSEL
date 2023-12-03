<?php 
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
  $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
  $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
  $posts = searchPosts($_POST['search-term']);
} else {
  $posts = getPublishedPosts();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMKN1 PEKALONGAN</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts (Montaga, Montserrat, Source Sans 3) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montaga&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Swipe JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Tailwind Config -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {},
            fontFamily: {
              Montserrat: ["Montserrat", "sans-serif"],
              SourceSans: ["Source+Sans+3", "sans-serif"],
              Montaga: ["Montaga", "sans-serif"],
            },
          },
        },
      };
    </script>

    <style type="text/tailwindcss">
      @layer utilities {
        .hamburger-line {
          @apply w-[30px] h-[2px] my-2 block bg-white;
        }

        .hamburger-active > span:nth-child(1) {
          @apply rotate-45;
        }

        .hamburger-active > span:nth-child(2) {
          @apply scale-0;
        }

        .hamburger-active > span:nth-child(3) {
          @apply -rotate-45;
        }

        .swiper-slide-active {
          @apply scale-125;
        }
      }
    </style>
  </head>
  <body class="overflow-x-hidden">
  <?php include(ROOT_PATH . "/app/includes/headerreal.php"); ?>
    <!-- Slider main container -->
    <section class="hero-swiper relative">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="assets/images/carousel_1.jpeg" alt="" class="w-full brightness-50" /></div>
        <div class="swiper-slide"><img src="assets/images/carousel_2.jpeg" alt="" class="w-full brightness-50" /></div>
        <div class="swiper-slide"><img src="assets/images/carousel_3.jpeg" alt="" class="w-full brightness-50" /></div>
      </div>
      <h1 class="w-full text-center text-neutral-50 text-lg md:text-4xl xl:text-6xl font-extrabold font-Montserrat tracking-widest absolute z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        SELAMAT DATANG DI<br />SMK NEGERI 1 PEKALONGAN
      </h1>
    </section>
    <main>
      <section class="flex flex-col gap-5 w-full px-10 py-10 md:flex-row md:justify-around">
        <img src="assets/images/foto_kepsek.png" alt="" class="w-full md:w-1/3" />
        <div class="w-full md:w-1/2 flex flex-col justify-center gap-3">
          <h1 class="text-black text-[50px] font-extrabold font-Montserrat leading-none">JUDUL SAMBUTAN</h1>
          <h2 class="text-black text-[27px] font-semibold font-SourceSans">Drs. Suyanto S.pd., M.pd.</h2>
          <p class="max-w-2xl break-all">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat null....
          </p>
          <a href="" class="bg-[#655740] rounded-md w-fit px-4 py-3 text-white font-SourceSans text-sm">Lihat Selengkapnya</a>
        </div>
      </section>
      <!-- Swiper -->
      <!-- <section class="swiper news-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide rounded-2xl overflow-hidden">
            <div class="relative w-full">
              <img src="assets/images/akutansi.jpg" alt="" class="w-full bg-cover" />
              <div class="absolute bottom-0 w-full text-white text-center">
                <h2 class="font-SourceSans font-bold text-white text-3xl w-2/3 mx-auto">JUARA 1 LOMBA VOLI TINGKAT NASIONAL</h2>
                <p class="font-SourceSans text-white text-base">DI IKUTI OLEH 300 TEAM DARI SELURUH INDONESIA DAN BLABALABALABALA....</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide rounded-2xl overflow-hidden">
            <div class="relative w-full">
              <img src="assets/images/akutansi.jpg" alt="" class="w-full bg-cover" />
              <div class="absolute bottom-0 w-full text-white text-center">
                <h2 class="font-SourceSans font-bold text-white text-3xl w-2/3 mx-auto">JUARA 1 LOMBA VOLI TINGKAT NASIONAL</h2>
                <p class="font-SourceSans text-white text-base">DI IKUTI OLEH 300 TEAM DARI SELURUH INDONESIA DAN BLABALABALABALA....</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide rounded-2xl overflow-hidden">
            <div class="relative w-full">
              <img src="assets/images/akutansi.jpg" alt="" class="w-full bg-cover" />
              <div class="absolute bottom-0 w-full text-white text-center">
                <h2 class="font-SourceSans font-bold text-white text-3xl w-2/3 mx-auto">JUARA 1 LOMBA VOLI TINGKAT NASIONAL</h2>
                <p class="font-SourceSans text-white text-base">DI IKUTI OLEH 300 TEAM DARI SELURUH INDONESIA DAN BLABALABALABALA....</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide rounded-2xl overflow-hidden">
            <div class="relative w-full">
              <img src="assets/images/akutansi.jpg" alt="" class="w-full bg-cover" />
              <div class="absolute bottom-0 w-full text-white text-center">
                <h2 class="font-SourceSans font-bold text-white text-3xl w-2/3 mx-auto">JUARA 1 LOMBA VOLI TINGKAT NASIONAL</h2>
                <p class="font-SourceSans text-white text-base">DI IKUTI OLEH 300 TEAM DARI SELURUH INDONESIA DAN BLABALABALABALA....</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide rounded-2xl overflow-hidden">
            <div class="relative w-full">
              <img src="assets/images/akutansi.jpg" alt="" class="w-full bg-cover" />
              <div class="absolute bottom-0 w-full text-white text-center">
                <h2 class="font-SourceSans font-bold text-white text-3xl w-2/3 mx-auto">JUARA 1 LOMBA VOLI TINGKAT NASIONAL</h2>
                <p class="font-SourceSans text-white text-base">DI IKUTI OLEH 300 TEAM DARI SELURUH INDONESIA DAN BLABALABALABALA....</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide rounded-2xl overflow-hidden">
            <div class="relative w-full">
              <img src="assets/images/akutansi.jpg" alt="" class="w-full bg-cover" />
              <div class="absolute bottom-0 w-full text-white text-center">
                <h2 class="font-SourceSans font-bold text-white text-3xl w-2/3 mx-auto">JUARA 1 LOMBA VOLI TINGKAT NASIONAL</h2>
                <p class="font-SourceSans text-white text-base">DI IKUTI OLEH 300 TEAM DARI SELURUH INDONESIA DAN BLABALABALABALA....</p>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next text-gray-600 font-extrabold"></div>
        <div class="swiper-button-prev text-gray-600 font-extrabold"></div>
      </section> -->
      <section class="flex flex-col-reverse md:flex-row gap-9 md:gap-0">
        <div class="basis-1/2 text-center px-10 flex flex-col justify-center gap-9">
          <h2 class="text-black text-4xl md:text-6xl font-extrabold font-Montserrat uppercase tracking-widest w-full">SEJARAH</h2>
          <p class="text-justify text-black text-xl font-normal font-SourceSans tracking-widest">
            Jadi dulu sekolah ini dulu bekas rumah sakit dan bla bla blaa... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        <div class="basis-1/2">
          <img class="w-full" src="assets/images/school_ground.png" alt="" />
        </div>
      </section>
      <section class="flex flex-col md:flex-row items-center md:justify-center gap-14 pt-32 pb-56 px-10">
        <div class="rounded-2xl bg-[#C8AE7D] pt-16 pb-28 px-6 basis-1/2">
          <h2 class="text-black text-6xl font-extrabold font-Montserrat tracking-widest indent-4 mb-3">VISI</h2>
          <ul class="flex flex-col gap-5 mb-8">
            <li class="flex items-center gap-3">
              <i class="fa-solid fa-square-check"></i>
              <p class="align-middle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et</p>
            </li>
            <li class="flex items-center gap-3">
              <i class="fa-solid fa-square-check"></i>
              <p class="align-middle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et</p>
            </li>
            <li class="flex items-center gap-3">
              <i class="fa-solid fa-square-check"></i>
              <p class="align-middle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et</p>
            </li>
          </ul>
          <a href="" class="bg-[#655740] text-white rounded px-4 py-2 ml-4">Lihat Selengkapnya</a>
        </div>
        <div class="rounded-2xl bg-[#C8AE7D] pt-16 pb-28 px-10 basis-1/2">
          <h2 class="text-black text-6xl font-extrabold font-Montserrat mb-3">MISI</h2>
          <p class="mb-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
            aute irure dolor in....
          </p>
          <a href="" class="bg-[#655740] text-white rounded px-4 py-2">Lihat Selengkapnya</a>
        </div>
      </section>
      <h1 class="text-black text-[50px] font-extrabold font-Montserrat leading-none text-center mb-10">Kontak</h1>
      <section class="flex flex-col px-10 gap-10 mb-10 md:flex-row">
        <div class="md:basis-1/2">
          <h2 class="text-black text-base font-extrabold font-Montserrat leading-none mb-5">Denah Lokasi</h2>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.0808417355115!2d105.38226667466063!3d-5.090629651618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40bd98278dab71%3A0xf91f97bb6d307b7f!2sSMKN%201%20Pekalongan!5e0!3m2!1sen!2sid!4v1701234211542!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full rounded-xl overflow-hidden"></iframe>
        </div>
        <div class="flex gap-3 flex-col md:basis-1/2">
          <h2 class="text-black text-base font-extrabold font-Montserrat leading-none" id="kontak">Kontak</h2>
          <div>
            <i class="fa-solid fa-envelope inline-block"></i>
            <p class="inline-block">smkn1@blablabla.sch.id</p>
          </div>
          <div>
            <i class="fa-solid fa-map-pin inline-block"></i>
            <p class="inline-block whitespace-normal">Jl. Bengkok No.29, Sidodadi, Kec. Pekalongan, Kabupaten Lampung Timur, Lampung 34381</p>
          </div>
          <div>
            <i class="fa-brands fa-whatsapp"></i>
            <p></p>
          </div>
          <div>
            <i class="fa-brands fa-facebook"></i>
            <p></p>
          </div>
          <div>
            <i class="fa-brands fa-instagram"></i>
            <p></p>
          </div>
        </div>
      </section>
    </main>
    <?php include(ROOT_PATH . "/app/includes/footerreal.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/hamburger.js"></script>
    <script src="assets/js/swiper.js"></script>
  </body>
</html>
