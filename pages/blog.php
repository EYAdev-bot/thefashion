<?php
include_once "body/topbar.php";



$posts = get_post();
?>

<div class="text-center ">
   <h1 class="text-[40px] font-[600] inline">The Eya Blog</h1><br>
   <span>Blog About New Products</span>
</div>

<div class="mt-[100px]">

   <?php
   foreach ($posts as $post) {
   ?>
      <section class="bg-white px-4 py-2 antialiased dark:bg-gray-900 md:py-">
         <div class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
            <div class="lg:col-span-5 lg:mt-0">
               <a href="#">
                  <img class="mb-4 h-56 w-56 dark:hidden sm:h-96 sm:w-96 md:h-full md:w-full" src="https://the-fashionadmin.onrender.com/upload/<?= $post->image ?>" alt="peripherals" />
                  <!-- <img class="mb-4 hidden dark:block md:h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg" alt="peripherals" /> -->
               </a>
            </div>
            <div class="me-auto place-self-center lg:col-span-7">
               <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
                  <?= $post->title ?>
               </h1>
               <p class="mb-6 text-gray-500 dark:text-gray-400"><?= substr(nl2br(($post->content)), 0, 200) ?> </p>
               <a href="#" class="inline-flex items-center justify-center rounded-lg bg-primary-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900"> Pre-order now </a>
            </div>
         </div>
      </section>




   <?php
   }
   ?>

</div>

</div>