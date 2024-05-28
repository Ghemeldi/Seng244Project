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
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Lastname</th>
                <th class="px-4 py-3">Profession</th>
                <th class="px-4 py-3">Income</th>
                <th class="px-4 py-3">Project</th>
                <th class="px-4 py-3">Location</th>
                <th class="px-4 py-3">Transport Handling</th>
                <th class="px-4 py-3">Availability in Month</th>
                <th class="px-4 py-3">Available Hours</th>
                <th class="px-4 py-3">Member ID</th>
                <th class="px-4 py-3">Approval</th>
            </tr>
            <?php // Assuming $result is the result of your query;
            $query = "SELECT * FROM volunteers ";

            // Assuming $conn is your database connection
            $result = mysqli_query($conn, $query);
            echo '
            <div class="flex items-start justify-center mb-12">
                <div class="text-center">
                    <h5 class="font-bold text-4xl">VOLUNTEERS LIST</h5>
                    <div class="w-full h-px max-w-6xl mx-auto py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);"></div>
                </div>
            </div>
            ';
            while ($row = mysqli_fetch_assoc($result)) {
                $volunteer_id = $row['volunteer_id'];
                $volunteer_name = $row['volunteer_name'];
                $volunteer_lastname = $row['volunteer_lastname'];
                $volunteer_profession = $row['volunteer_profession'];
                $volunteer_income = $row['volunteer_income'];
                $volunteer_location = $row['volunteer_location'];
                $volunteer_project = $row['volunteer_project'];
                $volunteer_transport_handle = $row['volunteer_transport_handle'];
                $volunteer_month_availability = $row['volunteer_month_availability'];
                $volunteer_hours_availability = $row['volunteer_hours_availability'];
                $volunteer_approved = $row['volunteer_approved'];
                $member_ID = $row['member_id'];




                // Fetch the current approval status from the database
                // Fetch the current approval status from the database
                $stmt = $conn->prepare('SELECT volunteer_approved FROM volunteers WHERE volunteer_id = ?');
                $stmt->bind_param('i', $volunteer_id);
                $stmt->execute();
                $result1 = $stmt->get_result();
                $row1 = $result1->fetch_assoc();
                $currentStatus = $row1['volunteer_approved'];
                echo "
                            <tr class='bg-gray-100 border-b border-gray-200'>
                                <td class='px-4 py-3'>$volunteer_id</td>
                                <td class='px-4 py-3'>$volunteer_name</td>
                                <td class='px-4 py-3'>$volunteer_lastname</td>
                                <td class='px-4 py-3'>$volunteer_profession</td>
                                <td class='px-4 py-3'>$volunteer_income</td>                                
                                <td class='px-4 py-3'>$volunteer_project</td>
                                <td class='px-4 py-3'>$volunteer_location</td>
                                <td class='px-4 py-3'>$volunteer_transport_handle</td>
                                <td class='px-4 py-3'>$volunteer_month_availability</td>
                                <td class='px-4 py-3'>$volunteer_hours_availability</td>
                                <td class='px-4 py-3'>$member_ID</td>
                                <td class='px-4 py-3'>
                                    <div style='display: flex; gap: 6px;'>
                                        <div class='approval-div' data-status='Pending' data-id='{$volunteer_id}' style='cursor: pointer; padding: 5px; border: 2px solid blue; border-radius: 10px; " . ($currentStatus == 'Pending' ? "background-color: red; color: white;" : "") . "'>Pending</div>
                                        <div class='approval-div' data-status='Approved' data-id='{$volunteer_id}' style='cursor: pointer; padding: 5px; border: 2px solid blue; border-radius: 10px; " . ($currentStatus == 'Approved' ? "background-color: green; color: white;" : "") . "'>Approved</div>
                                    </div>
                                </td>
                            
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
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function changeStatus(volunteerId, status) {
            // Get the button group
            var btnGroup = document.getElementById('status-buttons-' + volunteerId);

            // Remove the 'active' class from all buttons in the group
            for (var i = 0; i < btnGroup.children.length; i++) {
                btnGroup.children[i].classList.remove('active');
            }

            // Add the 'active' class to the clicked button
            var btn = btnGroup.querySelector('.' + status);
            btn.classList.add('active');

            // TODO: Update the status in the database...
        }
    </script>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script>
        document.querySelectorAll('.approval-div').forEach(function(div) {
            div.addEventListener('click', function() {
                var volunteerId = this.dataset.id;
                var approvalStatus = this.dataset.status;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_approval.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    // Update the background color of the divs
                    document.querySelectorAll('[data-id="' + volunteerId + '"]').forEach(function(div) {
                        div.style.backgroundColor = div.dataset.status == approvalStatus ? (approvalStatus == 'Approved' ? 'green' : 'red') : '';
                        div.style.color = div.dataset.status == approvalStatus ? 'white' : '';
                    });
                };
                xhr.send('id=' + volunteerId + '&status=' + approvalStatus);
            });
        });
    </script>
</body>

</html>