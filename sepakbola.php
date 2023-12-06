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
      href="https://fonts.googleapis.com/css2?family=McLaren&family=Montaga&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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
              Neuton: ["Neuton", "sans-serif"]
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
  <body>
    <?php include(ROOT_PATH . "/app/includes/headerreal-2.php"); ?>
    <main class="px-3 md:px-10 mb-10">
      <section class="my-5">
        <i class="fa-solid fa-house inline-block"></i>
        <p class="inline-block">Home</p>
        <i class="fa-solid fa-chevron-right inline-block"></i>
        <p class="inline-block">News</p>
      </section>
      <section class="w-full max-w-6xl text-center mx-auto px-4">
          <h1 class="text-4xl font-Montserrat font-extrabold mb-2">SEPAKBOLA SMKN 1 PEKALONGAN</h1>
          <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-user mr-2"></i>Admin</span>
          <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-calendar mr-2"></i>05/12/2023</span>
          <div class="w-full aspect-video my-4">
            <img src="assets/images/image_7.png" alt="" class="w-full aspect-video object-center object-cover">
          </div>
          <div class="text-justify text-xl font-normal space-y-4">
            <p>Yang dimaksudkan dengan Keahlian Akuntansi dalam hal ini terbatas pada cakupan keahlian sebagai Teknisi Akuntansi (Pembantu Akuntan) sesuai dengan rumusan Standar Kompetensi Kerja Nasional Indonesia (SKKNI) untuk bidang Teknisi Akuntansi. Bidang Teknisi Akuntansi meliputi dua jenjang yaitu Teknisi Akuntansi Pelaksana dan Teknisi Akuntansi Penyelia.</p>
            <p>Kompetensi keahlian Akuntansi yang dijabarkan dalam panduan ini mengacu pada kompetensi keahlian untuk jenjang Teknisi Akuntansi Pelaksana, yaitu dapat bekerja sesuai dengan prosedur dan dibawah bimbingan/pengawasan. Ditambah beberapa kompetensi penunjang yang relevan, setingkat dengan kemampuan Teknisi Akuntansi Penyelia yaitu dapat bekerja sesuai prosedur secara mandiri, serta bekerja dalam tim.</p>
            <h2 class="font-Montserrat font-bold">Visi Program Keahlian</h2>
            <p>Menjadi Sekolah unggul yang menghasilkan tamatan berjiwa wirausaha, berwawasan teknologi dan lingkungan berdasarkan Imtaq</p>
            <h2 class="font-Montserrat font-bold">Misi Program Keahlian</h2>
            <ol class="list-decimal list-inside">
              <li>Menanamkan keimanan dan ketaqwaan</li>
              <li>Menanamkan budi pekerti yang unggul</li>
              <li>Meningkatkan kompetensi dan profesionalisme guru dan karyawan.</li>
              <li>Mengupayakan pemenuhan kebutuhan sarana dan prasarana</li>
              <li>Meningkatkan pelayanan pendidikan dan pembelajaran</li>
              <li>Meningkatkan kompetensi dan keterampilan siswa dalam mengembangkan diri agar mampu mandiri dan peka terhadap lingkungan</li>
              <li>Mengembangkan Inovasi teknologi tepat guna yang ramah lingkungan.</li>
              <li>Menanamkan karakter kreatif, inovatif, produktif dan kompetitif.</li>
              <li>Membangun kerjasama dengan DU/DI, lembaga Diklat, dan instansi terkait</li>
              <li>Menciptakan lingkungan sekolah yang sehat, kondusif, dan demokratisi</li>
            </ol>
          </div>
      </section>
    </main>
    <footer class="bg-[#655740] flex items-center flex-col gap-10 md:gap-0 md:flex-row py-10 justify-between">
      <div class="flex items-center gap-5 md:gap-14 flex-col md:flex-row">
        <div class="flex gap-7 border-0 md:border md:border-r-2 md:border-y-0 md:border-l-0 md:border-r-white">
          <img class="w-[100px]" src="../assets/images/logo_sekolah.png" alt="Logo_SMKN1_Pekalongan" />
          <div class="inline-block flex flex-col justify-end">
            <h1 class="w-56 text-white text-lg font-extrabold font-['Montserrat'] uppercase leading-[23px] tracking-widest">SMKN 1 PEKALONGAN</h1>
            <p class="w-[185px] h-[38px] opacity-50 text-white text-xs font-semibold font-['Source Sans 3'] capitalize tracking-[5px]">SMK Bisa - Hebat</p>
          </div>
        </div>
        <div class="text-white font-Montaga flex flex-col gap-2">
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-map inline-block align-middle"></i>
            <p class="inline-block w-72 leading-4 tracking-wide">Jl. Bengkok No.29, Sidodadi, Kec. Pekalongan, Kabupaten Lampung Timur, Lampung 34381</p>
          </div>
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-phone"></i>
            <p class="inline-block">0721-8888-9999</p>
          </div>
        </div>
      </div>
      <div class="text-white flex flex-row gap-7">
        <a href="">
          <i class="fa-brands fa-square-facebook fa-2xl"></i>
        </a>
        <a href="">
          <i class="fa-brands fa-twitter fa-2xl"></i>
        </a>
        <a href="">
          <i class="fa-brands fa-instagram fa-2xl"></i>
        </a>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/hamburger.js"></script>
    <script src="assets/js/profil.js"></script>
    <script src="assets/js/swiper.js"></script>
  </body>
</html>
