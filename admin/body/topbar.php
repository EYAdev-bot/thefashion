<header class="<?php echo ($page == "login") ? "hidden" : "" ?> ">

    <nav class=" mt-[50px] flex justify-between items-center px-[100px] pb-10">

        <span class="text-[30px]  font-[600] w-[150px]">Eya</span>

        <ul class="md:flex-row  md:flex md:flex hidden gap-8">
            <li class="<?php echo ($page == "home") ? "font-[700]"  : '' ?>"><a href="?page=dashboard"><span class="material-symbols-outlined <?php echo ($page == "dashboard") ? "bg-gray-300 p-2"  : '' ?>">
                        dashboard
                    </span></a></li>
            
            <li class="<?php echo ($page == "contact") ? "font-[700]"  : '' ?>"><a href="?page=write">Articles</a></li>
        </ul>

        <div class="nav-list hidden duration-500 md:hidden md:top-[0px]  md:block absolute top-[100px] bg-zinc-700 w-full  md:p-[0px] ">
            <ul class="md:flex-row  md:flex  flex-col flex ">
                <li class="p-4 border-b-1 border-solid py-4 z-100 <?php echo ($page == "dashboard") ? "bg-[#efefff]"  : '' ?> "><a href="?page=dashboard"><span class="material-symbols-outlined">dashboard</span> Dashboard</a></li>
                <li class="p-4 border-b-1 border-solid py-4 z-100 <?php echo ($page == "write") ? "bg-[#efefee]"  : '' ?>"><a href="index.php?page=write" class="block "><ion-icon class="text-[20px]" name="pencil-outline"></ion-icon>Write</a></li>
                <li class="p-4 border-b-1 border-solid py-4 z-100 <?php echo ($page == "contact") ? "bg-[#efefee]"  : '' ?>"><a href="?page=contact" >Logout</a></li>
            </ul>
        </div>


        <ion-icon class="md:hidden text-[30px] cursor-pointer" onclick="onToggleMenu(this)" name="menu-outline"></ion-icon>

      <ul class="md:flex hidden md:items-center md:gap-3">
        <li><a href="../index.php">Quit</a></li>
        <li><a href="index.php?page=Logout">Logout</a></li>
      </ul>

    </nav>
</header>