<?php
$post = posts();

if ($post == false) {
    header("location:index.php?page=error");
}
?>

<div class="mt-[30px] ">
    <div class="flex  justify-center flex-col items-center">
        <img class="md:w-[75%] md:h-[50%] w-full " src="https://the-fashionadmin.onrender.com/upload/<?= $post->image ?>" alt="<?= $post->title ?>">
        <h1 class="md:text-[30px] w-[95%] md:px-16 p-4">
            <?= strtoupper($post->title) ?>
        </h1>



        <div class=" md:px-16 w-[95%] break-words whitespace-normal p-4">
            <?= $post->content ?>
        </div>



    </div>
</div>

<div class="flex flex-col items-center">
    <iframe class="md:mx-16 md:mt-[30px] md:w-[75%] h-[315px] w-full " src=" https://www.youtube.com/embed/<?= $post->videos ?>" frameborder="0" allowfullscreen></iframe>

    <h4 class="mt-[30px] text-[40px] text-[#169179]">
        feedback :
    </h4>
    <div class="w-[75%]  h-64 flex flex-col overflow-y-auto border-1 border-solid mt-[30px]">

        <?php
        $reponses = get_comment();

        if ($reponses != false) {
            foreach ($reponses as $reponse) {
        ?>
                <blockquote class="bg-gray-300 inline-block w-[300px] p-6 mb-4">
                    <strong>
                        <?= $reponse->names ?> (<?= date("d/m/Y ", strtotime($reponse->date)) ?>)
                    </strong>

                    <p>
                        <?= nl2br($reponse->comments) ?>
                    </p>
                </blockquote>


            <?php
            }
        } else {
            ?>
            <div>
                <?php
                $er = "There are no reviews"
                ?>
                <?= $er ?>
            </div>
        <?php
        }

        ?>
    </div>


    <h4 class="mt-[30px] text-[40px] text-[#169179]">Comment :</h4>

    <?php
    if (isset($_POST['sub'])) {
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $comment = $_POST["comment"];
        $errors = [];

        if (empty($name) || empty($mail) || empty($comment)) {
            $errors["empty"] = "Not all fields have been filled in.";
        } else {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "The email address is invalid";
            }
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {


    ?>
                <div class="text-red-500">
                    <?= $error ?>
                </div>
            <?php
            }
        } else {
            comment($name, $mail, $comment);
            ?>
            <script>
                window.location.replace("index.php?page=post&id=<?= $_GET["id"] ?>")
            </script>

    <?php

        }
    }
    ?>

    <form method="post" class="mt-[20px] w-[75%]">

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">your name</label>
            <input type="text" id="name" name="name" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="your name">

            <label for="mail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="mail" name="mail" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@gmail.com">
        </div>

        <div class="w-full mb-4 border border-gray-200 rounded-lg  dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" name="comment" rows="4" class="w-[75%] px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600 border-gray-200">
                <button type="submit" name="sub" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-black rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Post comment
                </button>
            </div>
    </form>

</div>

</div>