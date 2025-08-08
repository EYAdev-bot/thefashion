<?php
include "../functions/connect_to_bd.php";

$pages = scandir('pages/');
if (isset($_GET["page"]) && !empty($_GET['page'])) {
    if (in_array($_GET['page'] . '.php', $pages)) {
        $page = $_GET['page'];
    } else {
        $page = "error";
    }
} else {
    $page = "dashboard";
}

$page_functions = scandir("functions/");
if (in_array($page . ".func.php", $page_functions)) {
    include "functions/" . $page . ".func.php";
}

$js = scandir("js/");
if (in_array($page . ".js", $js)) {
    $page_js = $page . ".js";
}

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page ?></title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=poppins:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dashboard" />
</head>

<body class=" px-[10px] p-[100px] bg-zinc-900 font-[poppins]">

    <?php
    //login page
    if ($page != 'login' && !isset($_SESSION['admin'])) {
        header("location:index.php?page=login");
    } ?>


    <div class="flex border-2 borde-solid border-zinc-500 rounded-xl bg-white ">
        <div class="w-[15%] h-screen bg-zinc-900 rounded-tl-[10px] rounded-bl-[10px] flex justify-center items-center">
         <ul class="flex gap-8 text-white flex-col">
             <li class="p-[10px] w-[100%] <?php echo ($page=="dashboard") ? "bg-zinc-600" : "" ?>"><a href="index.php?page=dashboard">dashboard</a></li>
             <li class="p-[10px] <?php echo ($page=="write") ? "bg-zinc-600" : "" ?>"><a href="index.php?page=write">write</a></li>
             <li class="p-[10px] <?php echo ($page=="article") ? "bg-zinc-600" : "" ?>"><a href="index.php?page=dashboard">article</a></li>
             <li class="p-[10px] <?php echo ($page=="subscribers") ? "bg-zinc-600" : "" ?>"><a href="index.php?page=dashboard">subcribers</a></li>

         </ul>

        </div>

        <div class=" h-screen w-full flex items-center justify-center  overflow-y-auto p-4  max-h-[900px]">
            <?php
            include_once "pages/" . $page . ".php";
            ?>
        </div>
    </div>

    <?php
    // include "body/footer.php"
    ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        const navlisit = document.querySelector('.nav-list')

        function onToggleMenu(e) {
            e.name = e.name === 'menu-outline' ? 'close' : 'menu-outline'
            navlisit.classList.toggle('hidden')
        }
    </script>

    <script>
        function showModal(id) {
            document.getElementById('comment_' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('comment_' + id).classList.add('hidden');
        }
    </script>

    <script src="js/<?= $page_js ?>">

    </script>

    <script src="tinymce/tinymce.min.js">

    </script>
    <script>
        tinymce.init({
            selector: '#editor',
            menubar: false,
            plugins: 'advlist autolink lists link emoticons image media code',
            toolbar: 'undo redo | forecolor backcolor | fontsize | bold italic | link image | bullist numlist| emoticons',
            automatic_uploads: false // Désactiver l'upload local

        });
        console.log(typeof tinymce);
    </script>
</body>

</html>