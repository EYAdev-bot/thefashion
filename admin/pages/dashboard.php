<div class="flex">

<div class="w-[250px%] bg-black">

</div>

<div  id="dashboard">
    <h2 class="my-[30px] md:text-3xl">
        Dashboard
    </h2>

    <div class="flex justify-between">

        <?php
        $tables = [
            "publications"   => "post",
            "Comments"       => "comments",
            "administrator" => "admins"
        ];

        $colors = [
            "post"     => "green-600",
            "comments" => "blue-600",
            "admins"   => "red-600"
        ]
        ?>

        <?php
        foreach ($tables as $table_name => $table) {
            if ($table=="comments") {
                $query="SELECT COUNT(id)  FROM $table WHERE seen = 0";
            }else {
                $query="SELECT COUNT(id)  FROM $table";
            }
        ?>

            <div class=" bg-<?= getColor($table, $colors); ?> md:w-[250px] h-[100px] text-white flex-col flex justify-between p-2">
                <h3 class="text-2xl">
                    <?= $table_name ?>
                </h3>
                <?php $nbrInTable = in_table($table,$query) ?>
                <p class="text-xl">
                    <?= $nbrInTable[0] ?>
                </p>
            </div>

        <?php
        }
        ?>


    </div>

    <h4 class="text-2xl mt-[30px]">
        Unread Comments :
    </h4>

    <?php
    $comments =  get_comment();
    ?>



    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        Articles
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        comments
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($comments as $comment) {
                ?>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200" id="comment_<?= $comment->id ?>">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $comment->title ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= substr(nl2br($comment->comments), 0, 50) ?>...
                        </td>
                        <td class="px-6 py-4">
                            <a href="#comment" onclick="updateComment(<?= $comment->id ?>)" style="border: none;"><ion-icon name="checkmark-done-circle" class="text-4xl text-green-800 seen_comment"></ion-icon></a>
                            <a href="#comment" onclick="deleteComment(<?= $comment->id ?>)"><ion-icon name="trash-sharp" class=" text-xl rounded-full text-white bg-red-800 p-2 delete_comment"></ion-icon></a>
                            <a href="#comment_<?= $comment->id ?>" onclick="showModal(<?= $comment->id ?>)"><ion-icon name="ellipsis-vertical-sharp" class="text-xl p-2 rounded-full bg-blue-800 text-white"></ion-icon></ion-icon></a>
                        </td>
                    </tr>

                    <div id="comment_<?= $comment->id ?>" class=" hidden fixed z-50 inset-0 flex items-center justify-center " style="background-color:rgba(0, 0, 0, 0.26);">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                            <p class="text-gray-400 font-[200]">post by <?= $comment->names . "(" . $comment->emails . ")</br> on " . $comment->date ?></p>
                            <h2 class="text-lg font-bold"><?= $comment->title ?> </h2>
                            <p class="mt-2"><?= $comment->comments ?></p>

                            <hr>

                            <div class="flex justify-end p-4 gap-6">
                                <a href="#" oonclick="updateComment(<?= $comment->id ?>)"><ion-icon name="checkmark-done-circle" class="text-xl  seen_comment"></ion-icon></a>
                                <a href="#" onclick="deleteComment(<?= $comment->id ?>) id=" <?= $comment->id ?>"><ion-icon name="trash-sharp" class=" text-xl delete_comment"></ion-icon></a>
                            </div>


                            <button onclick="closeModal(<?= $comment->id ?>)" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-md cursor-pointer">close</button>
                        </div>
                    </div>


                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</div>


<?php

?>
</div>