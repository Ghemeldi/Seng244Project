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
    <style>
        .dropdown-content {
            z-index: 850;
            /* any number larger than the z-index of other elements */
        }
    </style>
</head>

<body id="top">
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
    <div class="mt-10 mx-4 min-h-screen overflow-x-auto">
        <table class="w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Member ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Lastname</th>
                <th class="px-4 py-3">Mail</th>
                <th class="px-4 py-3">Birthdate</th>
                <th class="px-4 py-3">Address</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Member Date</th>
                <th class="px-4 py-3">Action</th>
            </tr>
            <?php // Assuming $result is the result of your query;
            $query = "SELECT * FROM members WHERE member_id != 1";

            // Assuming $conn is your database connection
            $result = mysqli_query($conn, $query);

            echo '
            <div class="flex items-start justify-center mb-12">
                <div class="text-center">
                    <h5 class="font-bold text-4xl">MEMBERS LIST</h5>
                    <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);"></div>
                </div>
            </div>
            ';

            while ($row = mysqli_fetch_assoc($result)) {
                $member_id = $row["member_id"];
                $member_name = $row["member_name"];
                $member_lastname = $row["member_lastname"];
                $member_mail = $row["member_mail"];
                $member_birthdate = $row["member_birthdate"];
                $member_address = $row["member_address"];
                $member_phone = $row["member_phone"];
                $member_date = $row["member_date"];


                echo "
                            <tr class='bg-gray-100 border-b border-gray-200'>
                                <td class='px-4 py-3'>$member_id</td>
                                <td class='px-4 py-3'>$member_name</td>
                                <td class='px-4 py-3'>$member_lastname</td>
                                <td class='px-4 py-3'>$member_mail</td>
                                <td class='px-4 py-3'>$member_birthdate</td>                                
                                <td class='px-4 py-3'>$member_address</td>
                                <td class='px-4 py-3'>$member_phone</td>
                                <td class='px-4 py-3'>$member_date</td>
                                
                                <td class='px-4 py-3 text-sm border'><button data-member-id='" . $row['member_id'] . "' class='remove-member inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded'>Remove Member</button></td>

                            
                            </tr>
            ";
            }


            // Free the result set
            mysqli_free_result($result);

            // Close the connection
            $conn->close();
            ?>


        </table>

    </div>
    <!-- <div class="confirm fixed z-10 inset-0 overflow-auto bg-black bg-opacity-40 hidden">
        <div class="border rounded-lg shadow relative max-w-sm m-auto bg-white p-6">


            <div class="text-center">
                <svg class="w-20 h-20 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this user?</h3>
                <a href="#" class="confirm-yes text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </a>
                <a href="#" class="confirm-no text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-400 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                    No, cancel
                </a>
            </div>
        </div>
    </div> -->

    <div class="confirm  fixed inset-0 z-40 min-h-screen overflow-y-auto overflow-x-hidden transition hidden">
        <!-- overlay -->
        <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-white/60 cursor-pointer">
        </div>

        <!-- Modal -->
        <div class="relative w-full cursor-pointer pointer-events-none transition p-4">
            <div class="object-center w-full py-2 bg-white cursor-default pointer-events-auto dark:bg-blue-700 relative rounded-xl mx-auto max-w-sm">



                <div class="space-y-2 p-2">
                    <div class="p-4 space-y-2 text-center dark:text-white">
                        <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">
                            Delete Member
                        </h2>

                        <p class="text-white">
                            Are you sure you would like to do this?
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div aria-hidden="true" class="border-t dark:border-gray-700 px-2"></div>

                    <div class="px-6 py-2">
                        <div class="grid gap-2 grid-cols-[repeat(auto-fit,minmax(0,1fr))]">
                            <button type="button" class="confirm-no inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:text-gray-200 dark:focus:text-primary-400 dark:focus:border-primary-400 dark:focus:bg-gray-800">
                                <span class="flex items-center gap-1">
                                    <span class="">
                                        Cancel
                                    </span>
                                </span>
                            </button>

                            <button type="submit" class="confirm-yes inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-red-600 hover:bg-red-500 focus:bg-red-700 focus:ring-offset-red-700">

                                <span class="flex items-center gap-1">
                                    <span class="">
                                        Confirm
                                    </span>
                                </span>

                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        $(".remove-member").click(function() {
            var memberId = $(this).data("member-id");
            $(".confirm").show().data("member-id", memberId);
        });

        $(".confirm-yes").click(function() {
            var memberId = $(".confirm").data("member-id");

            $.ajax({
                url: 'remove_member.php',
                type: 'POST',
                data: {
                    member_id: memberId
                },
                success: function(result) {
                    location.reload();
                },
                error: function() {
                    alert("An error occurred");
                }
            });
        });

        $(".confirm-no").click(function() {
            $(".confirm").hide();
        });
    </script>
</body>

</html>