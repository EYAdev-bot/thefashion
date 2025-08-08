<?php
$posts = get_post();
?>

<div class="bg-zinc-200 p-12 ">


   <h1 class="capitalize text-center text-5xl font-[serif] mb-4">
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
      <!-- <div>
         <div>
            <img class="md:w-[30vw] h-[250px] object-cover w-full" src="admin/upload/<?= $post->image ?>" alt="essie">
         </div>
         <div>
            <h1 class="text-[17px] font-[600] md:w-[30vw] "><?= $post->title ?></h1>
            <h2 class="mb-[10px]" style="color: rgba(0, 0, 0, 0.37);">
               <?= date("d/m/Y  H:i", strtotime($post->date)); ?> by <?= $post->names ?>
            </h2>
            <div class="md:w-[30vw]">
               <?= substr(nl2br($post->content), 0, 300) ?>...
            </div>
            <a href="?page=post&id=<?= $post->id ?>" class="text-blue-800">read more <svg class="w-6 inline h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
               </svg>
            </a>
         </div>
      </div>
   -->



      <div class=" flex justify-between px-10">
         <div>
            <img src="admin/upload/<?= $post->image ?>" alt="" class=" h-[25rem] w-[35rem] ">
         </div>
         <div class=" flex-col flex gap-8 justify-center">
            <i>Business Tips</i>
            <h2 class="text-2xl w-[500px]  inline"><?= $post->title ?></h2>
            <div class="w-[500px] break-words whitespace-normal"><?= substr(nl2br(strip_tags($post->content)), 0, 200) ?></div>
            <a href="?page=post&id=<?= $post->id ?>" class="font-[tohoma] font-[300]">READ ARTICLE</a>
         </div>
      </div>



   <?php
   }
   ?>

</div>