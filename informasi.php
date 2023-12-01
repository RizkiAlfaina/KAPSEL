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
  <body>
    <header class="xl:absolute xl:z-50 w-full bg-[#655740] xl:bg-transparent flex flex-col box-border xl:flex-row xl:justify-between xl:items-center xl:px-[69px]">
      <div class="flex justify-between px-3 py-6 items-center" id="top-bar">
        <a href="" class="inline-block flex items-center gap-3">
          <img class="w-[75px] xl:w-[100px] inline-block" src="assets/images/logo_sekolah.png" alt="" />
          <div class="inline-block">
            <h1 class="w-56 text-white text-lg font-extrabold font-Montserrat w-fit tracking-widest">SMKN 1</h1>
            <h1 class="w-56 text-white text-lg font-extrabold font-Montserrat w-fit tracking-widest">PEKALONGAN</h1>
            <p class="opacity-50 text-white text-xs font-semibold font-SourceSans w-fit tracking-[5px]">SMK Bisa - Hebat</p>
          </div>
        </a>
        <button id="hamburger" name="hamburger" type="button" class="inline-block p-2 xl:hidden">
          <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
          <span class="hamburger-line transition duration-300 ease-in-out"></span>
          <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
        </button>
      </div>
      <nav class="flex flex-col px-4 justify-center gap-5 my-5 hidden xl:flex xl:flex-row xl:gap-11 xl:justify-normal xl:px-0" id="nav-menu">
        <a href="" class="text-white font-Montserrat text-xl">PROFIL</a>
        <a href="" class="text-white font-Montserrat text-xl">INFORMASI</a>
        <a href="" class="text-white font-Montserrat text-xl">KEJURUAN</a>
        <a href="" class="text-white font-Montserrat text-xl">EKSTRAKURIKULER</a>
        <a href="" class="text-white font-Montserrat text-xl">KONTAK</a>
      </nav>
      <a href="" class="text-white font-Montserrat text-xl px-4 font-bold mb-5 hidden xl:block xl:mb-0" id="login">LOG IN</a>
    </header>
    <!-- Slider main container -->
    <section class="hero-swiper relative">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="assets/images/carousel_1.jpeg" alt="" class="w-full brightness-50" /></div>
        <div class="swiper-slide"><img src="assets/images/carousel_2.jpeg" alt="" class="w-full brightness-50" /></div>
        <div class="swiper-slide"><img src="assets/images/carousel_3.jpeg" alt="" class="w-full brightness-50" /></div>
      </div>
      <div class="absolute z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full">
        <h1 class="w-full text-center text-neutral-50 text-lg md:text-4xl xl:text-6xl font-extrabold font-Montserrat tracking-widest mb-5">PUSAT INFORMASI</h1>
        <form action="informasi.php" method="post" class="w-[63%] mx-auto relative">
          <input type="text" name="search-term" placeholder="Apa yang ingin anda cari?" class="w-full rounded-full p-5 box-border text-input" />
          <input type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 px-4 py-3 rounded-full bg-[#DFB86B]" />
        </form>
      </div>
    </section>
    <main class="px-10">
      <section class="my-5">
        <i class="fa-solid fa-house inline-block"></i>
        <p class="inline-block">Home</p>
        <i class="fa-solid fa-chevron-right inline-block"></i>
        <p class="inline-block">News</p>
      </section>
      <div class="flex flex-col-reverse py-3 md:flex-row gap-6">
        <!-- Filter -->
        <section class="bg-[#C6B7A3] px-[30px] py-5 flex flex-col gap-3 md:w-1/3 h-fit">
          <div>
            <h2 class="text-black text-[32px] font-bold font-Montserrat tracking-widest underline underline-offset-8 mb-3">CATEGORY</h2>
            <ul class="text-black text-base font-normal font-SourceSans capitalize tracking-widest pl-4">
              <?php foreach ($topics as $key => $topic): ?>
                <li class="border border-b-[1px] border-x-0 border-t-0 border-black border-dashed pb-2"><a href="<?php echo BASE_URL . '/informasi.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div>
            <h2 class="text-black text-[32px] font-bold font-Montserrat tracking-widest underline underline-offset-8 mb-3">Archives</h2>
            <ul class="text-black text-base font-normal font-SourceSans capitalize tracking-widest pl-4">
              <li class="border border-b-[1px] border-x-0 border-t-0 border-black border-dashed pb-2">Des 2023</li>
              <li class="border border-b-[1px] border-x-0 border-t-0 border-black border-dashed pb-2">Nov 2023</li>
            </ul>
          </div>
          <div>
            <h2 class="text-black text-[32px] font-bold font-Montserrat tracking-widest underline underline-offset-8 mb-3">Follow Us</h2>
          </div>
        </section>

        <!-- News List -->
        <section class="md:w-2/3 post-list">
          <!-- News Piece -->
          <?php foreach ($posts as $post): ?>
            <div class="mb-4">
              <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="w-full" />
              <div>
                <h2 class="text-black text-[32px] font-bold font-Montserrat tracking-widest"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                <div class="flex flex-wrap gap-2">
                  <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-user mr-2"></i><?php echo $post['username']; ?></span>
                  <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-calendar mr-2"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                </div>
              </div>
              <div>
                <p class="text-black font-normal font-SourceSans tracking-wide mb-2">
                  <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                </p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg">Lihat Selengkapnya</a>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- <div class="pagination-links" style="display: flex; justify-content: center;">
            <button type="button" class="btn read-more load-more-btn">Load more</button>
          </div> -->
          <!-- News Piece -->

        </section>
      </div>
    </main>
    <footer class="bg-[#655740] flex items-center flex-col gap-10 md:gap-0 md:flex-row py-10 justify-between">
      <div class="flex items-center gap-5 md:gap-14 flex-col md:flex-row">
        <div class="flex gap-7 border-0 md:border md:border-r-2 md:border-y-0 md:border-l-0 md:border-r-white">
          <img class="w-[100px]" src="assets/images/logo_sekolah.png" alt="Logo_SMKN1_Pekalongan" />
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
    <script src="assets/js/swiper.js"></script>
    <!-- <script>
      const loadMoreBtn = document.querySelector('.load-more-btn');
      const postList = document.querySelector('.post-list');
      const paginationLinks = document.querySelector('.pagination-links'); 
      
      function displayPosts(posts) {
        posts.forEach(post => {
          let postHtmlString =`
            <div class="mb-4">
              <img src="${post.image}" alt="" class="w-full" />
              <div>
                <h2 class="text-black text-[32px] font-bold font-Montserrat tracking-widest"><a href="single.php?id=${post.id}">${post.title}</a></h2>
                <div class="flex flex-wrap gap-2">
                  <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-user mr-2"></i>${post.username}</span>
                  <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-calendar mr-2"></i>${post.created_at}</span>
                </div>
              </div>
              <div>
                <p class="text-black font-normal font-SourceSans tracking-wide mb-2">
                  ${post.body}
                </p>
                <a href="single.php?id=${post.id}" class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg">Lihat Selengkapnya</a>
              </div>
            </div>
          `;
          
          const domParser = new DOMParser();
          const doc = domParser.parseFromString(postHtmlString, 'text/html');
          const postNode = doc.body.firstChild;
          postList.appendChild(postNode);
        });
      }

      let nextPage = 2;

      loadMoreBtn.addEventListener('click', async function(e) {
        loadMoreBtn.textContent = 'Loading...';
        const response = await fetch(`informasi.php?page=${nextPage}&ajax=1`);
        const data = await response.json();
        displayPosts(data.posts);
        nextPage = data.nextPage;
        if (!data.nextPage) {
          paginationLinks.innerHTML = '<div style="color: gray;">No more posts!</div>';
        } else {
          loadMoreBtn.textContent = 'Load more';        
        }
      });
    </script> -->
  </body>
</html>
