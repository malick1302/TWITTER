<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Message</title>
   <link rel="stylesheet" href="<?= SRC ?>/output.css">
</head>

<body class="min-h-screen w-full flex ">
   <!-- Fixed Sidebar -->
   <aside class=" left-0 top-0 p-4 w-1/4 h-screen hidden flex-col lg:flex space-y-4 justify-between bg-white dark:bg-slate-950">
      <div class="space-y-4 ml-20">
         <a href="?page=home"
            class="flex items-center space-x-3 p-3 rounded-full hover:bg-teal-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span class="text-xl font-bold hidden lg:block shadow-2">Home</span>
         </a>
         <a href="#"
            class="flex items-center space-x-3 p-3 rounded-full hover:bg-teal-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <span class="text-xl font-bold hidden lg:block">Explore</span>
         </a>
         <a href="#"
            class="flex items-center space-x-3 p-3 rounded-full hover:bg-teal-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            <span class="text-xl font-bold hidden lg:block">Notifications</span>
         </a>
         <a href="?page=message"
            class="flex items-center space-x-3 p-3 rounded-full hover:bg-teal-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <span class="text-xl font-bold hidden lg:block">Messages</span>
         </a>
         <a href="#"
            class="flex items-center space-x-3 p-3 rounded-full hover:bg-teal-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
            <span class="text-xl font-bold hidden lg:block">Bookmarks</span>
         </a>
         <a href="?page=profile"
            class="flex items-center space-x-3 p-3 rounded-full hover:bg-teal-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <span class="text-xl font-bold hidden lg:block">Profile</span>
         </a>

         <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
            class="openModal bg-black dark:bg-teal-100 text-white dark:text-black hover:bg-gray-600 dark:hover:bg-white cursor-pointer py-4 w-full rounded-full font-semibold text-l">Post</button>
         <button id="theme-toggle" type="button"
            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
               <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
               <path
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                  fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
         </button>

      </div>


      <div
         class="relative mt-auto ml-20 hover:bg-gray-600 dark:hover:bg-white dark:bg-teal-100 rounded-full py-2 flex items-center space-x-2 cursor-pointer openModal-logout">
         <img src="<?= $_COOKIE["picture"] ?>" class="h-6 ml-3" alt="picture">
         <div>
            <p><?= $_COOKIE["display_name"] ?></p>
            <p>@<?= $_COOKIE["username"] ?></p>
         </div>
         <div id="default-modal-logout" class="profileContainer hidden absolute bottom-full mb-2 left-0 bg-teal-50 shadow-md rounded-lg p-2 w-full hover:bg-gray-300 flex justify-between dark:hover:bg-slate-100">
            <button onclick="location.href='?page=logout'" class="outline-none">Logout @<?= $_COOKIE["username"] ?></button>
            <button data-modal-hide="default-modal-logout" type="button">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
               </svg>
            </button>
         </div>
      </div>
   </aside>

   <main class=" flex-1 flex h-screen w-full bg-teal-50 dark:bg-slate-950">
      <div class="flex shadow-md w-full">
         <div class="w-full border-r-1 border-l-1 dark:border-slate-900">
            <div class="flex justify-between p-2 mb-2 border-b-4 border-black dark:border-slate-900 dark:text-teal-50">
               <h2 class="font-bold text-xl">Messages</h2>
               <div class="flex space-x-1.5">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6 cursor-pointer dark:text-slate-50" >
                     <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="openModal size-6 cursor-pointer dark:text-slate-50">
                     <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                  </svg>
               </div>
            </div>
            <?php
