<?php
$title = "Inscription";
require_once 'layout/header.php';
require_once 'functions/getErrorMessage.php';

?>

<section class="mt-16 pt-24">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
      <img class="mr-3 rounded-full w-15 h-10"
        src="https://img.freepik.com/vecteurs-libre/restaurant-logo-modele_23-2150528914.jpg?w=740&t=st=1697895703~exp=1697896303~hmac=7dd9e081f40b9106ee43d9921b48aac52fe80923a8d34d98d7ccbcbf6fa04acd"
        alt="logo">
      Poké PARADISE
    </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
          Create your account
        </h1>
        <?php if (isset($_GET['error'])) { ?>
        <div
          class="flex items-center p-4 mb-4 text-sm text-red-900 border border-red-400 rounded-lg bg-red-50 dark:text-red-400"
          role="alert">
          <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div>
            <?php echo getErrorMessage(intval($_GET['error'])); ?>
          </div>
        </div>
        <?php } ?>
        <form class="space-y-4 md:space-y-6" method="POST" action="register_process.php" enctype="multipart/form-data">
          <div class="grid md:grid-cols-2 md:gap-6">
            <div>
              <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Votre nom</label>
              <input type="text" name="first_name" id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nom..." required="">
            </div>
            <div>
              <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Votre prénom</label>
              <input type="text" name="last_name" id="last_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Prénom..." required="">
            </div>
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input type="email" name="email" id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="name@company.com" required="">
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required="">
          </div>
          <div>
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required="">
          </div>

          <div class="flex items-center justify-center w-full">
            <label for="dropzone-file"
              class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:border-gray-300">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                    upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
              </div>
              <input id="dropzone-file" type="file" class="hidden" name="profile_pic" />
            </label>
          </div>

          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" aria-describedby="terms" type="checkbox"
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300 dark:focus:ring-green-600 dark:ring-offset-gray-800"
                required="">
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                  class="font-medium text-green-600 hover:underline dark:text-green-700" href="#">Terms and
                  Conditions</a></label>
            </div>
          </div>
          <button type="submit" name="bouton"
            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-700 dark:hover:bg-green-700 dark:focus:ring-green-800">Create
            an account</button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account? <a href="login.php"
              class="font-medium text-green-700 hover:underline dark:text-green-700">Login here</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>