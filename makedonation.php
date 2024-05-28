<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Make Donation</title>
    <meta name="description" content="" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .body-bg {
            background-color: #2160e8;
            background-image: linear-gradient(315deg, #4469d0 0%, #a4b0e0 74%);
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
                $member_birthdate1 = $row["member_birthdate"];

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
    <div class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family: 'Lato', sans-serif">
        <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
            <section>
                <h3 class="font-bold text-2xl">Welcome to NGO Donating</h3>
                <p class="text-gray-600 pt-2">Make a donation.</p>
            </section>

            <section class="mt-10">
                <form class="flex flex-col" method="POST" action="donate.php">
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Name</label>
                        <input type="text" id="text" name="name" required readonly value="<?php echo $member_name; ?>" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" />
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="text">Lastname</label>
                        <input type="text" id="text" name="lastname" required readonly value="<?php echo $member_lastname; ?>" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" />
                    </div>

                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="project">Project</label>
                        <select id="project" name="project" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                            <option value="" disabled selected>Select a project</option>
                            <option value="Reforest Brazil">Reforest Brazil</option>
                            <option value="Clean Water">Clean Water</option>
                            <option value="Elderly Care">Elderly Care</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="location">Location</label>
                        <input type="text" id="location" name="location" readonly required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" />
                    </div>
                    <input type="hidden" name="donation_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="isShipped" value="No">
                    <input type="hidden" name="member_name" value="<?php echo $member_name; ?>">
                    <input type="hidden" name="member_lastname" value="<?php echo $member_lastname; ?>">
                    <input type="hidden" name="member_mail" value="<?php echo $member_mail; ?>">
                    <input type="hidden" name="member_birthdate" value="<?php echo $member_birthdate1; ?>">
                    <input type="hidden" name="member_address" value="<?php echo $member_address; ?>">
                    <input type="hidden" name="member_password" value="<?php echo $member_password; ?>">

                    <div class="mb-6 pt-3 rounded bg-gray-200 ">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="transport">Donation Type</label>
                        <div class="flex ml-3 mb-3">
                            <div class="flex items-center">
                                <input type="radio" id="money" name="donate_type" value="Money" class="form-radio h-4 w-4 text-blue-600">
                                <label for="money" class="font-medium text-gray-700 ml-2">Money</label>
                            </div>
                            <div class="flex items-center ml-4">
                                <input type="radio" id="material" name="donate_type" value="Material" class="form-radio h-4 w-4 text-blue-600">
                                <label for="material" class="font-medium text-gray-700 ml-2">Material</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="amount">Donation Amount</label>
                        <input type="number" id="amount" name="amount" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" />
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200" id="materialTypeDiv" style="display: none">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="transport">Donation Type</label>
                        <div class="flex ml-3 mb-3">
                            <div class="flex items-center">
                                <input type="radio" id="food" name="material_type" value="Food" class="form-radio h-4 w-4 text-blue-600">
                                <label for="food" class="font-medium text-gray-700 ml-2">Food</label>
                            </div>
                            <div class="flex items-center ml-4">
                                <input type="radio" id="medical" name="material_type" value="Medical" class="form-radio h-4 w-4 text-blue-600">
                                <label for="medical" class="font-medium text-gray-700 ml-2">Medical</label>
                            </div>
                            <div class="flex items-center ml-4">
                                <input type="radio" id="clothing" name="material_type" value="Clothing" class="form-radio h-4 w-4 text-blue-600">
                                <label for="clothing" class="font-medium text-gray-700 ml-2">Clothing</label>
                            </div>

                        </div>
                    </div>

                    <div class="mb-6 pt-3 rounded bg-gray-200" id="shippingTypeDiv" style="display: none">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="transport">Shipping Type</label>

                        <div class="flex ml-3 mb-3">
                            <div class="flex items-center">
                                <input type="radio" id="ship_by_donor" name="shipping_type" value="Ship by Donor" class="form-radio h-4 w-4 text-blue-600">
                                <label for="ship_by_donor" class="font-medium text-gray-700 ml-2">Ship by Donor</label>
                            </div>
                            <div class="flex items-center ml-4">
                                <input type="radio" id="ngo_collecting" name="shipping_type" value="NGO Collecting" class="form-radio h-4 w-4 text-blue-600">
                                <label for="ngo_collecting" class="font-medium text-gray-700 ml-2">NGO Collecting</label>
                            </div>
                        </div>
                    </div>
                    <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">
                        Make Donation
                    </button>
                </form>
            </section>
        </main>


    </div>
    <script>
        document.getElementsByName("donate_type").forEach(function(element) {
            element.addEventListener("change", function() {
                var materialTypeDiv = document.getElementById("materialTypeDiv");
                var shippingTypeDiv = document.getElementById("shippingTypeDiv");
                if (this.value === "Material") {
                    materialTypeDiv.style.display = "block";
                    shippingTypeDiv.style.display = "block";
                } else {
                    materialTypeDiv.style.display = "none";
                    shippingTypeDiv.style.display = "none";
                }
            });
        });
    </script>
    <script>
        document.getElementById("project").addEventListener("change", function() {
            var locationInput = document.getElementById("location");
            if (this.value === "Reforest Brazil") {
                locationInput.value = "Brazil";
            } else if (this.value === "Clean Water") {
                locationInput.value = "Kenya";
            } else if (this.value === "Elderly Care") {
                locationInput.value = "Lithuania";
            } else {
                locationInput.value = "";
            }
        });
    </script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>