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
    require_once VIEW . "/components/aside.php";
    ?>
    <main class="main-content flex flex-wrap border-x border-gray-700 lg:w-2/4 m-auto md:w-full h-auto min-h-[100vh] min mt-0 dark:bg-slate-950 justify-center">
        <div class="relative w-full">
            <img alt="banner picture" class="w-full h-70 object-cover" src="<?= $user_infos[0]['header'] ?>" >

            <img alt="profile picture"
                class="absolute w-45 h-45 rounded-full object-cover border-4 border-white left-5 bottom-0 transform translate-y-1/2 dark:hover:bg-teal-100"
                src="<?= $user_infos[0]['picture'] ?>" >
        </div>
        <?php if (md5($user_infos[0]['id'] . SALT_COOKIE) == $_COOKIE["user_id"]): ?>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="openModal block text-white hover:bg-blue-800 focus:ring-4
                  focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2.5 text-center
                   dark:focus:ring-blue-800 mr-2 ml-auto mt-3
                  bg-blue-300 object-contain dark:bg-slate-950 dark:border-2 dark:border-white dark:hover:bg-slate-900">Modification profil</button>
        <?php else: ?>
            <?php $hashed_follows = array();
            foreach ($user_follows as $follows) {
                array_push($hashed_follows, md5($follows . SALT_COOKIE));
            } ?>
            <?php if (in_array($_COOKIE["user_id"], $hashed_follows)): ?>
                <p id="follow-id" style="display:none"> <?= $user_infos[0]['id'] ?></p>
                <button id="follow-btn" status="false" type="button" class="block text-white hover:bg-blue-800 focus:ring-4
                  focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2.5 text-center
                   dark:focus:ring-blue-800 mr-2 ml-auto mt-3
                  bg-blue-300 object-contain dark:bg-slate-950 dark:border-2 dark:border-white dark:hover:bg-slate-900">Followed</button>
            <?php else: ?>
                <p id="follow-id" style="display:none"> <?= $user_infos[0]['id'] ?></p>
                <button id="follow-btn" status="false" type="button" class="block text-white hover:bg-blue-800 focus:ring-4
                  focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2.5 text-center
                   dark:focus:ring-blue-800 mr-2 ml-auto mt-3
                  bg-blue-300 object-contain dark:bg-slate-950 dark:border-2 dark:border-white dark:hover:bg-slate-900
                  ">Follow</button>
            <?php endif ?>
        <?php endif ?>
        <div class="flex w-full ml-5 mt-10 dark:text-teal-50">
            <div class="flex flex-col space-y-2">
                <div class="text-xl font-bold">
                    <p><?= $user_infos[0]['display_name'] ?></p>
                </div>
                <div class="text-sm text-gray-500 dark:text-teal-50">
                    <p>@<?= $user_infos[0]['username'] ?></p>
                </div>
                <div class="flex space-x-2 dark:text-teal-50">
                    <p><?= $user_infos[0]['city'] . " " . $user_infos[0]['country'] ?></p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>

                </div>
                <div class="dark:text-teal-50">
                    <p><?= $user_infos[0]['biography'] ?></p>
                </div>
                <div class="flex space-x-3 ">
                    <div class="flex gap-1">
                        <p id="follows" class="font-bold"><?= count($user_follows) ?></p>
                        <a href="?page=follow/<?= $user_infos[0]['username'] ?>/followers">Followers</a>
                    </div>
                    <div class="flex gap-1">
                        <p id="followings" class="font-bold"><?= count($user_followings) ?></p>
                        <a href="?page=follow/<?= $user_infos[0]['username'] ?>/followings">Followings</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:mt-3 border-b border-gray-700 flex text-center w-full shadow-x1">
            <div class="w-full hover:bg-gray-300 p-3 shadow-x1 tab-button dark:hover:bg-slate-900" data-tab="tab-1">

                <span class="font-semibold cursor-pointer bg-gradient-to-r from-fuchsia-700 to-rose-600 bg-clip-text text-transparent dark:text-teal-50">Posts</span>
            </div>
            
            <div class="w-full hover:bg-gray-300 p-3 shadow-x1 tab-button dark:hover:bg-slate-900" data-tab="tab-2">
                <span class="font-semibold cursor-pointer bg-gradient-to-r from-fuchsia-700 to-rose-600 bg-clip-text text-transparent dark:text-teal-50">Replies</span>
            </div>
            <div class="w-full hover:bg-gray-300 p-3 shadow-x1 tab-button dark:hover:bg-slate-900" data-tab="tab-3">
                <span class="font-semibold cursor-pointer bg-gradient-to-r from-fuchsia-700 to-rose-600 bg-clip-text text-transparent dark:text-teal-50">Likes</span>

            </div>
            <div class="w-full hover:bg-gray-300 p-3 shadow-x1 tab-button dark:hover:bg-slate-900" data-tab="tab-4">
                <span class="font-semibold cursor-pointer bg-gradient-to-r from-fuchsia-700 to-rose-600 bg-clip-text text-transparent dark:text-teal-50">Gallery</span>
            </div>
        </div>
        <!-- Panels Section -->
        <div class="tab-panels mt-4 w-full">
        <?php
