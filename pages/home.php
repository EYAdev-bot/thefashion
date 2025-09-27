<?php
$posts = get_post();
?>

<div class="bg-zinc-200 md:p-12 w-[100%]">


   <h1 class="capitalize text-center text-5xl font-[serif] mb-4  ]">
      <span class="uppercase text-xl pb-4">welcome to</span> <br>
      the daily tech home
   </h1>
   <p class="text-center text-xl p-3">
      unlocking the power of smart products for a more efficient life. <br>
      from wearables to smart home, we review what truly matter
   </p>
</div>

<div class="mt-[50px] flex flex-col flex-wrap gap-6">


   <?php

   foreach ($posts as $post) {
   ?>



      <!-- <div class=" md:flex md:flex-row md:justify-between flex-col items-center md:px-10">
         <div>
            <img src="https://the-fashionadmin.onrender.com/upload/<?= $post->image ?>" alt="" class=" md:h-[25rem] md:w-[35rem] w-[100%] h-[45%] object-cover object-center ">
         </div>
         <div class=" flex-col flex gap-8 justify-center">
            <i>Business Tips</i>
            <h2 class="text-2xl md:w-[500px] w-[100%] p-2  inline"><?= $post->title ?></h2>
            <div class="md:w-[500px] w-screen break-words whitespace-normal p-2"><?= substr(nl2br(strip_tags($post->content)), 0, 200) ?></div>
            <a href="?page=post&id=<?= $post->id ?>" class="font-[tohoma] font-[300] text-blue-500">READ ARTICLE</a>
         </div>
      </div> -->
      <section class=" px-4 py-8 antialiased dark:bg-gray-900 ">
         <div class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
            <div class="lg:col-span-5 lg:mt-0">
               <a href="#">
                  <img class="mb-4 h-56 w-full dark:hidden sm:h-96 sm:w-96 md:h-full md:w-full object-cover object-center " src="https://the-fashionadmin.onrender.com/upload/<?= $post->image ?>" alt="peripherals" />
                  <!-- <img class="mb-4 hidden dark:block md:h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg" alt="peripherals" /> -->
               </a>
            </div>
            <div class="me-auto place-self-center lg:col-span-7">
               <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
                  <?= $post->title ?>
               </h1>
               <p class="mb-6 text-gray-500 dark:text-gray-400"><?= substr(nl2br(($post->content)), 0, 200) ?> </p>
               <a href="page=post&id=<?= $post->id ?>" class="inline-flex items-center justify-center rounded-lg bg-primary-700 px-5 py-3 text-center text-base font-medium text-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900"> read more </a>
            </div>
         </div>
      </section>

   <?php

   }
   ?>


</div>