<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="icon" href="../img/aidlogo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <style>
        .dropdown-content {
            z-index: 850;
            /* any number larger than the z-index of other elements */
        }
    </style>
</head>

<body id="top" class="bg-gray-300 ">
    <!-- loader -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>


    <header class="border-b-4 border-blue-500">
        <?php
        include("../dbconnect.php");
        session_start();
        $sql = "SELECT * FROM members WHERE member_id = {$_SESSION['member_id']}"; // Assuming you want data for a specific customer ID

        $result = $conn->query($sql);

        // Check if there is a result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $member_name = $row["member_name"];
                $member_lastname = $row["member_lastname"];
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
                    <a href="adminpanel.php" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">HEMAY NGO
                    </a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="adminpanel.php">Home</a>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Admin Operations</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 dropdown-content">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="listmembers.php">Members</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="listdonors.php">Donors</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="listdonations.php">Donations</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="listvolunteers.php">Volunteers</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="listrequests.php">Requests</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="statistics.php">Statistics</a>
                                <!-- <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="donations.php">Donations</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="donations.php">Donations</a> -->


                            </div>
                        </div>
                    </div>


                    <span class="px-4 py-2 mt-2 text-sm font-semibold text-blue-700 bg-gray-200 rounded-lg dark-mode:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline-block align-text-top h-5 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zm8 9a3 3 0 100-6 3 3 0 000 6zm-3 4a6 6 0 016 0H9z"></path>
                        </svg>
                        <?php echo $member_name; ?>
                    </span>
                    <a class=" px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent
                        dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white
                        dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900
                        focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="../destroy.php">Sign Out</a>
                </nav>
            </div>
        </div>
    </header>
    <div class="min-h-screen">
        <!-- State cards -->
        <div class="mt-8 grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
            <!-- Value card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-m font-semibold font-medium leading-none mb-2 tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Member Number
                    </h6>
                    <?php
                    $sql = "SELECT COUNT(*) as member_count FROM members WHERE member_id != 1";
                    $result = $conn->query($sql);

                    // Check if there is a result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $member_count = $row["member_count"];
                        }
                    } else {
                        echo "No data found in the database.";
                    }
                    ?>
                    <span class="text-xl font-semibold"><?php echo $member_count; ?> </span>

                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Users card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-m font-semibold font-medium leading-none mb-2 tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Donor Number
                    </h6>
                    <?php
                    $sql = "SELECT COUNT(*) as donor_count FROM donors";
                    $result = $conn->query($sql);

                    // Check if there is a result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $donor_count = $row["donor_count"];
                        }
                    } else {
                        echo "No data found in the database.";
                    }
                    ?>
                    <span class="text-xl font-semibold"><?php echo $donor_count; ?></span>

                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Orders card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-m font-semibold font-medium leading-none mb-2 tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Volunteer Number
                    </h6>
                    <?php
                    $sql = "SELECT COUNT(*) as volunteer_count FROM volunteers WHERE volunteer_approved = 'Approved'";
                    $result = $conn->query($sql);

                    // Check if there is a result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $volunteer_count = $row["volunteer_count"];
                        }
                    } else {
                        echo "No data found in the database.";
                    }
                    ?>
                    <span class="text-xl font-semibold"><?php echo $volunteer_count; ?></span>

                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Tickets card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-m font-semibold font-medium leading-none mb-2 tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Indigent Number
                    </h6>
                    <?php
                    $sql = "SELECT COUNT(*) as indigent_count FROM indigents";
                    $result = $conn->query($sql);

                    // Check if there is a result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $indigent_count = $row["indigent_count"];
                        }
                    } else {
                        echo "No data found in the database.";
                    }
                    ?>
                    <span class="text-xl font-semibold"><?php echo $indigent_count; ?></span>

                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
            </div>

        </div>
        <?php
        $sql = "SELECT * FROM projects WHERE project_id = 1";
        $result = $conn->query($sql);

        // Check if there is a result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $project_name1 = $row["project_name"];
                $project_need_money1 = $row["project_need_money"];
                $project_need_food1 = $row["project_need_food"];
                $project_need_medical1 = $row["project_need_medical"];
                $project_need_clothing1 = $row["project_need_clothing"];
            }
        } else {
            echo "No data found in the database.";
        }



        $sql2 = "SELECT donation_type, donation_material_type, SUM(donation_amount) as total_donation 
                 FROM donations 
                 WHERE donation_project = '$project_name1' 
                 GROUP BY donation_type, donation_material_type";
        $result2 = $conn->query($sql2);

        $total_donations1 = [];

        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                if ($row2['donation_type'] == 'Material') {
                    $total_donations1[$row2['donation_type']][$row2['donation_material_type']] = $row2['total_donation'];
                } else {
                    $total_donations1[$row2['donation_type']] = $row2['total_donation'];
                }
            }
        } else {
            echo "No data found in the database.";
        }
        ?>



        <?php
        $sql = "SELECT * FROM projects WHERE project_id = 2";
        $result = $conn->query($sql);

        // Check if there is a result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $project_name2 = $row["project_name"];
                $project_need_money2 = $row["project_need_money"];
                $project_need_food2 = $row["project_need_food"];
                $project_need_medical2 = $row["project_need_medical"];
                $project_need_clothing2 = $row["project_need_clothing"];
            }
        } else {
            echo "No data found in the database.";
        }

        $sql2 = "SELECT donation_type, donation_material_type, SUM(donation_amount) as total_donation 
                 FROM donations 
                 WHERE donation_project = '$project_name2' 
                 GROUP BY donation_type, donation_material_type";
        $result2 = $conn->query($sql2);

        $total_donations2 = [];

        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                if ($row2['donation_type'] == 'Material') {
                    $total_donations2[$row2['donation_type']][$row2['donation_material_type']] = $row2['total_donation'];
                } else {
                    $total_donations2[$row2['donation_type']] = $row2['total_donation'];
                }
            }
        } else {
            echo "No data found in the database.";
        }
        ?>
        <?php
        $sql = "SELECT * FROM projects WHERE project_id = 3";
        $result = $conn->query($sql);

        // Check if there is a result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $project_name3 = $row["project_name"];
                $project_need_money3 = $row["project_need_money"];
                $project_need_food3 = $row["project_need_food"];
                $project_need_medical3 = $row["project_need_medical"];
                $project_need_clothing3 = $row["project_need_clothing"];
            }
        } else {
            echo "No data found in the database.";
        }

        $sql2 = "SELECT donation_type, donation_material_type, SUM(donation_amount) as total_donation 
                 FROM donations 
                 WHERE donation_project = '$project_name3' 
                 GROUP BY donation_type, donation_material_type";
        $result2 = $conn->query($sql2);

        $total_donations3 = [];

        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                if ($row2['donation_type'] == 'Material') {
                    $total_donations3[$row2['donation_type']][$row2['donation_material_type']] = $row2['total_donation'];
                } else {
                    $total_donations3[$row2['donation_type']] = $row2['total_donation'];
                }
            }
        } else {
            echo "No data found in the database.";
        }
        ?>
        <div class="flex justify-center p-10 mt-10">
            <div class="relative inline-flex group mx-16" id="btn1">
                <div class="absolute transitiona-all duration-1000 opacity-100 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter group-hover:duration-200">
                </div>
                <button target="_blank" title="" role="button" class="relative inline-flex items-center justify-center px-12 py-6 text-2xl font-bold text-white transition-all duration-200 bg-gray-900 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900  rounded">
                    <?php echo $project_name1; ?>
                </button>
            </div>
            <div class="relative inline-flex group mx-16" id="btn2">
                <div class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter  group-hover:duration-200">
                </div>
                <button target="_blank" title="" role="button" class="relative inline-flex items-center justify-center px-12 py-6 text-2xl font-bold text-white transition-all duration-200 bg-gray-900 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900  rounded">
                    <?php echo $project_name2; ?>
                </button>
            </div>
            <div class="relative inline-flex group mx-16" id="btn3">
                <div class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter  group-hover:duration-200">
                </div>
                <button target="_blank" title="" role="button" class="relative inline-flex items-center justify-center px-12 py-6 text-2xl font-bold text-white transition-all duration-200 bg-gray-900 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900  rounded">
                    <?php echo $project_name3; ?>
                </button>
            </div>
        </div>
        <!-- Charts -->

        <section class="py-1 hidden" id="project1">
            <div class="w-full px-4 mx-auto mt-12">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white ">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-xl text-base text-blueGray-700">
                                    <?php echo $project_name1; ?>

                                </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <button id="closeButton1" class="bg-transparant text-gray-900 active:bg-indigo-600 text-xl font-bold uppercase border-4 border-black px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full border-collapse text-blueGray-700  ">
                            <thead class="thead-light ">
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Donation Type
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Target Amounts
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Money
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 ">
                                        <?php echo $project_need_money1; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations1['Money']) && $project_need_money1 != 0) {
                                                $percentage = ($total_donations1['Money'] / $project_need_money1) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-green-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Food
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_food1; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations1['Material']['Food']) && $project_need_food1 != 0) {
                                                $percentage = ($total_donations1['Material']['Food'] / $project_need_food1) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-blue-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Medical
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_medical1; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations1['Material']['Medical']) && $project_need_medical1 != 0) {
                                                $percentage = ($total_donations1['Material']['Medical'] / $project_need_medical1) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-orange-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Clothing
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_clothing1; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations1['Material']['Clothing']) && $project_need_clothing1 != 0) {
                                                $percentage = ($total_donations1['Material']['Clothing'] / $project_need_clothing1) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-purple-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-1 hidden" id="project2">
            <div class="w-full px-4 mx-auto mt-12">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white ">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-xl text-base text-blueGray-700">
                                    <?php echo $project_name2; ?>
                                </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <button id="closeButton2" class="bg-transparant text-gray-900 active:bg-indigo-600 text-xl font-bold uppercase border-4 border-black px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full border-collapse text-blueGray-700  ">
                            <thead class="thead-light ">
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Donation Type
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Target Amounts
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Money
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 ">
                                        <?php echo $project_need_money2; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations2['Money']) && $project_need_money2 != 0) {
                                                $percentage = ($total_donations2['Money'] / $project_need_money2) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-green-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Food
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_food2; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations2['Material']['Food']) && $project_need_food2 != 0) {
                                                $percentage = ($total_donations2['Material']['Food'] / $project_need_food2) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-blue-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Medical
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_medical2; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations2['Material']['Medical']) && $project_need_medical2 != 0) {
                                                $percentage = ($total_donations2['Material']['Medical'] / $project_need_medical2) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-orange-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Clothing
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_clothing2; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations2['Material']['Clothing']) && $project_need_clothing2 != 0) {
                                                $percentage = ($total_donations2['Material']['Clothing'] / $project_need_clothing2) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-purple-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-1 hidden" id="project3">
            <div class="w-full px-4 mx-auto mt-12">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white ">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-xl text-base text-blueGray-700">
                                    <?php echo $project_name3; ?>
                                </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <button id="closeButton3" class="bg-transparant text-gray-900 active:bg-indigo-600 text-xl font-bold uppercase border-4 border-black px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full border-collapse text-blueGray-700  ">
                            <thead class="thead-light ">
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Donation Type
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Target Amounts
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Money
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 ">
                                        <?php echo $project_need_money3; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations3['Money']) && $project_need_money3 != 0) {
                                                $percentage = ($total_donations3['Money'] / $project_need_money3) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-green-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Food
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_food3; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations3['Material']['Food']) && $project_need_food3 != 0) {
                                                $percentage = ($total_donations3['Material']['Food'] / $project_need_food3) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-blue-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Medical
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_medical3; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations3['Material']['Medical']) && $project_need_medical3 != 0) {
                                                $percentage = ($total_donations3['Material']['Medical'] / $project_need_medical3) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-orange-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left">
                                        Clothing
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <?php echo $project_need_clothing3; ?>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <?php
                                            $percentage = 0;
                                            if (isset($total_donations3['Material']['Clothing']) && $project_need_clothing3 != 0) {
                                                $percentage = ($total_donations3['Material']['Clothing'] / $project_need_clothing3) * 100;
                                                $percentage = intval($percentage);
                                                if ($percentage >= 100) {
                                                    $percentage = 100;
                                                }
                                            }
                                            ?>
                                            <span class="mr-2"><?php echo $percentage; ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-lg flex rounded bg-purple-200">
                                                    <div style="width: <?php echo $percentage; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <div class="mt-10 mx-4 min-h-screen overflow-x-auto">
            <table class="w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Lastname</th>
                    <th class="px-4 py-3">Donation Type</th>
                    <th class="px-4 py-3">Donation Material Type</th>

                    <th class="px-4 py-3">Donation Amount</th>

                </tr>
                <?php
                $query = "SELECT donations.*, donors.donor_name, donors.donor_lastname 
                          FROM donations 
                          JOIN donors ON donations.donor_id = donors.donor_id 
                          ORDER BY donations.donation_date DESC 
                          LIMIT 5";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr class='bg-gray-100 border-b border-gray-200'>
                            <td class='px-4 py-3'>{$row['donor_name']}</td>
                            <td class='px-4 py-3'>{$row['donor_lastname']}</td>
                            <td class='px-4 py-3'>{$row['donation_type']}</td>
                            <td class='px-4 py-3'>{$row['donation_material_type']}</td>

                            <td class='px-4 py-3'>{$row['donation_amount']}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                    ";
                }

                mysqli_free_result($result);
                $conn->close();
                ?>


            </table>

        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        $(document).ready(function() {
            $("#btn1").click(function() {
                $("#project1").show();
                $("#project2").hide();
                $("#project3").hide();
            });
            $("#btn2").click(function() {
                $("#project1").hide();
                $("#project2").show();
                $("#project3").hide();
            });
            $("#btn3").click(function() {
                $("#project1").hide();
                $("#project2").hide();
                $("#project3").show();
            });
        });
        $(document).ready(function() {
            $('#closeButton1').click(function() {
                $("#project1").hide();
            });
        });
        $(document).ready(function() {
            $('#closeButton2').click(function() {
                $("#project2").hide();
            });
        });
        $(document).ready(function() {
            $('#closeButton3').click(function() {
                $("#project3").hide();
            });
        });
    </script>
</body>

</html>