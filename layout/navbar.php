<?php
require_once __DIR__ . '/../classes/MenuItem.php';

$menuItems = [
  new MenuItem('index.php', 'Home'),
  new MenuItem('menu.php', 'Menu'),
  new MenuItem('cart_shopping.php', 'Panier')
];

?>


<nav class="bg-white fixed w-full z-20 top-0 left-0 border-b border-gray-200 shadow-lg  ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="../index.php" class="flex items-center">
      <img
        src="https://img.freepik.com/vecteurs-libre/restaurant-logo-modele_23-2150528914.jpg?w=740&t=st=1697895703~exp=1697896303~hmac=7dd9e081f40b9106ee43d9921b48aac52fe80923a8d34d98d7ccbcbf6fa04acd"
        class="mr-3 rounded-full w-15 h-10" alt="Flowbite Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap">Poké PARADISE</span>
    </a>
    <div class="flex md:order-2">
      <?php if (!isset($_SESSION['userInfos'])) { ?>
        <div class="text-center mx-4">
          <a href="login.php"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-700 dark:hover:bg-green-900 dark:focus:ring-green-800 items-center">
            Connexion
          </a>
        </div>
        <div class="text-center">
          <a href="../register.php"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-700 dark:hover:bg-green-900 dark:focus:ring-green-800 items-center">
            Inscription
          </a>
        </div>

      <?php } else { ?>
        <div class="flex items-center md:order-2 pl-5">
          <button type="button"
            class="flex text-sm mr-3 bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 mr-8"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-12 h-12 rounded-full"
              src="../uploads/profile_pictures/<?php echo $_SESSION['userInfos']['profile_picture']; ?>" alt="user photo">
          </button>
          <div class="text-center ml-5">
            <a href="/logout.php"
              class="focus:outline-none text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-700 dark:hover:bg-green-900 dark:focus:ring-green-800 items-center">
              Log out
            </a>
          </div>
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:divide-gray-600"
            id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900">
                <?php echo $_SESSION['userInfos']['first_name'] . ' ' . $_SESSION['userInfos']['last_name']; ?>
              </span>
              <span class="block text-sm  text-gray-700 truncate dark:text-gray-400">
                <?php echo $_SESSION['userInfos']['email']; ?>
              </span>
            </div>
          </div>
          <button data-collapse-toggle="navbar-user" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
      <?php } ?>
      <button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul
        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:border-gray-700">
        <?php foreach ($menuItems as $item) { ?>
          <li>
            <a href="<?php echo $item->getUrl(); ?>"
              class="block py-2 pl-3 pr-4 rounded md:p-0 <?php echo $item->getCssClasses(); ?>">
              <?php echo $item->getLabel(); ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>