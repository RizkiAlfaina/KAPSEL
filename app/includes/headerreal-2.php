<header class="w-full bg-[#655740] flex flex-col box-border xl:flex-row xl:justify-between xl:items-center xl:px-[69px]">
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
        <button class="text-white font-Montserrat text-xl group text-start relative" id="profil">
          <div>
            <span>PROFIL</span>
            <i class="fa fa-chevron-down"></i>
          </div>
          <ul class="transform xl:scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top top-1/2 xl:absolute xl:top-1/2 xl:translate-y-4 rounded-md shadow-lg hidden xl:block z-50 bg-[#655740] overflow-hidden">
            <li class="hover:bg-[#504433] w-full p-2.5"><a href="">SAMBUTAN</a></li>
            <li class="hover:bg-[#504433] w-full p-2.5"><a href="">VISI & MISI</a></li>
            <li class="hover:bg-[#504433] w-full p-2.5"><a href="">SEJARAH</a></li>
            <li class="hover:bg-[#504433] w-full p-2.5"><a href="">a</a></li>
            <li class="hover:bg-[#504433] w-full p-2.5"><a href="">e</a></li>
          </ul>
        </button>
        <ul class="text-white font-Montserrat text-xl text-start flex gap-5 flex-col hidden" id="profilmenus">
          <li><a href="" class="block">a</a></li>
          <li><a href="" class="block">b</a></li>
          <li><a href="" class="block">c</a></li>
          <li><a href="" class="block">d</a></li>
          <li><a href="" class="block">e</a></li>
        </ul>
        <a href="<?php echo BASE_URL . '/informasi.php' ?>" class="text-white font-Montserrat text-xl">INFORMASI</a>
        <a href="" class="text-white font-Montserrat text-xl">KEJURUAN</a>
        <a href="<?php echo BASE_URL . '/ekstrakurikuler.php' ?>" class="text-white font-Montserrat text-xl">EKSTRAKURIKULER</a>
        <a href="#kontak" class="text-white font-Montserrat text-xl">KONTAK</a>
      </nav>
      <?php if (isset($_SESSION['id'])): ?>
          <div class="text-white font-Montserrat text-xl px-4 font-bold mb-5 xl:mb-0 relative group hidden xl:block" id="login">
            <button class="flex flex-row gap-2 justify-center items-center">
              <i class="fa fa-user"></i>
              <span><?php echo $_SESSION['username']; ?></span>
              <i class="fa fa-chevron-down"></i>
            </button>
            <ul class="transform xl:scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top top-full xl:absolute xl:text-right xl:pt-3 xl:top-1/2 xl:translate-y-4 rounded-md shadow-lg hidden xl:block z-50 bg-[#655740] overflow-hidden">
              <?php if($_SESSION['admin']): ?>
              <li class="hover:bg-[#504433] w-full p-2.5"><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>" class="text-white font-Montserrat text-xl font-bold mb-4 mt-4 xl:mt-0 block xl:mb-0">Dashboard</a></li>
              <?php endif; ?>
              <li class="hover:bg-[#504433] w-full p-2.5"><a href="<?php echo BASE_URL . '/logout.php' ?>" class="text-white font-Montserrat text-xl font-bold mb-4 block xl:mb-0 mt-1.5">Logout</a></li>
            </ul>        
          </div>
      <?php else: ?>
        <a href="<?php echo BASE_URL . '/login.php' ?>" class="text-white font-Montserrat text-xl px-4 font-bold mb-5 hidden xl:block xl:mb-0" id="login">Login</a>
      <?php endif; ?>
    </header>