<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Feed</title>
   <link rel="stylesheet" href="<?= SRC ?>/output.css">
</head>

<body class=" min-h-screen w-full bg-gray-100">
   <?php
   require_once VIEW . "/components/aside.php"
   ?>
   <div class="lg:w-2/4 m-auto border h-screen border-black flex flex-col dark:bg-slate-950 dark:text-white dark:border-white">
      <div class="w-full">
         <div class="flex justify-around  w-full m-atuo cursor-pointer">
            <a class=" hover:bg-gray-400 w-full text-center grow-1 p-4 border" href="?page=follow/<?= $username ?>/followers"><span class="hover:bg-gray-400 w-full text-center">Followers</span></a>
            <a class=" hover:bg-gray-400 w-full text-center grow-1 p-4 border" href="?page=follow/<?= $username ?>/followings"><span class="hover:bg-gray-400 w-full text-center">Followings</span></a>
         </div>
      </div>
      <div class="flex">
         <ul class="w-full">
            <?php if ($type == "followers"): ?>
               <?php foreach ($followers_list as $follow): ?>
                  <li class=" hover:-translate-y-1 hover:scale-100 hover:bg-gray-300 dark:hover:bg-gray-700 justify-center flex gap-2 m-5 p-2 rounded-lg"><img class="w-10 h-10 items-center place-content-center rounded-full" src="<?= $follow['picture'] ?>" alt="user profile picture"><a class="w-full place-content-center" href="?page=profile/<?= $follow['username'] ?>">
                        <p class="font-bold"><?= $follow['display_name'] ?></p>
                        <p>@<?= $follow['username'] ?></p>
                        <p><?= $follow['biography'] ?></p>
                     </a></li>
               <?php endforeach ?>
            <?php elseif ($type == "followings"): ?>
               <?php foreach ($followings_list as $follow): ?>
                  <li class=" hover:-translate-y-1 hover:scale-100 hover:bg-gray-300 dark:hover:bg-gray-700 justify-center flex gap-2 m-5 p-2 rounded-lg"><img class="w-10 h-10 items-center place-content-center rounded-full" src="<?= $follow['picture'] ?>" alt="user profile picture"><a class="w-full place-content-center" href="?page=profile/<?= $follow['username'] ?>">
                        <p class="font-bold"><?= $follow['display_name'] ?></p>
                        <p>@<?= $follow['username'] ?></p>
                        <p><?= $follow['biography'] ?></p>
                     </a></li>
               <?php endforeach ?>
            <?php endif ?>
         </ul>
      </div>
   </div>
<script type="module" src="../script.js"></script>
<script src="js/modal.js"></script>
<script src="js/darkmode.js"></script>
</body>


</html>