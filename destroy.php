<?php

session_destroy();
header('Location: index.html'); // redirect to the homepage after signing out
