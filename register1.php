<?php include('path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
guestsOnly();
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
      href="https://fonts.googleapis.com/css2?family=McLaren&family=Montaga&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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
              McLaren: ["McLaren", "sans-serif"],
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
  <body class="">
    <div class="bg-[url('assets/images/carousel_1.jpeg')] min-h-screen min-w-screen bg-cover bg-no-repeat bg-center flex justify-center items-center px-3">
      <div class="max-w-[1065px] px-7 py-7 w-full bg-[rgba(191,186,186,0.5)] rounded-3xl flex flex-col md:flex-row gap-8 backdrop-blur-sm">
        <div class="md:w-1/2">
          <!-- Logo -->
          <a href="<?php echo BASE_URL . '/index.php' ?>" class="inline-block flex items-center gap-3">
            <img class="w-[75px] xl:w-[100px] inline-block" src="assets/images/logo_sekolah.png" alt="" />
            <div class="inline-block">
              <h1 class="w-56 text-white text-lg font-extrabold font-Montserrat w-fit tracking-widest">SMKN 1</h1>
              <h1 class="w-56 text-white text-lg font-extrabold font-Montserrat w-fit tracking-widest">PEKALONGAN</h1>
              <p class="opacity-50 text-white text-xs font-semibold font-SourceSans w-fit tracking-[5px]">SMK Bisa - Hebat</p>
            </div>
          </a>

          <!-- Form Login -->
          <div class="text-center">
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <div class="my-14">
              <h2 class="text-neutral-800 text-[25px] font-normal font-McLaren">Register</h2>
              <h4 class="text-neutral-800 text-[10px] font-normal font-McLaren">Buatlah Akun Baru</h4>
            </div>
            <form action="register1.php" method="post">
              <input
                type="text"
                name="username"
                id="username"
                value="<?php echo $username; ?>"
                class="text-input w-full bg-transparent placeholder:text-black placeholder:font-McLaren placeholder:translate-y-1/2 placeholder:indent-2 text-xs border border-x-0 border-t-0 border-b-1 border-black pb-4 mb-12"
                placeholder="Username"
              />
              <input
                type="email"
                name="email"
                id="email"
                value="<?php echo $email; ?>"
                class="text-input w-full bg-transparent placeholder:text-black placeholder:font-McLaren placeholder:translate-y-1/2 placeholder:indent-2 text-xs border border-x-0 border-t-0 border-b-1 border-black pb-4 mb-12"
                placeholder="Email"
              />
              <input
                type="password"
                name="password"
                id="password"
                value="<?php echo $password; ?>"
                class="text-input w-full bg-transparent placeholder:text-black placeholder:font-McLaren placeholder:translate-y-1/2 placeholder:indent-2 text-xs border border-x-0 border-t-0 border-b-1 border-black pb-4 mb-12"
                placeholder="Password"
              />
              <input
                type="passwordConf"
                name="passwordConf"
                id="passwordConf"
                value="<?php echo $passwordConf; ?>"
                class="text-input w-full bg-transparent placeholder:text-black placeholder:font-McLaren placeholder:translate-y-1/2 placeholder:indent-2 text-xs border border-x-0 border-t-0 border-b-1 border-black pb-4 mb-12"
                placeholder="Masukkan Ulang Password"
              />             
              <div>
                <button type="submit" name="register-btn" class="bg-[#928454] w-full px-20 py-1 rounded-md">Register</button>
              </div>
              <h4 class="text-neutral-800 text-[10px] font-normal font-McLaren mt-2.5">Or <a href="<?php echo BASE_URL . '/login1.php' ?>">Sign In</a></h4>
            </form>
          </div>
        </div>

        <!-- Image Beautiful -->
        <div class="hidden md:block md:w-1/2 rounded-3xl overflow-hidden">
          <img src="assets/images/carousel_1.jpeg" alt="" class="w-full h-full object-cover object-center" />
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
  </body>
</html>
