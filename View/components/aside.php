<script>
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
<aside class="fixed left-0 top-0 p-4 w-1/4 h-screen hidden flex-col lg:flex space-y-4 justify-between bg-white dark:bg-slate-950">
   <div class="space-y-4 ml-20">
      <a href="?page=home"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
         </svg>
         <span class="text-xl font-bold lg:block">Home</span>
      </a>
      <a href="#"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
         </svg>
         <span class="text-xl font-bold lg:block">Explore</span>
      </a>
      <a href="#"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
         </svg>
         <span class="text-xl font-bold lg:block">Notifications</span>
      </a>
      <a href="?page=message"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
         </svg>
         <span class="text-xl font-bold  lg:block">Messages</span>
      </a>
      <a href="#"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
         </svg>
         <span class="text-xl font-bold  lg:block">Bookmarks</span>
      </a>
      <a href="?page=profile"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
         </svg>
         <span class="text-xl font-bold  lg:block">Profile</span>
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
 
      <!-- <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
         <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
         </svg>
         <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
         </svg>
      </button> -->
   </div>
 
 
   <div
      class="relative mt-auto ml-20 hover:bg-gray-600 dark:hover:bg-white dark:bg-teal-100 rounded-full py-2 flex items-center space-x-2 cursor-pointer openModal-logout">
      <img src="<?= $_COOKIE["picture"] ?>" class="h-6 ml-3" alt="profil pix">
      <div>
         <p><?= $_COOKIE["display_name"] ?></p>
         <p>@<?= $_COOKIE["username"] ?></p>
      </div>
      <div id="default-modal-logout" class="profileContainer hidden absolute bottom-full mb-2 left-0 bg-white shadow-md rounded-lg p-2 w-full hover:bg-gray-300 flex justify-between dark:hover:bg-slate-100">
         <button onclick="location.href='?page=logout'" class="outline-none">Logout @<?= $_COOKIE["username"] ?></button>
      </div>
   </div>
 
</aside>
<aside class="fixed right-0 top-0 p-4 w-1/4 h-screen  hidden flex-col lg:flex space-y-4  bg-white dark:bg-slate-950">
   <ul class="w-full">
      <li>
         <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
            <div class="grid place-items-center h-full w-12 text-gray-300">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
               </svg>
            </div>
            <form action="?page=search" method="POST">
               <input id="search-input" name="search" type="text" class="peer h-full w-full text-sm text-gray-700 pr-2"
                  placeholder="Search # or pseudo">
            </form>
         </div>
      </li>
      <li class="w-full">
         <ul id="searchList" class="p-1 hidden bg-gray-300 border rounded absolute w-80">
         </ul>
      </li>
   </ul>


   <div class="flex border-t border-gray-700 w-full max-sm:text-xl sm:text-2xl lg:text-2xl h-70 m-3 dark:text-teal-50 $">Top Tweet
   </div>
   <div class="flex border-t border-gray-700 w-full max-sm:text-xl sm:text-2xl lg:text-2xl m-3 dark:text-teal-50">Top Profile</div>
   <div class="max-w-sm mx-auto w-full">
      <div class="p-3 flex items-center justify-between border-t cursor-pointer hover:bg-gray-200 dark:hover:bg-slate-900">
         <div class="flex items-center ">
            <img class="rounded-full h-10 w-10" src="https://i.pravatar.cc/300"  alt="photo de profil">
            <div class="flex flex-col w-full">
               <div class="leading-snug text-sm text-gray-900 font-bold dark:text-teal-50">Jane doe</div>
               <div class="leading-snug text-xs text-gray-600 dark:text-teal-50">@jane</div>
            </div>
         </div>
         <button
            class="h-8 px-3 text-md font-bold text-blue-400 border border-blue-400 rounded-full hover:bg-blue-100 dark:bg-teal-50 dark:text-teal-950 dark:border-teal-800 dark:hover:bg-white">Follow</button>
      </div>
      <div class="p-3 flex items-center justify-between border-t cursor-pointer hover:bg-gray-200 dark:hover:bg-slate-900">
         <div class="flex items-center">
            <img class="rounded-full h-10 w-10" src="https://i.pravatar.cc/300"  alt="photo de profil">
            <div class="ml-2 flex flex-col">
               <div class="leading-snug text-sm text-gray-900 font-bold dark:text-teal-50">Luc patts</div>
               <div class="leading-snug text-xs text-gray-600 dark:text-teal-50">@luc</div>
            </div>
         </div>
         <button
            class="h-8 px-3 text-md font-bold text-blue-400 border border-blue-400 rounded-full hover:bg-blue-100 dark:bg-teal-50 dark:text-teal-950 dark:border-teal-800 dark:hover:bg-white">Follow</button>
      </div>
      <div class="p-3 flex items-center justify-between border-t cursor-pointer hover:bg-gray-200 dark:hover:bg-slate-900">
         <div class="flex items-center">
         <img class="rounded-full h-10 w-10" src="https://i.pravatar.cc/300" alt="photo de profil">
         <div class="ml-2 flex flex-col ">
               <div class="leading-snug text-sm text-gray-900 font-bold dark:text-teal-50">Paris</div>
               <div class="leading-snug text-xs text-gray-600 dark:text-teal-50">@paris</div>
            </div>
         </div>
         <button
            class="h-8 px-3 text-md font-bold text-blue-400 border border-blue-400 rounded-full hover:bg-blue-100 dark:bg-teal-50 dark:text-teal-950 dark:border-teal-800 dark:hover:bg-white">Follow</button>
      </div>
   </div>
