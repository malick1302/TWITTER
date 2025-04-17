<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <link rel="stylesheet" href="<?= SRC ?>/output.css">
</head>

<body class=" min-h-screen w-full bg-white dark:bg-slate-950 ">
    <?php
    require_once VIEW . "/components/aside.php";
    ?>
    <button id="refresh_button" type='button'
        class='hidden absolute top-4 left-2/4 py-2.5 pl-4 group pr-3.5 text-sm bg-indigo-500 text-white rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 flex gap-2 items-center hover:bg-indigo-700'>
        Refresh
        <svg class="transition-all duration-700 group-hover:animate-spin"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none">
            <path
                d="M18.6793 11.776C18.6793 12.2186 19.0381 12.5774 19.4807 12.5774C19.9233 12.5774 20.2821 12.2186 20.2821 11.776H18.6793ZM3.75105 8.55933C3.58499 8.96958 3.78294 9.43677 4.19319 9.60283C4.60344 9.7689 5.07063 9.57095 5.23669 9.1607L3.75105 8.55933ZM5.3214 12.224C5.3214 11.7814 4.96261 11.4226 4.52003 11.4226C4.07744 11.4226 3.71866 11.7814 3.71866 12.224H5.3214ZM20.2497 15.4407C20.4157 15.0304 20.2178 14.5632 19.8075 14.3972C19.3973 14.2311 18.9301 14.4291 18.764 14.8393L20.2497 15.4407ZM19.5043 11.7988L19.0401 12.452C19.4009 12.7084 19.9012 12.6237 20.1575 12.2629L19.5043 11.7988ZM17.0297 9.0573C16.669 8.80094 16.1687 8.88558 15.9123 9.24636C15.656 9.60713 15.7406 10.1074 16.1014 10.3638L17.0297 9.0573ZM22.2457 9.32421C22.5021 8.96344 22.4175 8.46315 22.0567 8.20679C21.6959 7.95042 21.1956 8.03507 20.9393 8.39584L22.2457 9.32421ZM4.49642 12.2012L4.9606 11.548C4.59983 11.2916 4.09954 11.3763 3.84318 11.7371L4.49642 12.2012ZM6.97097 14.9427C7.33174 15.1991 7.83203 15.1144 8.08839 14.7536C8.34475 14.3929 8.26011 13.8926 7.89933 13.6362L6.97097 14.9427ZM1.75496 14.6758C1.4986 15.0366 1.58324 15.5369 1.94402 15.7932C2.30479 16.0496 2.80508 15.9649 3.06145 15.6042L1.75496 14.6758ZM11.7047 4.80137C15.5567 4.80137 18.6793 7.92403 18.6793 11.776H20.2821C20.2821 7.03886 16.4418 3.19863 11.7047 3.19863V4.80137ZM5.23669 9.1607C6.27196 6.60316 8.77885 4.80137 11.7047 4.80137V3.19863C8.10371 3.19863 5.02289 5.41737 3.75105 8.55933L5.23669 9.1607ZM12.2961 19.1986C8.44406 19.1986 5.3214 16.076 5.3214 12.224H3.71866C3.71866 16.9611 7.55889 20.8014 12.2961 20.8014V19.1986ZM18.764 14.8393C17.7288 17.3968 15.2219 19.1986 12.2961 19.1986V20.8014C15.897 20.8014 18.9778 18.5826 20.2497 15.4407L18.764 14.8393ZM19.9685 11.1455L17.0297 9.0573L16.1014 10.3638L19.0401 12.452L19.9685 11.1455ZM20.9393 8.39584L18.851 11.3346L20.1575 12.2629L22.2457 9.32421L20.9393 8.39584ZM4.03224 12.8545L6.97097 14.9427L7.89933 13.6362L4.9606 11.548L4.03224 12.8545ZM3.06145 15.6042L5.14966 12.6654L3.84318 11.7371L1.75496 14.6758L3.06145 15.6042Z"
                fill="currentcolor" />
        </svg>
    </button>
    <div class="lg:w-2/4 m-auto md:w-4/4 ">
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
            <div class="tweets">
                <?php foreach ($tweets as $tweet): ?>
                    <div id="<?= $tweet["id"] ?>" class="tweet flex flex-col items-start p-2 border border-black  bg-white  dark:bg-slate-950 dark:border dark:border-slate-900 m-0 ml-10 mr-10 rounded-none dark:text-teal-50">
                        <div class="flex gap-2">
                            <?php if (key_exists($tweet["username"], $existing_usernames[0])): ?>
                                <img src="<?= $existing_usernames[0][$tweet["username"]] ?>" class="w-10 h-10 rounded-full object-cover" alt="">
                            <?php else: ?>
                                <img src="https://www.braunability.eu/contentassets/51612d8e560f481ebbb946fb8c279605/conditions_shortstature_770x448.jpg" class="w-10 h-10 rounded-full object-cover" alt="">
                            <?php endif ?>
                            <p><?= $tweet["lastname"] ?> <?= $tweet["firstname"] ?></p>
                            <a class="text-gray-600 italic" href="?page=profile/<?= $tweet["username"] ?>">@<?= $tweet["username"] ?></a>
                            <span class="opacity-50"><?= $tweet["creation_date"] ?></span>
                        </div>
                        <div class="ml-10">
                            <?php

                            $words_array = explode(" ", $tweet["content"]);

                            foreach ($words_array as $word) {

                                if ($word[0] == "@") {

                                    $wordIndex = array_search($word, $words_array);

                                    $username_sanitize = ltrim($word, '@');

                                    if (in_array($username_sanitize, $existing_usernames[1])) {

                                        $words_array[$wordIndex] = "<a class='font-medium text-blue-600 dark:text-blue-500 hover:underline' href='/?page=profile/$username_sanitize'>$word</a>";
                                    }
                                } elseif ($word[0] == "#") {

                                    $wordIndex = array_search($word, $words_array);

                                    $hastag_sanitize = ltrim($word, '#');

                                    $words_array[$wordIndex] = "<a class='font-medium text-blue-600 dark:text-blue-500 hover:underline' href='/?page=search/$hastag_sanitize'>$word</a>";
                                }
                            }

                            echo join(" ", $words_array);
                            ?>
                        </div>
                        <div id="social_buttons" class="flex items-center justify-around w-full mt-[15px]">
                            <div class="flex items-center group hover:text-blue-600 hover:cursor-pointer comment_button">
                                <span class="p-[7px] group-hover:bg-blue-500 rounded-full group-hover:bg-opacity-25">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                    </svg>
                                </span>
                                <span class="ml-[-5px]">200k</span>
                            </div>
                            <div class="flex items-center group hover:text-green-600 hover:cursor-pointer share_button" id="">
                                <span class="p-[7px] group-hover:bg-green-500 group-hover:bg-opacity-25 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                    </svg>
                                </span>
                                <span class="ml-[-5px]">80k</span>
                            </div>
                            <div class="flex items-center group hover:text-red-600 hover:cursor-pointer like_button">
                                <span class="p-[7px] group-hover:bg-red-500 group-hover:bg-opacity-25 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </span>
                                <span id="tweet_likes" class="ml-[-5px]"><?= $this->home->getTweetLikes($tweet["id"])["likes_number"] ?></span>
                            </div>
                            <!-- <div class="flex items-center group hover:text-blue-600 hover:cursor-pointer stats_buton">
<span class="p-[7px] group-hover:bg-blue-500 group-hover:bg-opacity-25 rounded-full">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
</svg>
</span>
<span class="ml-[-5px]">45k</span>
</div> -->
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
<script type="module" src="../script.js"></script>
<script src="js/modal.js"></script>
<script src="js/autoresizeReply.js"></script>
<script src="js/messageModal.js"></script>
<script src="js/searchUserHome.js"></script>
<script src="js/darkmode.js"></script>

</html>