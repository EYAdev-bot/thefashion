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
      <div class=" flex justify-between px-10 mt-4">
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

</div>