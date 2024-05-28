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


<body>
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
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="img/profile.png" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            </img>
                            <h1 class="text-xl font-bold"><?php echo $member_name . ' ' . $member_lastname; ?></h1>
                            <?php
                            // 1. Connect to the database
                            $db2 = new PDO('mysql:host=localhost;dbname=ngo_db;charset=utf8', 'root', '');

                            // 2. Prepare the SQL statement
                            $query2 = $db2->prepare("SELECT COUNT(*) as approved_count FROM volunteers WHERE volunteer_approved = 'Approved' AND member_id = {$_SESSION['member_id']}");

                            // 3. Execute the SQL statement
                            $query2->execute();

                            // 4. Fetch the result
                            $result2 = $query2->fetch(PDO::FETCH_ASSOC);

                            $is_volunteer = $result2['approved_count'] > 0;
                            ?>

                            <p class="text-gray-700"><?php echo $is_volunteer ? 'Volunteer' : 'Not Volunteered'; ?></p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <a href="#" id="toggle-btn" class="volunteerings-btn bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Show
                                    Volunteerings</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <div class="flex justify-between items-center">
                                <span class="relative inline-block py-1 font-semibold leading-tight">
                                    <span class="relative uppercase">Member Since</span>
                                </span>
                                <span class="relative inline-block px-3 py-1 font-semibold text-white leading-tight bg-blue-500 rounded-full">
                                    <span class="relative"><?php echo $member_date; ?></span>
                                </span>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <span class="relative inline-block py-1 font-semibold leading-tight">
                                    <span class="relative uppercase">Volunteer Status</span>
                                </span>
                                <?php
                                // 1. Connect to the database
                                $db1 = new PDO('mysql:host=localhost;dbname=ngo_db;charset=utf8', 'root', '');

                                // 2. Prepare the SQL statement
                                $query1 = $db1->prepare("SELECT volunteer_approved FROM volunteers WHERE member_id = {$_SESSION['member_id']}");

                                // 3. Execute the SQL statement
                                $query1->execute();

                                // 4. Fetch the result
                                $result1 = $query1->fetch(PDO::FETCH_ASSOC);

                                $volunteer_status = $result1 ? $result1['volunteer_approved'] : 'No Volunteered';
                                ?>

                                <?php if ($volunteer_status == 'Approved') : ?>
                                    <span class="relative inline-block px-3 py-1 font-semibold text-white leading-tight bg-green-500 rounded-full">
                                        <span class="relative">Approved</span>
                                    </span>
                                <?php elseif ($volunteer_status == 'Pending') : ?>
                                    <span class="relative inline-block px-3 py-1 font-semibold text-white leading-tight bg-yellow-500 rounded-full">
                                        <span class="relative">Pending</span>
                                    </span>
                                <?php else : ?>
                                    <span class="relative inline-block px-3 py-1 font-semibold text-white leading-tight bg-red-500 rounded-full">
                                        <span class="relative">Not Volunteer</span>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">About Me</h2>
                        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
                            <div class="w-full flex flex-col 2xl:w-full">

                                <ul class="mt-2 text-gray-700">
                                    <li class="flex border-y py-2">
                                        <span class="font-bold w-24">Full name:</span>
                                        <span class="text-gray-700"><?php echo $member_name . ' ' . $member_lastname; ?></span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Birthday:</span>
                                        <span class="text-gray-700"><?php echo $member_birthdate; ?></span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Address:</span>
                                        <span class="text-gray-700"><?php echo $member_address; ?></span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Phone:</span>
                                        <span class="text-gray-700"><?php echo $member_phone; ?></span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Email:</span>
                                        <span class="text-gray-700"><?php echo $member_mail; ?></span>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class=" w-full h-px max-w-6xl mx-auto mt-40 mb-20 py-1" style="background-image: linear-gradient(90deg, rgba(0, 123, 255, 0) 1.46%, rgba(0, 123, 255, 0.6) 40.83%, rgba(0, 123, 255, 0.3) 65.57%, rgba(0, 123, 255, 0) 107.92%);">
            </div>

            <?php
            if (!defined('dbusername')) {
                define('dbusername', 'root');
            }

            if (!defined('dbpassword')) {
                define('dbpassword', '');
            }

            if (!defined('dbdatabase')) {
                define('dbdatabase', 'ngo_db');
            }

            if (!defined('dbserver')) {
                define('dbserver', 'localhost');
            }

            $query = "SELECT volunteer_id FROM volunteers WHERE member_id = {$_SESSION["member_id"]}";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="relative flex flex-wrap justify-around items-stretch gap-4  mb-20 px-4 sm:px-0 hidden" id="volunteercards">'; // Removed 'hidden' class

                while ($row = mysqli_fetch_assoc($result)) {
                    $volunteer_id = $row["volunteer_id"];
                    $query2 = "SELECT * FROM volunteers WHERE member_id = {$_SESSION["member_id"]}";
                    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $volunteer_location = $row2["volunteer_location"];
                        $volunteer_project = $row2["volunteer_project"];
                        $volunteer_transport_handle = $row2["volunteer_transport_handle"];
                        $volunteer_month_availability = $row2["volunteer_month_availability"];
                        $volunteer_hours_availability = $row2["volunteer_hours_availability"];
                        $volunteer_approved = $row2["volunteer_approved"];
                        $volunteer_income = $row2["volunteer_income"];
                        $volunteer_profession = $row2["volunteer_profession"];

                        $img = 'default.jpg'; // Default image

                        // Fetch the project_img from the projects table
                        $query3 = "SELECT project_img FROM projects WHERE project_name = '$volunteer_project'";
                        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));

                        if (mysqli_num_rows($result3) > 0) {
                            $row3 = mysqli_fetch_assoc($result3);
                            $img = $row3['project_img'];
                        }

                        if ($volunteer_approved == "Approved") {
                            echo '<span class="p-4 w-full sm:w-1/3 mt-8 h-auto border border-indigo-300 rounded-2xl hover:shadow-xl hover:shadow-indigo-50 flex flex-col items-start text-left" href="#">';
                            echo '<img src="' . $img . '" class="shadow rounded-lg overflow-hidden border">';
                            echo '<div class="mt-8">';
                            echo '<h4 class="font-bold text-xl">Project Name: ' . $volunteer_project . '</h4>';
                            echo '<p class="mt-2 text-lg text-gray-600">Project Location: ' . $volunteer_location . '</p>';
                            echo '<p class="mt-2 text-lg text-gray-600">Profession: ' . $volunteer_profession . '</p>';
                            echo '<p class="mt-2 text-lg text-gray-600">Income: ' . $volunteer_income . '</p>';
                            echo '<p class="mt-2 text-lg text-gray-600">Transport Handling: ' . $volunteer_transport_handle . '</p>';
                            echo '<p class="mt-2 text-lg text-gray-600">Month Availability: ' . $volunteer_month_availability . '</p>';
                            echo '<p class="mt-2  text-lg text-gray-600">Available Hours in a Day: ' . $volunteer_hours_availability . '</p>';
                            echo '</div>';
                            echo '</span>';
                        }
                    }
                }
                echo '</div>';
            }

            mysqli_close($conn);
            ?>

        </div>
    </div>

    <!-- <script>
        // Get the button and the volunteer cards element
        var btn = document.getElementById('toggle-btn');
        var cards = document.getElementById('volunteercards');

        // Add an event listener to the button
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            // Check if the volunteer cards are hidden
            if (cards.classList.contains('hidden')) {
                // If they are, remove the hidden class and change the button text
                cards.classList.remove('hidden');
                btn.textContent = 'Hide Volunteerings';

                // Change the button color

                btn.style.backgroundColor = '#4e10b3';

                // Scroll to the volunteer cards
                cards.scrollIntoView({
                    behavior: "smooth"
                });
            } else {
                // If they aren't, add the hidden class and change the button text
                cards.classList.add('hidden');
                btn.textContent = 'Show Volunteerings';

                // Reset the button color
                btn.style.backgroundColor = '';
            }
        });
    </script> -->
    <script>
        // Get the button and the volunteer cards element
        var btn = document.getElementById('toggle-btn');
        var cards = document.getElementById('volunteercards');

        // Add an event listener to the button
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            // Check if the volunteer cards are hidden
            if (cards.classList.contains('hidden')) {
                // If they are, remove the hidden class and change the button text
                cards.classList.remove('hidden');
                btn.textContent = 'Hide Volunteerings';

                // Change the button color
                btn.style.backgroundColor = '#4e10b3';

                // Scroll to the volunteer cards
                cards.scrollIntoView({
                    behavior: "smooth"
                });
            } else {
                // If they aren't, add the hidden class and change the button text
                cards.classList.add('hidden');
                btn.textContent = 'Show Volunteerings';

                // Reset the button color
                btn.style.backgroundColor = '';
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>