<?php
include "functions/connect_to_bd.php";

$pages = scandir('pages/');
if (isset($_GET["page"]) && !empty($_GET['page'])) {
    if (in_array($_GET['page'] . '.php', $pages)) {
        $page = $_GET['page'];
    } else {
        $page = "error";
    }
} else {
    $page = "home";
}

$page_functions = scandir("functions/");
if (in_array($page . ".func.php", $page_functions)) {
    include "functions/" . $page . ".func.php";
}
$styles = scandir("css/");
if (in_array($page . '.css', $styles)) {
    $style = $page . ".css";
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
</head>

<body class=" bg-[#FAF9F7] font-[poppins]">
    <?php
    include "body/topbar.php"
    ?>
    <?php
    include_once "pages/" . $page . ".php";
    ?>

    <?php
    include "body/footer.php"
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
        const searchKeyword = async () => {
            document.querySelector('#result').innerHTML = ""
            keyword = document.querySelector('#search').value;
            console.log(keyword)
            if (keyword.length > 2) {
                const req = await fetch('search.php?q=' + `${keyword}`);
                const json = await req.json();
                json.forEach(post => {
                    document.querySelector('#result').innerHTML += "<a href='index.php?page=home#'" + post.id + " class=' inline-block text-blue-500 border-b-1 border-solid'>" + post.title.substr(0, 20) + "...</a></br>"
                });
            } else {
                document.querySelector('#result').innerHTML = ""
            }
        }
    </script>
</body>

</html>