require_once VIEW . "/components/skeletonMessage.php" 
   ?>
            <?php if (isset($user_conversations)): ?>
               <div>
                  <ul>
                     <?php foreach ($user_conversations as $conv): ?>
                        <li><button class=" conv tweet flex flex-col items-start border-b-2 mb-2 border-black bg-white dark:border-b-2 dark:bg-slate-950 dark:border-slate-900 m-0 mr-10 rounded-none dark:text-teal-50 hover:-translate-y-1 hover:scale-100 hover:bg-gray-300 dark:hover:bg-slate-800 justify-center w-full flex gap-2 p-2 " type="button" value="<?= $conv ?>"><?= $conv ?></button></li>
                     <?php endforeach ?>
                  </ul>
               </div>
            <?php else: ?>
               <div class="flex flex-col items-center justify-center">
                  <div class="m-20">
                     <h1 class="text-4xl font-bold">Welcome to your inbox</h1>
                     <p class="text-gray-500">Drop a line, share posts and more with private conversations between you and
                        others. </p>
                     <button class="openModal bg-blue-400 text-white px-4 py-2 rounded-full mt-2">Write a Message</button>
                  </div>
               </div>
            <?php endif ?>
         </div>
         <div class="bg-white dark:bg-slate-950 w-full">
            <div class="flex flex-col items-center min-h-screen justify-center w-full h-full">
               <div id="message-handler" class="hidden flex flex-col w-full h-full">
                  <div class="flex justify-between p-2 mb-2 border-b-4 border-black dark:border-teal-50 dark:text-teal-50">

                     <button id="close-conv" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor" class="size-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                     </button>
                  </div>
                  <div class="flex-1 border-b-4 dark:border-teal-50 overflow-scroll overflow-x-hidden" id="messages-zone">
                  </div>
                  <div id="input-zone" class="dark:teal-50 relative flex flex-row flex-none p-4 gap-1 dark:text-teal-50">
                     <input name="receiver-username" type="text" class="receiver-username hidden">
                     <textarea name="message-sended" required class="dark:text-black max-h-20 border rounded border-1 dark:border-teal-50 dark:bg-gray-600 dark:text-teal-50 border-black border-solid flex-1" id="message-input" type="text"></textarea>
                     <button id="send-message" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                           <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                        </svg>
                     </button>
                        <!-- <img class="w-10 h-10 dark:text-teal-50" src="../../assets/envoyer.png" alt=""></button> -->
                  </div>
               </div>
               <div id="no-message-default" class="m-20 dark:text-teal-50">
                  <h1 class="text-4xl font-bold">Select Message</h1>
                  <p class="text-gray-500">Choose from your existing conversations, start a new one, or just keep
                     swimming.</p>
                  <button class="openModal bg-black dark:bg-teal-100 text-white dark:text-black hover:bg-gray-600 dark:hover:bg-white cursor-pointer p-4  w-fit rounded-full font-semibold">New message</button>
               </div>
            </div>
         </div>
      </div>

   </main>

   <div class="lg:hidden fixed bottom-0 left-0 w-full bg-pink-200 border-t border-t-gray-300 dark:bg-slate-950 dark:border-t-slate-600 flex justify-around p-3">
      <a href="?page=home" class="flex items-center justify-center space-x-2 p-2">
         <img src="<?= ASSETS ?>/home.png" alt="home" class="h-7 ">
      </a>
      <a href="#" class="flex items-center justify-center space-x-2 p-2">
         <img src="<?= ASSETS ?>/search.png" class="h-7" alt="explore">
      </a>
      <a href="#" class="flex items-center justify-center space-x-2 p-2">
         <img src="<?= ASSETS ?>/notification.png" class="h-7" alt="notification">
      </a>
      <a href="?page=message" class="flex items-center justify-center space-x-2 p-2">
         <img src="<?= ASSETS ?>/message.png" class="h-7" alt="message">
      </a>
      <a href="#" class="flex items-center justify-center space-x-2 p-2">
         <img src="<?= ASSETS ?>/bookmark.png" class="h-7" alt="bookmark">
      </a>
      <a href="?page=profile" class="flex items-center justify-center space-x-2 p-2">
         <img src="<?= ASSETS ?>/profile.png" class="h-7" alt="profile">
      </a>
   </div>

   <!--Modal-->
   <div id="default-modal" class="flex fixed inset-0 bg-gray-900 bg-opacity-50 hidden  items-center justify-center">
      <div class="bg-white p-5 rounded-lg shadow-lg w-1/3 h-3/4">
         <div id="modalContent">
            <div class="flex justify-between items-center">
               <div class="flex gap-4">
                  <button data-modal-hide="default-modal" type="button">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                     </svg>
                  </button>
                  <h2 class="font-bold text-xl">New Message</h2>
               </div>
            </div>
            <div class="flex items-center gap-3 mt-5">
               <img src="<?= ASSETS ?>/search.png" class="h-5" alt="explore">
               <input list="usernames" name="username" id="username" placeholder="Search People" class="outline-none w-full">
               <datalist id="usernames">
                  <?php foreach ($usernames as $names): ?>
                     <option class="profile-name" value="<?= $names ?>">
                     <?php endforeach ?>
               </datalist>
               <div><button id="new-message-btn" class="bg-black text-white px-5 py-2 rounded-full hover:bg-gray-700">Next</button></div>
            </div>

         </div>
      </div>
   </div>

   <script src="/js/messageModal.js"></script>
   <script src="js/darkmode.js"></script>
   <script type="module" src="../script.js"></script>
   <script>
      if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
         document.documentElement.classList.add('dark');
      } else {
         document.documentElement.classList.remove('dark')
      }
   </script>
</body>

</html>