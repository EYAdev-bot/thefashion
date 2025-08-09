<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__. '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ekangay18@gmail.com'; // remplace ici
        $mail->Password   = 'jyxc cpcy dvmx ydyf';     // pas ton vrai mot de passe !
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Expéditeur et destinataire
        $mail->setFrom($email, $nom);
        $mail->addAddress('ekangay18@gmail.com'); // le mail qui reçoit le message

        // Contenu du mail
        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de $nom";
        $mail->Body    = $message;

        $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur : " . $mail->ErrorInfo;
    }
}
?>



    <!-- Debut formulaire contact-->
    <section class="w-4/5 max-w-[1200px] mx-auto p-8">
        <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="flex-1 max-w-full md:max-w-[50%] p-8 flex flex-col">
                <h2 class="mb-6 text-gray-800 text-xl font-bold">Contactez-nous</h2>
                <form class="flex flex-col md:h-full w-full" method="post" action="">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 font-bold">Nom</label>
                        <input type="text" id="name" name="nom" placeholder="Entrez votre nom" required
                            class="w-full p-2 border border-gray-300 rounded-md" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 font-bold">Email</label>
                        <input type="email" id="email" name="email" placeholder="Entrez votre email" required
                            class="w-full p-2 border border-gray-300 rounded-md"
                            value="">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block mb-2 font-bold">Question</label>
                        <textarea id="message" name="message" placeholder="Entrez votre question ou message" required
                            class="w-full p-2 border border-gray-300 rounded-md h-24 resize-y"></textarea>

                    </div>
                    <button type="submit" class="inline-block bg-[#6A664B] text-white border-none py-2 px-2 cursor-pointer rounded-lg transition-colors duration-300 hover:text-[#45a049] w-[150px]">Envoyer</button>
                </form>
            </div>
            <div class="flex-1 max-w-full md:max-w-[50%] flex">
                <img src="img/notebook-1130742_640.jpg" alt="Contact Image"
                    class="w-full h-full object-cover rounded-md">
            </div>
        </div>
    </section>
    <!-- Fin formulaire contact-->

