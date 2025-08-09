<?php
if (isset($_FILES['image_file'])) {
    $name = $_FILES['image_file']['name'];
    $tmpname = $_FILES['image_file']['tmp_name'];
}

if (isset($_POST['sub'])) {
    // Vérifier que le fichier a bien été envoyé
    if (!isset($_FILES['image_file'])) {
        die("Aucun fichier image envoyé.");
    }

    $name = $_FILES["image_file"]["name"];
    $tmpname = $_FILES["image_file"]["tmp_name"];

    // Vérifier l’extension
    $tabextention = explode('.', $name);
    $extention = strtolower(end($tabextention));

    $extentionutilise = ['jpg', 'png', 'jpeg', 'gif', 'avif'];

    if (in_array($extention, $extentionutilise)) {
        $uniqname = uniqid("", true);
        $filename = $uniqname . '.' . $extention;

        // Envoyer l’image vers le dossier upload
        if (move_uploaded_file($tmpname, 'upload/' . $filename)) {
            echo "Image bien enregistrée !";
        } else {
            die("Erreur lors du transfert de l'image.");
        }
    } else {
        die("Extension non autorisée.");
    }

    // Récupérer les données du formulaire
    $title = $_POST["title"];
    $content = $_POST["content"];
    $writer = $_SESSION["admin"];
    $image_file = $filename;
    $video = $_POST["video"];

    // Vérifier que les champs sont remplis
    if (!empty($title) && !empty($content)  && !empty($image_file) && !empty($video)) {
        comments($title, $content, $writer, $image_file, $video);
    } else {
        die("Tous les champs doivent être remplis !");
    }
}
?>
<form action="" method="post" class="border-2 px-4 border-solid border-black rounded-lg w-full h-[100%]" enctype="multipart/form-data">

    <h2 class="text-[30px] text-center ">
        Create an article
    </h2>

    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="w-full rounded-[10px] border-1 border-solid" placeholder="Title">
    <label for="editor">Content</label>
    <textarea id="editor" name="content"></textarea>
    <div class="mb-4">

        <input type="file" id="imageUploader"><br>
        <button type="button" onclick="insertImage()">📷 Insérer Image</button><br>


        <label class="">image</label>
        <div class="flex items-center justify-center w-full">
            <label for="mainPhoto" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 relative overflow-hidden">
                <div class="main-photo-preview flex flex-col items-center justify-center pt-5 pb-6 z-10 w-full h-full">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Cliquez pour télécharger</span> ou glissez-déposez</p>
                    <p class="text-xs text-gray-500">PNG, JPG ou JPEG</p>
                </div>
                <img id="mainPhotoPreview" class="absolute inset-0 w-full h-full object-contain hidden" />
                <input id="mainPhoto" type="file" class="hidden" name="image_file" accept="image/*" onchange="previewMainImage(this)" />
            </label>
        </div>
    </div>

    <label for="video">Inter the video Id</label>
    <input type="text" name="video" id="video" class="w-full block rounded-[10px] border-none" placeholder="Video id">

    <div class="mt-[30px] flex justify-center">



        <button type="submit" name="sub" class="bg-[#000] px-8 py-2 rounded-[5px] text-white cursor-pointer hover:py-4">
            save
        </button>
    </div>
</form>