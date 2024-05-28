<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="img/aidlogo.png" />
    <script src="https://unpkg.com/feather-icons"></script>

</head>

<body id="top">
    <!-- loader -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>


    <header class="border-b-4 border-blue-500">
        <?php
        include("dbconnect.php");
        session_start();
        $sql = "SELECT * FROM members WHERE member_id = {$_SESSION['member_id']}"; // Assuming you want data for a specific customer ID

        $result = $conn->query($sql);

        // Check if there is a result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $member_name = $row["member_name"];
                $member_lastname = $row["member_lastname"];
                $member_mail = $row["member_mail"];
                $member_phone = $row["member_phone"];
                $member_address = $row["member_address"];

                $member_birthdate = date("d F, Y", strtotime($row["member_birthdate"]));

                $member_date = date("F d, Y", strtotime($row["member_date"]));
            }
        } else {
            echo "No data found in the database.";
        }

        // Close the connection

        ?>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="indexpage.php" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">HEMAY NGO
                    </a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="indexpage.php">Home</a>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }" style="z-index: 1000;">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Donation</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="makedonation.php">Make Donation</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="donations.php">Donations</a>
                            </div>
                        </div>
                    </div>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }" style="z-index: 900;">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Volunteer</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="volunteerprofile.php">Volunteer Profile</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="volunteerform.php">Be Volunteer</a>
                            </div>
                        </div>
                    </div>

                    <span class="px-4 py-2 mt-2 text-sm font-semibold text-blue-700 bg-gray-200 rounded-lg dark-mode:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline-block align-text-top h-5 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zm8 9a3 3 0 100-6 3 3 0 000 6zm-3 4a6 6 0 016 0H9z"></path>
                        </svg>
                        <?php echo $member_name . ' ' . $member_lastname; ?>
                    </span>
                    <a class=" px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent
                        dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white
                        dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900
                        focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="destroy.php">Sign Out</a>
                </nav>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container flex flex-col mx-auto bg-white">
            <div class="w-full draggable">

                <div class="container flex flex-col items-center gap-16 mx-auto my-32">
                    <div class="flex items-start justify-center">
                        <div class="text-center">
                            <h5 class="font-bold text-4xl">JOIN US!</h5>
                            <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);">
                            </div>
                        </div>
                    </div>
                    <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-2">
                        <div class="flex flex-col items-center gap-3 px-8 py-10 bg-white border-2 border-blue-600 rounded-3xl shadow-main">
                            <span>
                                <img src="img/donationsvg.svg" width="76" height="76" alt="Donation">
                            </span>
                            <p class="text-2xl font-extrabold text-dark-grey-900">Make Donation</p>
                            <p class="text-base leading-7 text-dark-grey-600">Donate to projects by filling form</p>
                            <a href="makedonation.php" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 mt-8 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Make
                                Donation</a>
                        </div>
                        <div class="flex flex-col items-center gap-3 px-8 py-10 bg-white rounded-3xl shadow-main border-2 border-blue-600">
                            <span>
                                <img src="img/volunteersvg.svg" width="76" height="76" alt="Volunteer">

                            </span>
                            <p class="text-2xl font-extrabold text-dark-grey-900">Be Volunteer</p>
                            <p class="text-base leading-7 text-dark-grey-600">Be volunteer to our projects by filling form</p>
                            <a href="volunteerform.php" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 mt-8 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Be
                                Volunteer</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="bg-gray-600">
            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
                <!-- Row -->
                <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                    <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                        <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">HEMAY NGO will change
                            everything</h2>
                        <p class="mb-8 font-light lg:text-xl">Non-governmental aid organizations play a critical role in addressing
                            global humanitarian crises by providing essential services such as food, shelter, and medical care.</p>
                        <!-- List -->
                        <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Continuous support and
                                    distributing</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Effective
                                    organizations</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Supply
                                    management</span>
                            </li>
                        </ul>
                        <p class="mb-8 font-light lg:text-xl">Partnerships with local organizations and governments can enhance the
                            impact and sustainability of non-governmental aid efforts.</p>
                    </div>
                    <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="img/logo.png" alt="dashboard feature image">
                </div>
                <!-- Row -->

            </div>
        </section>
        <!-- End block -->

        <!-- Start block -->
        <section class="bg-gray-800">
            <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
                <figure class="max-w-screen-md mx-auto">
                    <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor" />
                    </svg>
                    <blockquote>
                        <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">"Non-governmental aid organizations
                            often specialize in specific areas, such as health, education, environmental conservation, or human
                            rights,
                            allowing them to develop deep expertise and tailored interventions."</p>
                    </blockquote>

                </figure>
            </div>
        </section>
        <!-- End block -->
        <!-- Start block -->
        <section class="bg-white">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
                <div class="flex items-start justify-center mb-12">
                    <div class="text-center">
                        <h5 class="font-bold text-4xl">OUR PROJECTS</h5>
                        <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);">
                        </div>
                    </div>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                    <!-- Pricing Card -->



                    <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">Reforest Brazil</h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Reforesting Brazil is crucial for
                            combating
                            climate change and restoring biodiversity in one of the world's most vital ecosystems, the Amazon
                            rainforest.</p>
                        <div class="flex items-baseline justify-center my-8 ">
                            <img src="img/reforestbrazil.webp" alt="brazil" class="my-8 rounded">
                        </div>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Efforts to reforest Brazil are not only
                            helping to rebuild degraded lands but also providing economic opportunities for local communities through
                            sustainable forestry practices.</p>

                        <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 mt-8 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Make
                            donation / Be volunteer</a>
                    </div>
                    <!-- Pricing Card -->
                    <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">Clean Water</h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Ensuring access to clean water in Kenya is
                            essential for improving public health, reducing waterborne diseases, and enhancing the overall quality of
                            life for its citizens.</p>
                        <div class="flex items-baseline justify-center my-8 ">
                            <img src="img/cleanwater.webp" alt="brazil" class="my-8 rounded">
                        </div>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Innovative solutions and community-driven
                            projects are making significant strides in providing clean water to remote areas of Kenya, promoting
                            sustainable development.</p>

                        <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 mt-8 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Make
                            donation / Be volunteer</a>

                    </div>
                    <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">Elderly Care</h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                            Providing high-quality elderly care is essential for ensuring that seniors live with dignity, comfort, and
                            the support they need in their later years.</p>
                        <div class="flex items-baseline justify-center my-8 ">
                            <img src="img/elderlycare.webp" alt="brazil" class="my-8 rounded">
                        </div>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Advances in technology and personalized
                            care
                            plans are transforming elderly care, making it possible for more seniors to age gracefully and
                            independently
                            in their own homes.</p>

                        <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 mt-8 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Make
                            donation / Be volunteer</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End block -->
        <!-- Start block -->
        <footer class="bg-blue-800 shadow">
            <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">HEMAY NGO</a>. All Rights Reserved.
                </span>
                <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Home</a>
                    </li>
                    <li>
                        <a href="login.html" class="hover:underline me-4 md:me-6">Login</a>
                    </li>
                    <li>
                        <a href="signup.html" class="hover:underline me-4 md:me-6">Sign Up</a>
                    </li>

                </ul>
            </div>
        </footer>

        <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>