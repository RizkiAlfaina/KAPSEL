<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
$posts1 = selectPopular('posts');

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

  <title><?php echo $post['title']; ?> | SMKN 1 PEKALONGAN LAMTIM</title>

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
          <h1 class="text-4xl font-Montserrat font-extrabold mb-2"><?php echo $post['title']; ?></h1>
          <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-user mr-2"></i><?php echo $post['user_id']; ?></span>
          <span class="bg-[#D9D9D9] font-Montserrat px-2 py-1 rounded-lg"><i class="fa-regular fa-calendar mr-2"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
          <div class="w-full aspect-video my-4">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="w-full aspect-video object-center object-cover">
          </div>
          <div class="text-xl font-normal">
          <?php echo html_entity_decode($post['body']); ?></div>
        </section>
        <!-- filter -->
        <section class="w-full md:w-2/6">
          <div class="flex flex-col rounded-lg shadow-md border border-2 p-2 mb-4">
            <h2 class="text-lg font-Montserrat font-bold border border-t-0 border-x-0 border-b-black w-full mb-3">Popular</h2>
            <!-- List Berita -->
            <div class="flex flex-col gap-3">
              <!-- Berita Satuan -->
              <?php foreach ($posts1 as $p): ?>
                <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-3">
                  <div class="aspect-square md:aspect-video w-1/4 rounded-md overflow-hidden">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="" class="w-full object-cover object-center">
                  </div>
                  <a href="detail-berita.php?id=<?php echo $p['id']; ?>">
                    <h2 class="text-md md:text-lg font-Montserrat font-bold"><?php echo $p['title'] ?></h2>                   
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="flex flex-col rounded-lg shadow-md border border-2 p-2">
            <h2 class="text-lg font-Montserrat font-bold border border-t-0 border-x-0 border-b-black w-full mb-3">Topics</h2>
            <div class="flex flex-col gap-2">
              <!-- Category Satuan -->
              <?php foreach ($topics as $topic): ?>
                <div class="flex flex-row gap-2 border border-t-0 border-x-0 border-gray-300 pb-2 w-full">
                <a href="<?php echo BASE_URL . '/informasi.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
      </section>
    </main>
    <?php include(ROOT_PATH . "/app/includes/footerreal.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/hamburger.js"></script>
    <script src="assets/js/profil.js"></script>
    <script src="assets/js/swiper.js"></script>
  </body>
</html>
