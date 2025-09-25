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



      <div class=" md:flex md:flex-row md:justify-between flex-col items-center md:px-10">
         <div>
            <img src="https://the-fashionadmin.onrender.com/upload/<?= $post->image ?>" alt="" class=" md:h-[25rem] md:w-[35rem] w-[100%] h-[45%] object-cover object-center ">
         </div>
         <div class=" flex-col flex gap-8 justify-center">
            <i>Business Tips</i>
            <h2 class="text-2xl md:w-[500px] w-[100%] p-2  inline"><?= $post->title ?></h2>
            <div class="md:w-[500px] w-screen break-words whitespace-normal p-2"><?= substr(nl2br(strip_tags($post->content)), 0, 200) ?></div>
            <a href="?page=post&id=<?= $post->id ?>" class="font-[tohoma] font-[300] text-blue-500">READ ARTICLE</a>
         </div>
      </div>

   <?php

   }
   ?>


</div>