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
      <div class=" md:flex md:flex-row md:justify-between mb-10 flex-col items-center md:px-10">
         <div>
            <img src="https://the-fashionadmin.onrender.com/upload/<?= $post->image ?>" alt="" class=" md:h-[25rem] md:w-[35rem] w-[100%] h-[45%] ">
         </div>
         <div class=" flex-col flex md:gap-8 gap-2 justify-center">
            <i>Business Tips</i>
            <h2 class="text-2xl md:w-[500px] w-[100%] p-2  inline"><?= $post->title ?></h2>
            <div class="md:w-[500px] w-screen break-words whitespace-normal p-2"><?= substr(nl2br(strip_tags($post->content)), 0, 200) ?></div>
            <a href="?page=post&id=<?= $post->id ?>" class="font-[tohoma] font-[300] p-2 text-blue-600">READ ARTICLE</a>
         </div>
      </div>



   <?php
   }
   ?>

</div>

</div>