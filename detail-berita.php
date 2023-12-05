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
      <section class="flex flex-col md:flex-row gap-4">
        <!-- news detail -->
        <section class="w-full md:w-4/6">
          <h1 class="text-4xl font-Montserrat font-extrabold mb-2">Either give me more wine or leave me alone</h1>
          <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-user mr-2"></i>Admin</span>
          <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-calendar mr-2"></i>05/12/2023</span>
          <div class="w-full aspect-video my-4">
            <img src="assets/images/image_7.png" alt="" class="w-full aspect-video object-center object-cover">
          </div>
          <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus lorem non sem vulputate, ac eleifend nulla vulputate. Maecenas velit sem, ullamcorper ac libero at, ultrices elementum erat. Maecenas sit amet nunc eros. Nunc accumsan pellentesque lectus id ultricies. Curabitur et erat malesuada, tristique metus et, laoreet lacus. Suspendisse iaculis eget nibh nec egestas. Sed fermentum urna et est suscipit dignissim eu non diam. In ac vestibulum ipsum. Mauris porttitor finibus dui, in tincidunt ligula congue vitae. Etiam hendrerit lorem semper urna ultrices, sed maximus arcu finibus.</p>
            <p>Etiam vel iaculis velit. Pellentesque tempor turpis at urna dictum, id venenatis mauris lacinia. Curabitur ut tortor eget massa viverra dapibus. Praesent congue mauris porttitor tortor dictum, ac sollicitudin mauris lacinia. Aliquam dolor lorem, suscipit ut est eget, cursus imperdiet ex. Nunc vehicula, ex sed vulputate venenatis, est elit volutpat ante, sit amet tempus ante ex sed magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum sagittis mollis rutrum. Quisque lobortis, elit vitae vulputate consectetur, nisi nisi varius sapien, vitae feugiat urna arcu eu ante. Fusce orci ipsum, tempus vitae fringilla ac, efficitur id erat. Integer diam diam, suscipit ut massa eget, rhoncus ornare lorem. Pellentesque ac venenatis enim. Vivamus tempor sagittis lacinia.</p>
            <p>Nunc porta felis ligula, sed pretium felis mollis et. Sed sodales euismod velit, in euismod diam fermentum a. Quisque eu auctor nibh, ut semper enim. Vestibulum eget bibendum lorem, in vehicula ante. Curabitur vitae hendrerit diam. Sed ornare enim et nunc posuere, ut vulputate velit pretium. Etiam nec iaculis arcu, in fringilla risus. Nullam viverra libero sed urna varius, a pharetra ligula feugiat. Curabitur tempus interdum porttitor. Sed ac nunc sit amet leo interdum tincidunt. Maecenas aliquet, eros non sollicitudin cursus, magna metus posuere metus, vel pulvinar justo lacus at augue. Etiam egestas erat ac sodales tempor. Maecenas ex arcu, gravida vitae fermentum at, laoreet a risus.</p>
            <p>Donec rhoncus sed diam sit amet posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras hendrerit odio in risus lacinia, ac dictum quam finibus. Praesent ornare tincidunt consectetur. Etiam consequat dolor sapien, quis gravida orci tempor quis. Sed interdum viverra lorem, eget rhoncus eros suscipit sed. Suspendisse at dapibus massa, non elementum enim. Vestibulum et congue est, ac ullamcorper mauris. Nunc id orci aliquet ante bibendum fermentum eu molestie nulla. Maecenas molestie tincidunt urna nec lobortis.</p>
            <p>Aenean ut metus vitae nibh vulputate aliquam quis nec mauris. Donec tristique lobortis ante, vitae viverra urna pharetra eget. Nunc nec sem ultrices, convallis eros vitae, condimentum lacus. Nunc sed feugiat mi, ut tempus nibh. Vestibulum posuere ut magna nec bibendum. Aenean est mauris, suscipit sed interdum id, varius eu ex. Suspendisse potenti. Suspendisse vulputate augue vitae ante tincidunt tempus vulputate ut dui.</p>
          </div>
        </section>
        <!-- filter -->
        <section class="w-full md:w-2/6">
          <div class="flex flex-col rounded-lg shadow-md border border-2 p-2 mb-4">
            <h2 class="text-lg font-Montserrat font-bold border border-t-0 border-x-0 border-b-black w-full mb-3">Popular</h2>
            <!-- List Berita -->
            <div class="flex flex-col gap-3">
              <!-- Berita Satuan -->
              <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-3">
                <div class="aspect-square md:aspect-video w-1/4 rounded-md overflow-hidden">
                  <img src="assets/images/school_ground.png" alt="" class="w-full object-cover object-center">
                </div>
                <h2 class="text-md md:text-lg font-Montserrat font-bold">Either give me more wine or leave me alone</h2>
              </div>
              <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-3">
                <div class="aspect-square md:aspect-video w-1/4 rounded-md overflow-hidden">
                  <img src="assets/images/school_ground.png" alt="" class="w-full object-cover object-center">
                </div>
                <h2 class="text-md md:text-lg font-Montserrat font-bold">Either give me more wine or leave me alone</h2>
              </div>
            </div>
          </div>
          <div class="flex flex-col rounded-lg shadow-md border border-2 p-2">
            <h2 class="text-lg font-Montserrat font-bold border border-t-0 border-x-0 border-b-black w-full mb-3">Topics</h2>
            <div class="flex flex-col gap-2">
              <!-- Category Satuan -->
              <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-2 w-full">
                <a href="" class="block w-full">Life</a>
              </div>
              <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-2">
                <a href="" class="block w-full">Life</a>
              </div>
              <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-2">
                <a href="" class="block w-full">Life</a>
              </div>
            </div>
          </div>
        </section>
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