</aside>
<div class="lg:hidden fixed bottom-0 left-0 w-full bg-white dark:bg-slate-900 border-t border-gray-300 flex justify-around p-3">
<a href="?page=home"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
         </svg>
      </a>
      <a href="#"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
         </svg>
      </a>
      <a href="#"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
         </svg>
      </a>
      <a href="?page=message"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
         </svg>
      </a>
      <a href="#"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
         </svg>
      </a>
      <a href="?page=profile"
         class="flex items-center space-x-3 p-3 rounded-full hover:bg-rose-50 dark:hover:bg-slate-600 dark:text-teal-50 transition delay-150 duration-30 ease-in-out hover:-translate-y-1 hover:scale-110 ">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
               d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
         </svg>
      </a>
</div>

<div id="post-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900/50">

   <div class="relative w-2/4">
      <div class="flex items-center justify-between p-4 md:p-5 ">
         <div
            class="font-std mb-10 w-full rounded-2xl bg-white p-10 font-normal leading-relaxed text-gray-900 shadow-xl">
            <div class="flex flex-col">
               <form enctype="multipart/form-data" action="?page=post" method="post" class="space-y-4" onsubmit="return getContent()">
                  <div class="flex flex-col md:flex-row justify-between mb-5 items-start">
                     <h2 class="mb-5 text-4xl font-bold text-blue-900">New Post</h2>
                  </div>
                  <div class="flex flex-col justify-center">
                     <label for="post-content" id="post-content" class="block text-sm font-medium text-gray-700">Write your mind</label>
                     <div contenteditable="true" class="min-h-20 h-fit border border-black outline-none" id="post-content"
                        maxlength="140"></div>
                        <textarea name="post-content" style="display: none;" id="text-area-content"></textarea>
                  </div>
                  <div class="flex flex-col">
                     <label for="media-1">Media 1</label>
                     <input type="file" name="0" class="post-media" id="media-1">
                     <label for="media-2">Media 2</label>
                     <input type="file" name="1" class="post-media" id="media-2">
                     <label for="media-3">Media 3</label>
                     <input type="file" name="2" class="post-media" id="media-3">
                     <label for="media-4">Media 4</label>
                     <input type="file" name="3" class="post-media" id="media-4">
                  </div>
                  <div class="p-4 md:p-5 flex justify-center items-center space-x-3">
                     <button data-modal-hide="default-modal" type="submit"
                        class="bg-black text-white font-semibold py-2 px-5 rounded-full border-2 border-black hover:bg-blue-600 hover:border-blue-600">
                        Post
                     </button>
                     <button data-modal-hide="default-modal" type="button"
                        class="border-2 border-black font-semibold py-2 px-5 rounded-full hover:bg-red-700 hover:border-red-700 hover:text-white">
                        Annuler
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="js/searchUser.js"></script>
<script src="js/messageModal.js"></script>
