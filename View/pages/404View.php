<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page 404</title>
   <link rel="stylesheet" href="<?= SRC ?>/output.css">
</head>

<body class="flex items-center justify-center min-h-screen dark:bg-slate-950">
   <div class="w-full max-w-6xl flex flex-col items-center justify-center ">
      <h1 class="text-9xl font-bold text-indigo-900  dark:text-teal-50">404</h1>
      <h2 class="text-6xl font-bold dark:text-white">Page Not Found!</h2>
      <div class="relative">
         <img src="<?= ASSETS ?>/404.png" alt="404" class=" rotate-45 h-100">
         <div class="w-full absolute text-center m">
         <button onclick="location.href='?page=home'" class=" bg-black dark:bg-slate-950 dark:border-2 dark:border-white dark:hover:bg-slate-900 font-bold  text-white px-8 py-2 rounded-full cursor-pointer hover:bg-gray-500 ">GO
               HOME</button>
         </div>
      </div>
   </div>
<script src=".../js/darkmode.js"></script>
</body>

</html>