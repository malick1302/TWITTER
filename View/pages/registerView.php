<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSCRIPTION</title>
  <link rel="stylesheet" href="<?= SRC ?>/output.css">
</head>

<body>
  <div class=" bg-slate-50 min-h-sreen flex items-center justify-center px-16 dark:bg-slate-950">
    <div class="relative w-full max-w-lg">
      <!--circle moving in the back -->
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

      <div class="m-8 relative space-y-4">
        <div
          class="p-5 bg-slate-950 border border:bg-slate-900 dark:bg-teal-50 rounded-lg flex items-center justify-between space-x-8">
          <div class="flex-1">
            <div>
              <!-- <div class="flex-col justify-center font-[sans-serif] sm:h-screen p-4"> -->
              <div
                class="max-w-md w-full mx-auto border border-teal-50 rounded-2xl p-8 dark:bg-teal-50 dark:border-slate-950">
                <form method="post">
                  <div class="space-y-6">
                    <div>
                      <label class="text-teal-50 text-sm mb-2 block dark:text-gray-800">Nom</label>
                      <input required name="lastname" type="text"
                        class="text-gray-800 bg-teal-50 border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-600"
                        placeholder="Enter your Lastname">
                    </div>
                    <div>
                      <label class="text-teal-50 text-sm mb-2 block dark:text-gray-800">Prénom</label>
                      <input required name="firstname" type="text"
                        class="text-gray-800 bg-teal-50 border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-600"
                        placeholder="Enter your Firstname">
                    </div>
                    <div>
                      <label class="text-teal-50 text-sm mb-2 block dark:text-gray-800">Pseudo</label>
                      <input required name="username" type="text"
                        class="text-gray-800 bg-teal-50  border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-600">
                      <?php if ($register_check == 2): ?>
                        <p>Username already taken</p>
                      <?php endif ?>
                    </div>
                    <div>
                      <label class="text-teal-50 text-sm mb-2 block dark:text-gray-800">Mot de passe</label>
                      <input required name="password" type="password"
                        class="text-gray-800 bg-teal-50 border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-600"
                        placeholder="Enter password">
                    </div>
                    <div>
                      <label class="text-teal-50 text-sm mb-2 block dark:text-gray-800">Email</label>
                      <input required name="email" type="email"
                        class="text-gray-800 bg-teal-50 border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-600"
                        placeholder="ex : twitter@epitech.eu">
                      <?php if ($register_check == 1): ?>
                        <p>Email already taken</p>
                      <?php endif ?>
                    </div>
                    <div>
                      <label class="text-teal-50 text-sm mb-2 block dark:text-gray-800">Date de naissance</label>
                      <input required name="birthdate" type="date"
                        class="text-gray-800 bg-teal-50 border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-600">
                    </div>
                    <div>

                      <div class="flex items-center">
                        <input required id="remember-me" name="remember-me" type="checkbox"
                          class="h-4 w-4 shrink-0 text-green-300 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember-me" class="text-teal-50 dark:text-gray-800 ml-3 block text-sm">
                          J'accepte les
                          <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1">Termes
                            et Conditions</a>
                        </label>
                      </div>
                    </div>

                    <div class="!mt-8">
                      <button type="submit"
                        class="w-full py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-700 hover:text-slate-950 hover:bg-teal-50 dark:border dark:border:slate-950 dark:hover:bg-teal-50 dark:hover:text-slate-950 focus:outline-none">
                        Création du compte
                      </button>
                    </div>
                    <p class="text-teal-50 dark:text-gray-800 text-sm mt-6 text-center">
                      Vous avez deja un compte?
                      <a href="?page=login" class="text-blue-700 font-semibold hover:underline ml-1">Se
                        Connecter</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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