require_once VIEW . "/components/skeleton.php" 
   ?>
            <div id="tab-1" class="tab-panel hidden w-full">
            <div class="container mx-auto px-4 py-8">
                    </div>
                    
            </div>
            <div id="tab-2" class="tab-panel hidden w-full">
            <div class="container mx-auto px-4 py-8">
                    
                    </div>
            </div>
            <div id="tab-3" class="tab-panel hidden w-full">
                    <div class="container mx-auto px-4 py-8">
                    
                    </div>
            </div>
        </div>
        <div id="tab-4" class="tab-panel hidden w-full">
            <div>
                <div class="container mx-auto px-4 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Large item -->
                        <div
                            class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxuYXR1cmV8ZW58MHwwfHx8MTcyMTA0MjYwMXww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Nature" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <!-- Two small items -->
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHxmb29kfGVufDB8MHx8fDE3MjEwNDI2MTR8MA&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Food" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHx0ZWNobm9sb2d5fGVufDB8MHx8fDE3MjEwNDI2Mjh8MA&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Technology" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <!-- Three medium items -->
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1503220317375-aaad61436b1b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHx0cmF2ZWx8ZW58MHwwfHx8MTcyMTA0MjY0MXww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Travel" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxhcnR8ZW58MHwwfHx8MTcyMTA0MjY5Nnww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Art" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <!-- bottom cards -->
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHxzd2ltbWluZ3xlbnwwfDB8fHwxNzIxMDQzMjkxfDA&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Sport" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1611195974226-a6a9be9dd763?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMnx8Y2hlc3N8ZW58MHwwfHx8MTcyMTA0MzI0Nnww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Sport" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1553778263-73a83bab9b0c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxmb290YmFsbHxlbnwwfDB8fHwxNzIxMDQzMjExfDA&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Sport" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                            <img src="https://images.unsplash.com/photo-1624526267942-ab0ff8a3e972?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw3fHxjcmlja2V0fGVufDB8MHx8fDE3MjEwNDMxNTh8MA&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Sport" class="w-full h-48 object-cover">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- Content Modal -->
        <div id="modification-modal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 flex justify-center items-center w-full h-full bg-gray-300/50 ">
            <div class="bg-white w-2/4 m-auto rounded-lg h-4/5 overflow-y-auto dark:bg-slate-900">
                <div class="flex flex-col mt-10 dark:bg-slate-900">
                    <form enctype="multipart/form-data" action="?page=update" method="post" class="space-y-4">
                        <div class="relative w-full">
                            <!-- Banner Picture Input -->
                            <label for="banner-picture"
                                class="absolute inset-0 flex justify-center items-center bg-black/50 cursor-pointer w-full h-70">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 absolute flex justify-center">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                </svg>
                                <input name="banner" type="file" id="banner-picture" onchange="displayBanner()" style="color:transparent" >
                            </label>

                            <img alt="banner picture" class="w-full h-70 object-cover" id="outpit"
                                src="<?= $user_infos[0]['header'] ?>">

                            <!-- Profile Picture Input -->
                            <label for="profile-picture"
                                class="absolute bottom-0 left-5 flex justify-center items-center bg-black/50 rounded-full z-20 cursor-pointer w-35 h-35 transform translate-y-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 absolute flex justify-center">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                </svg>
                                <input name="profile-picture" type="file" id="profile-picture" onchange="displayPicture()" style="color:transparent" >
                            </label>
                            <img alt="profile picture"
                                class="absolute w-35 h-35 rounded-full object-cover border-4 border-white left-5 bottom-0 transform translate-y-1/2"
                                src="<?= $user_infos[0]['picture'] ?>" id="output">
                        </div>
                        <div class="m-5 mt-20">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-teal-50">Name</label>
                                <input name="update[display_name]" type="text" id="name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"
                                    value="<?= $user_infos[0]['display_name'] ?>">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-teal-50">Email</label>
                                <input name="update[email]" type="email" id="email"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"
                                    value="<?= $user_infos[0]['email'] ?>">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-teal-50">Phone</label>
                                <input name="update[phone]" type="tel" id="phone"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"
                                    value="<?= $user_infos[0]['phone'] ?>">

                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-teal-50">Location</label>
                                <?php if ($user_infos[0]['city']): ?>

                                    <input name="update[city]" type="text" id="location"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"
                                        value="<?= $user_infos[0]['city'] ?>">
                                <?php else: ?>
                                    <input name="update[city]" type="text" id="location"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"
                                        placeholder="Enter your city">
                                <?php endif ?>
                            </div>

                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-teal-50">Bio</label>
                                <?php if ($user_infos[0]['biography']): ?>
                                    <input name="update[biography]" type="text" id="bio"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"
                                        value="<?= $user_infos[0]['biography'] ?>">
                                <?php else: ?>
                                    <input name="update[biography]" type="text" id="bio"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 dark:text-teal-50"


                                        placeholder="I love rabbits!">
                                <?php endif ?>
                            </div>
                            <div class="p-4 md:p-5 space-y-4">
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 justify-center">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                        Save
                                    </button>
                                    <button type="button" data-modal-hide="modification-modal"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
        <div class="min-h-screen z-2"></div>
    </main>
    <script src="/js/modal.js"></script>
    <script type="module" src="../../js/follow.js"></script>
    <script src="../../js/tab.js"></script>
    <script type="module" src="../../script.js"></script>
    <script src="../../js/darkmode.js"></script>
</body>

</html>