<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Feed</title>
   <link rel="stylesheet" href="<?= SRC ?>/output.css">
   <link rel="stylesheet" href="../main.css">

</head>
<body class=" min-h-screen w-full bg-white dark:bg-slate-950"></body>
<?php
require_once VIEW . "/components/aside.php" 
   ?>
   <button id="refresh_button" type='button'
      class='hidden absolute top-4 left-2/4 py-2.5 pl-4 group pr-3.5 text-sm bg-indigo-500 text-white rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 flex gap-2 items-center hover:bg-indigo-700'>
      Refresh
      <svg class="transition-all duration-700 group-hover:animate-spin" xmlns="http://www.w3.org/2000/svg" width="24"
         height="24" viewBox="0 0 24 24" fill="none">
         <path
            d="M18.6793 11.776C18.6793 12.2186 19.0381 12.5774 19.4807 12.5774C19.9233 12.5774 20.2821 12.2186 20.2821 11.776H18.6793ZM3.75105 8.55933C3.58499 8.96958 3.78294 9.43677 4.19319 9.60283C4.60344 9.7689 5.07063 9.57095 5.23669 9.1607L3.75105 8.55933ZM5.3214 12.224C5.3214 11.7814 4.96261 11.4226 4.52003 11.4226C4.07744 11.4226 3.71866 11.7814 3.71866 12.224H5.3214ZM20.2497 15.4407C20.4157 15.0304 20.2178 14.5632 19.8075 14.3972C19.3973 14.2311 18.9301 14.4291 18.764 14.8393L20.2497 15.4407ZM19.5043 11.7988L19.0401 12.452C19.4009 12.7084 19.9012 12.6237 20.1575 12.2629L19.5043 11.7988ZM17.0297 9.0573C16.669 8.80094 16.1687 8.88558 15.9123 9.24636C15.656 9.60713 15.7406 10.1074 16.1014 10.3638L17.0297 9.0573ZM22.2457 9.32421C22.5021 8.96344 22.4175 8.46315 22.0567 8.20679C21.6959 7.95042 21.1956 8.03507 20.9393 8.39584L22.2457 9.32421ZM4.49642 12.2012L4.9606 11.548C4.59983 11.2916 4.09954 11.3763 3.84318 11.7371L4.49642 12.2012ZM6.97097 14.9427C7.33174 15.1991 7.83203 15.1144 8.08839 14.7536C8.34475 14.3929 8.26011 13.8926 7.89933 13.6362L6.97097 14.9427ZM1.75496 14.6758C1.4986 15.0366 1.58324 15.5369 1.94402 15.7932C2.30479 16.0496 2.80508 15.9649 3.06145 15.6042L1.75496 14.6758ZM11.7047 4.80137C15.5567 4.80137 18.6793 7.92403 18.6793 11.776H20.2821C20.2821 7.03886 16.4418 3.19863 11.7047 3.19863V4.80137ZM5.23669 9.1607C6.27196 6.60316 8.77885 4.80137 11.7047 4.80137V3.19863C8.10371 3.19863 5.02289 5.41737 3.75105 8.55933L5.23669 9.1607ZM12.2961 19.1986C8.44406 19.1986 5.3214 16.076 5.3214 12.224H3.71866C3.71866 16.9611 7.55889 20.8014 12.2961 20.8014V19.1986ZM18.764 14.8393C17.7288 17.3968 15.2219 19.1986 12.2961 19.1986V20.8014C15.897 20.8014 18.9778 18.5826 20.2497 15.4407L18.764 14.8393ZM19.9685 11.1455L17.0297 9.0573L16.1014 10.3638L19.0401 12.452L19.9685 11.1455ZM20.9393 8.39584L18.851 11.3346L20.1575 12.2629L22.2457 9.32421L20.9393 8.39584ZM4.03224 12.8545L6.97097 14.9427L7.89933 13.6362L4.9606 11.548L4.03224 12.8545ZM3.06145 15.6042L5.14966 12.6654L3.84318 11.7371L1.75496 14.6758L3.06145 15.6042Z"
            fill="currentcolor" />
      </svg>
   </button>
   <div class="lg:w-2/4 m-auto">
      <div class="">

         <div class="flex justify-around w-full m-atuo bg-white dark:bg-slate-950 cursor-pointer">

            <span
               class="hover:bg-gray-400 w-full text-center ml-10  dark:bg-slate-950 dark:hover:bg-slate-900 dark:focus:ring-teal-150 border border-slate-900 dark:text-teal-50 p-4 ">Following</span>
            <span
               class="hover:bg-gray-400 w-full text-center  mr-10 dark:bg-slate-950 dark:hover:bg-slate-900 dark:focus:ring-teal-150 border border-slate-900 dark:text-teal-50 p-4">For
               You</span>
         </div>
         <div class="col-span-2 row-start-2 mr-10 ml-10">
            <form enctype="multipart/form-data" action="?page=post" method="post"
               class="space-y-4 border border-slate-900" onsubmit="return getContent()">
               <label class="dark:text-teal-50 font-bold" for="post-content">What is happening</label>
               <div contenteditable="true" placeholder="What is happening" class="border w-full outline-none min-h-20 dark:bg-slate-950 dark:text-teal-50" id="post-content-home"
               maxlength="140"></div>
               <textarea class="w-full outline-none mt-15 dark:bg-slate-950 dark:text-teal-50 ml-4" name="post-content" 
               id="text-area-content-home" style="display: none;" maxlength="140" placeholder="What is happening"></textarea>
               <div class="flex justify-end w-full">
                  <input type="submit"
                     class="bg-black text-white px-4 py-1 rounded-full font-bold dark:bg-white dark:text-black m-3 cursor-pointer"
                     value="Post">
               </div>
            </form>
         </div>
      </div>
      <div class="timeline flex flex-col items-stretch justify-center ">
         <div
            class="comment_modal fixed w-full h-full bg-gray-900/50 top-0 translate-x-[-50%] left-2/4 flex flex-col translate-y-[-100%]">
            <div class="bg-white w-full lg:w-2/4 flex flex-col justify-center itmes-center mx-auto mt-20 rounded-2xl p-4 dark:bg-slate-900 dark:text-white space-y-2">
               <span class="close_comment_modal hover:text-gray-700 text-black hover:cursor-pointer ml-2 dark:text-white dark:hover:text-teal-50">X</span>
               <div class="flex space-x-2 items-center">
                  <img src="" alt="tweet user photo" class="tweet_user_image w-10 h-10 rounded-full object-cover">
                  <p class="tweet_fullname-comment"></p>
                  <p class="tweet_username-comment text-gray-500 italic"></p>
                  <span class="tweet_date-comment"></span>
               </div>
               <p class="tweet_content-comment"></p>
               <div class="border-l-2 border-gray-400 h-15 ml-4 mb-1 flex items-center gap-1">
                  <p class="text-gray-500 ml-3">Replying to</p>
                  <span class="tweet_username2-comment text-blue-500 italic"></span>
               </div>
               <div class="flex flex-col">
                  <pre class="border-l-2 border-gray-400 h-5 justify-center ml-4 mb-1">
                  <? print_r($actualUserData) ?>
               </pre>
                  <div class="flex space-x-2 w-full">
                     <img alt="actual user photo" src="<?= $actualUserData[0]["picture"] ?>"
                        class="rounded-full w-10 h-10">
                     <form enctype="multipart/form-data" action="?page=post" action="post">
                        <textarea name="post-comment" id="reply" cols="30" maxlength="140" placeholder="Post your reply"
                           class="outline-none"></textarea>
                        <button id="submit_comment" type="submit"
                           class="bg-black text-white px-4 py-1.5 right-0 rounded-full">Post</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <?php
require_once VIEW . "/components/skeleton.php" 
   ?>
         <div class="tweets"><!--injected by js--></div>
      </div>
   </div>
<script type="module" src="../script.js"></script>
<script src="js/modal.js"></script>
<script src="js/autoresizeReply.js"></script>
<script src="js/messageModal.js"></script>
<script src="js/searchUserHome.js"></script>
<script src="js/darkmode.js"></script>
</body>

</html>