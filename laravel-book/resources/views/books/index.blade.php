<x-guest-layout>
    <div id="root">
        <nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap
            md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64
            z-10 py-4 px-6">
            <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap
                    items-center justify-between w-full mx-auto">
                <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none
                    bg-transparent rounded border border-solid border-transparent"
                        type="button"
                        onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="md:block text-left md:pb-2 text-warmGray-600 mr-0 inline-block whitespace-nowrap
                    text-sm uppercase font-bold p-4 px-0"
                   href="javascript:void(0)">
                    MongoDB & PHP
                </a>

                <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none
                        shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center
                        flex-1 rounded hidden"
                     id="example-collapse-sidebar">
                    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-warmGray-200">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <a class="md:block text-left md:pb-2 text-warmGray-600 mr-0 inline-block whitespace-nowrap
                                    text-sm uppercase font-bold p-4 px-0"
                                   href="javascript:void(0)">
                                    MongoDB & PHP
                                </a>
                            </div>
                            <div class="w-6/12 flex justify-end">
                                <button
                                    type="button"
                                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none
                                            bg-transparent rounded border border-solid border-transparent"
                                    onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                        <li class="items-center">
                            <a class="text-teal-500 hover:text-teal-600 text-xs uppercase py-3 font-bold block"
                               href="index.php">
                                <i class="fas fa-tv opacity-75 mr-2 text-sm"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="items-center">
                            <a class="text-warmGray-700 hover:text-warmGray-500 text-xs uppercase py-3 font-bold block"
                               href="#/books"> <i
                                    class="fas fa-newspaper text-warmGray-400 mr-2 text-sm"></i>
                                Books
                            </a>
                        </li>
                        <li class="items-center">
                            <a class="text-warmGray-700 hover:text-warmGray-500 text-xs uppercase py-3 font-bold block"
                               href="#/other">
                                <i class="fas fa-info-circle text-warmGray-400 mr-2 text-sm"></i>
                                Another Option
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="relative md:ml-64 bg-warmGray-50">
            <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap
                    md:justify-start flex items-center p-4">
                <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4 pt-3">
                    <a class="text-white uppercase hidden lg:inline-block font-semibold text-3xl"
                       href="./index.php">
                        Dashboard
                    </a>
                </div>
            </nav>
            <!-- Header -->
            <div class="relative bg-teal-600 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div>
                        <!-- Card stats -->
                        <div class="flex flex-wrap">

                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-warmGray-400 uppercase font-bold text-xs">
                                                    Books
                                                </h5>
                                                <span class="font-semibold text-xl text-warmGray-700">
                                                <?= $bookCount ?? '-' ?>
                                            </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                                    <i class="fas fa-2x fa-book"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-warmGray-400 uppercase font-bold text-xs">
                                                    Categories
                                                </h5>
                                                <span class="font-semibold text-xl text-warmGray-700">
                                                924
                                            </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                                                    <i class="fas fa-2x fa-cat"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-warmGray-400 uppercase font-bold text-xs">
                                                    Users
                                                </h5>
                                                <span class="font-semibold text-xl text-warmGray-700">
                                                2,356
                                            </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                                                    <i class="fas fa-2x fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 md:px-10 mx-auto w-full -m-24 flex flex-col min-h-screen">
                <div class="flex flex-wrap flex-grow">
                    <div class="flex flex-wrap mt-4">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full
                                    mb-6 shadow-lg rounded">
                                <div class="rounded-t mb-0 px-4 py-3 border-0  bg-warmGray-700">
                                    <div class="flex flex-wrap items-center">
                                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                            <h3 class="font-bold text-base text-warmGray-200
                                                   text-2xl">
                                                Books
                                            </h3>
                                        </div>
                                        <p><a href="create.php"
                                              class='cursor-pointer bg-green-600 text-white
                                                     active:bg-green-400
                                                     font-bold uppercase px-3 py-1 rounded outline-none
                                                     hover:bg-green-900
                                                     transition-all duration-500
                                                     focus:outline-none mr-1 mb-1'>
                                                Add Book
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <!-- Code block starts -->
                                <?php
                                if (isset($messages) && count($messages)>0){
                                ?>
                                <div class="flex items-center justify-center p-4">
                                    <div role="alert" id="alert" class="transition duration-150 ease-in-out w-full lg:w-11/12 mx-auto bg-white dark:bg-gray-800 shadow rounded flex flex-col items-center md:flex-row py-4 md:py-0 justify-between">
                                        <div class="flex flex-col items-center md:flex-row">

                                            <div class="mr-3 p-4 bg-<?=$colour?>-600 rounded md:rounded-tr-none
                                                    md:rounded-br-none text-white">
                                                <i class="fa <?=$symbol?>"></i>
                                            </div>
                                            <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-100 mt-2
                                                    md:my-0 uppercase">
                                                <?=$type?>
                                            </p>
                                            <div class="h-1 w-1 bg-gray-300 dark:bg-gray-700 rounded-full mr-2 hidden xl:block"></div>
                                            <p class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">
                                                <?=$message?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Code block ends -->
                                <?php
                                unset($_SESSION['messages']);
                                }
                                ?>

                                <div class="block w-max overflow-x-auto">
                                    <!-- Books table -->
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead class="border-warmGray-200 border-b">
                                        <tr>
                                            <th class="px-6 bg-warmGray-200 text-warmGray-500
                                        align-middle border border-solid border-warmGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                <i class="fas fa-book-dead text-warmGray-700 mr-4"></i>
                                                Title
                                            </th>
                                            <th class="px-6 bg-warmGray-200 text-warmGray-500
                                        align-middle border border-solid border-warmGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                <i class="fas fa-user-alt text-warmGray-700 mr-4"></i>
                                                Author(s)
                                            </th>
                                            <th class="px-6 bg-warmGray-200 text-warmGray-500
                                        align-middle border border-solid border-warmGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                <i class="fas fa-calendar text-warmGray-700 mr-4"></i>
                                                Year
                                            </th>
                                            <th class="px-6 bg-warmGray-200 text-warmGray-500
                                        align-middle border border-solid border-warmGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                <i class="fas fa-barcode text-warmGray-700 mr-4"></i>
                                                ISBN
                                            </th>
                                            <th class="px-6 bg-warmGray-200 text-warmGray-500
                                        align-middle border border-solid border-warmGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                <i class="fas fa-wrench text-red-500 mr-4"></i>
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach (\App\Models\Book::all() as $book) {
                                        ?>
                                        <tr class="border-warmGray-200 border-b">
                                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-left">
                                                <?= $book->name ?? "-" ?>
                                            </th>
                                            <td class="border-t-0 px-6 align-middle text-sm border-l-0 border-r-0 whitespace-nowrap p-4">
                                                <?php
                                                // if authors, display each one
                                                if (isset($book->author)) {
                                                    foreach ($book->author as $author) {
                                                        $name = $author->name;
                                                        echo $name."<br>";
                                                    }
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4">
                                                <?= $book->year ?? '-' ?>
                                            </td>
                                            <td class="border-t-0 px-6 align-middle text-sm border-l-0 border-r-0 whitespace-nowrap p-4">
                                                ISBN-10: <?= $book->isbn_10 ?? '-' ?>
                                                <br>
                                                ISBN-13: <?= $book->isbn_13 ?? '-' ?>
                                            </td>
                                            <td>
                                                <a href="update.php?id=<?=$book->_id?>"
                                                   class='cursor-pointer bg-indigo-500 text-white active:bg-indigo-600
                                                            text-xs font-bold uppercase px-6 py-1 rounded outline-none
                                                            hover:bg-indigo-900
                                                            transition-all duration-500
                                                            focus:outline-none mr-1 mb-1'>
                                                    Edit
                                                </a>
                                                <a href="delete.php?id=<?=$book->_id?>"
                                                   class='cursor-pointer bg-red-500 text-white active:bg-red-600
                                                            text-xs font-bold uppercase px-3 py-1 rounded outline-none
                                                            hover:bg-red-900
                                                            transition-all duration-500
                                                            focus:outline-none mr-1 mb-1'>
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="block py-4 ">
                    <div class="container mx-auto px-4">
                        <hr class="mb-4 border-b-1 border-warmGray-200"/>
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-4/12 px-4">
                                <div class="text-sm text-warmGray-500 font-semibold py-1">
                                    Copyright © <span
                                        id="javascript-date"></span>
                                    <a href="#"
                                       class="text-warmGray-500 hover:text-warmGray-700 text-sm font-semibold py-1">
                                        Adrian Gould & YOUR NAME HERE
                                    </a>
                                </div>
                            </div>
                            <div class="w-full md:w-8/12 px-4">
                                <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                                    <li>
                                        <a href="https://www.creative-tim.com"
                                           class="text-warmGray-600 hover:text-warmGray-700 text-sm font-semibold block py-1 px-3">
                                            Layout based on one from
                                            Creative Tim
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/creativetimofficial/tailwind-starter-kit/blob/main/LICENSE.md"
                                           class="text-warmGray-600 hover:text-warmGray-700 text-sm font-semibold block py-1 px-3">
                                            MIT License
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</x-guest-layout>
