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

        echo '
            <div class="flex items-start justify-center mt-12 mb-12">
                <div class="text-center">
                    <h5 class="font-bold text-4xl">COLLECT - DISTRIBUTE ITEMS</h5>
                    <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);"></div>
                </div>
            </div>
            ';
        ?>
        <div class="flex justify-center p-10">
            <div class="relative inline-flex group mx-16" id="btn1">
                <div class="absolute transitiona-all duration-1000 opacity-100 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter group-hover:duration-200">
                </div>
                <button target="_blank" title="" role="button" class="relative inline-flex items-center justify-center px-12 py-6 text-2xl font-bold text-white transition-all duration-200 bg-gray-900 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900  rounded">
                    NOT SHIPPED DONATIONS
                </button>
            </div>
            <div class="relative inline-flex group mx-16" id="btn2">
                <div class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter  group-hover:duration-200">
                </div>
                <button target="_blank" title="" role="button" class="relative inline-flex items-center justify-center px-12 py-6 text-2xl font-bold text-white transition-all duration-200 bg-gray-900 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900  rounded">
                    SHIPPED DONATIONS
                </button>
            </div>

        </div>
        <!-- Charts -->

        <div class="mt-10 mx-4 min-h-screen overflow-x-auto">
            <div id="notshippedtable" class="hidden">
                <table class="w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="px-4 py-3">Donation ID</th>
                        <th class="px-4 py-3">Donation Project</th>
                        <th class="px-4 py-3">Donation Location</th>
                        <th class="px-4 py-3">Donation Type</th>
                        <th class="px-4 py-3">Donation Amount</th>
                        <th class="px-4 py-3">Material Type</th>
                        <th class="px-4 py-3">Shipping Type </th>
                        <th class="px-4 py-3">Action</th>
                        <th class="px-4 py-3">
                            <button id="closeButton1" class="bg-transparant text-gray-900 active:bg-indigo-600 text-lg font-semibold uppercase border-4 border-black px-3 py-0.5 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                X
                            </button>
                        </th>

                    </tr>
                    <?php // Assuming $result is the result of your query;
                    $query = "SELECT * FROM donations WHERE donation_shipping_type = 'NGO Collecting' AND isShipped = 'No'";

                    // Assuming $conn is your database connection
                    $result = mysqli_query($conn, $query);

                    echo '
                    <div class="flex items-start justify-center mb-12">
                        <div class="text-center">
                            <h5 class="font-bold text-4xl">NOT SHIPPED DONATIONS</h5>
                            <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);"></div>
                        </div>
                    </div>
                    ';

                    while ($row = mysqli_fetch_assoc($result)) {
                        $donation_id = $row['donation_id'];
                        $donation_project = $row['donation_project'];
                        $donation_location = $row['donation_location'];
                        $donation_type = $row['donation_type'];
                        $donation_amount = $row['donation_amount'];
                        $donation_material_type = $row['donation_material_type'];
                        $donation_shipping_type = $row['donation_shipping_type'];



                        echo "
                            <tr class='bg-gray-100 border-b border-gray-200'>
                                <td class='px-4 py-3'>$donation_id</td>
                                <td class='px-4 py-3'>$donation_project</td>
                                <td class='px-4 py-3'>$donation_location</td>
                                <td class='px-4 py-3'>$donation_type</td>
                                <td class='px-4 py-3'>$donation_amount</td>
                                <td class='px-4 py-3'>$donation_material_type</td>
                                <td class='px-4 py-3'>$donation_shipping_type</td>
                                <td class='px-4 py-3 text-sm border'><button data-donationid='" . $row['donation_id'] . "' class='ship_donation inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded'>Ship Donation</button></td>
                                <td class='px-4 py-3'></td>

                                

                            
                            </tr>
                ";
                    }


                    // Free the result set
                    mysqli_free_result($result);

                    // Close the connection
                    ?>


                </table>
            </div>
            <div id="shippedtable" class="hidden">
                <table class="w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="px-4 py-3">Donation ID</th>
                        <th class="px-4 py-3">Donation Project</th>
                        <th class="px-4 py-3">Donation Location</th>
                        <th class="px-4 py-3">Donation Type</th>
                        <th class="px-4 py-3">Donation Amount</th>
                        <th class="px-4 py-3">Material Type</th>
                        <th class="px-4 py-3">Shipping Type </th>
                        <th class="px-4 py-3">Action</th>

                        <th class="px-4 py-3">
                            <button id="closeButton2" class="bg-transparant text-gray-900 active:bg-indigo-600 text-lg font-semibold uppercase border-4 border-black px-3 py-0.5 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                X
                            </button>
                        </th>
                    </tr>
                    <?php // Assuming $result is the result of your query;
                    $query = "SELECT * FROM donations WHERE donation_shipping_type = 'NGO Collecting' AND isShipped = 'Yes'";

                    // Assuming $conn is your database connection
                    $result = mysqli_query($conn, $query);

                    echo '
                <div class="flex items-start justify-center mb-12">
                    <div class="text-center">
                        <h5 class="font-bold text-4xl">SHIPPED DONATIONS</h5>
                        <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);"></div>
                    </div>
                </div>
                ';

                    while ($row = mysqli_fetch_assoc($result)) {
                        $donation_id = $row['donation_id'];
                        $donation_project = $row['donation_project'];
                        $donation_location = $row['donation_location'];
                        $donation_type = $row['donation_type'];
                        $donation_amount = $row['donation_amount'];
                        $donation_material_type = $row['donation_material_type'];
                        $donation_shipping_type = $row['donation_shipping_type'];



                        echo "
                            <tr class='bg-gray-100 border-b border-gray-200'>
                                <td class='px-4 py-3'>$donation_id</td>
                                <td class='px-4 py-3'>$donation_project</td>
                                <td class='px-4 py-3'>$donation_location</td>
                                <td class='px-4 py-3'>$donation_type</td>
                                <td class='px-4 py-3'>$donation_amount</td>
                                <td class='px-4 py-3'>$donation_material_type</td>
                                <td class='px-4 py-3'>$donation_shipping_type</td>
                                <td class='px-4 py-3 text-sm border'><button data-donationid='" . $row['donation_id'] . "' class='cancel_donation inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded'>Cancel Shipping</button></td>
                                <td class='px-4 py-3'></td>

                                

                            
                            </tr>
                ";
                    }


                    // Free the result set
                    mysqli_free_result($result);

                    // Close the connection
                    ?>


                </table>
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        $(document).ready(function() {
            $("#btn1").click(function() {
                $("#notshippedtable").show();
                $("#shippedtable").hide();
            });
            $("#btn2").click(function() {
                $("#notshippedtable").hide();
                $("#shippedtable").show();
            });

        });
        $(document).ready(function() {
            $('#closeButton1').click(function() {
                $("#notshippedtable").hide();
                location.reload();
            });

            $('#closeButton2').click(function() {
                $("#shippedtable").hide();
                location.reload();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.ship_donation').click(function() {
                var donationId = $(this).data('donationid'); // assuming the donation id is stored in a data attribute
                var button = $(this);
                // Send AJAX request to update the database
                $.ajax({
                    url: 'update_donation.php', // The PHP script that performs the update
                    type: 'POST',
                    data: {
                        donationId: donationId,
                        isShipped: 'Yes'
                    },
                    success: function(data) {
                        // Handle success
                        console.log('Update successful');
                        button.text('Shipped');
                        button.removeClass('bg-blue-600 hover:bg-blue-700').addClass('bg-gray-500');

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error
                        console.log('Update failed: ' + textStatus);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('.cancel_donation').click(function() {
                var donationId = $(this).data('donationid'); // assuming the donation id is stored in a data attribute
                var button = $(this);
                // Send AJAX request to update the database
                $.ajax({
                    url: 'update_donation.php', // The PHP script that performs the update
                    type: 'POST',
                    data: {
                        donationId: donationId,
                        isShipped: 'No'
                    },
                    success: function(data) {
                        // Handle success

                        button.text('Canceled');
                        button.removeClass('bg-red-600 hover:bg-red-700').addClass('bg-gray-500');
                        console.log('Update successful');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error
                        console.log('Update failed: ' + textStatus);
                    }
                });
            });
        });
    </script>

</body>

</html>