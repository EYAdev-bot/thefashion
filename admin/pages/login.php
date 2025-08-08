 <?php
  if (isset($_SESSION["admin"])) {
    header("location:index.php?page=dashboard");
  }
 ?>

<div class="flex justify-center">
    <div class="flex justify-center flex-col items-center my-[30px] border-1 border-solid border-black inline-block px-5 py-4 rounded-[15px]">
        <div class="mb-[20px] flex justify-center flex-col items-center">
            <img src="../img/software-engineer.png" class="w-[200px]" alt="">

            <p>
                ADMIN
            </p>
        </div>
 
          <?php

              if (isset($_POST["sub"])) {
               $email= htmlspecialchars(trim($_POST["email"]));
               $password =htmlspecialchars(trim($_POST["psswd"]));
 
               $errors = [];
               if (empty($email) || empty($password)) {
                $errors["empty"] = "Not all fields have been filled in!";
               }else if(is_admin($email, $password)== 0){
                $errors["existe"]= "This administrator does't exist!";
               }

               if (!empty($errors)) {
                ?>
                  <div class="text-red-800">
                      <?php
                         foreach ($errors as $error) {
                            echo $error;
                         }
                      ?>
                  </div>
                <?php
               }else {
                  $_SESSION["admin"]=$email ;

                  header("location:?page=dashboard");
               }
              }

          ?>

        <form action="" method="post" class="md:w-[20vw] w-[80%]">

            <div class="mb-4">
                <label for="email" class="block mb-2 font-bold">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email adress" required
                    class="w-full p-2 border border-gray-300 rounded-md" value="">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 font-bold">Password</label>
                <input type="password" id="password" name="psswd" placeholder="Enter your password" required
                    class="w-full p-2 border border-gray-300 rounded-md" value="">
    
            </div>

            <div class="justify-center flex items-center">
                <input type="submit" value="Send" name="sub" class="bg-blue-800 px-5 py-2 rounded-full">
            </div>

        </form>
    </div>
</div>