<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="<?= SRC ?>/output.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-teal-50 dark:bg-slate-950">
   <div class="relative w-full max-w-lg">
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
      <div class="w-full max-w-md bg-slate-950 shadow-lg shadow-blue-600 dark:bg-teal-50 rounded-lg p-6">
         <h1 class="text-3xl font-semibold text-center text-teal-50 dark:text-slate-950">Login</h1>
         <?php if ($logs_check < 0): ?>
            <p class="text-red-600">Wrong email or password</p>
         <?php endif ?>
         <form method="POST" class="mt-6 space-y-4">
            <div>
               <label for="email" class="block text-sm font-medium text-teal-50 dark:text-slate-950">Email</label>
               <input type="email" id="email" name="email" placeholder="Enter your email"
                  class="w-full px-4 py-3 bg-teal-50 border border:slate-950 rounded-md focus:ring-2 focus:ring-blue-600"
                  required>
            </div>
            <div>
               <label for="password" class="block text-sm font-medium text-teal-50 dark:text-slate-950">Password</label>
               <input type="password" id="password" name="password" placeholder="Enter your password"
                  class="w-full px-4 py-3 bg-teal-50 border border:slate-950 rounded-md focus:ring-2 focus:ring-green-500"
                  required>
            </div>
            <div class="flex justify-between items-center text-sm text-teal-50 dark:text-slate-950">
               <label class="flex items-center space-x-2">
                  <input type="checkbox" class="rounded">
                  <span>Remember Me</span>
               </label>
               <a href="#" class=" font-semibold hover:underline text-teal-50 dark:text-slate-950">Forgot password?</a>
            </div>
            <button type="submit"
               class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-800">
               Login
            </button>
            <p class="text-center text-sm text-teal-50 dark:text-slate-950">Don't have an account?
               <a href="?page=register" class="text-blue-600 font-semibold hover:underline">Sign Up here!</a>
            </p>
         </form>
      </div>
   </div>
   <script src="js/darkmode.js"></script>
   <script>
      if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
         document.documentElement.classList.add('dark');
      } else {
         document.documentElement.classList.remove('dark')
      }
   </script>
</body>

</html>