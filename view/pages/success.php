<?php
require __DIR__ . '/vendor/autoload.php';
require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");

// Set your Stripe secret key
$stripe_secret_key = "sk_test_51P2CnADCFJfa5pUXmOmN6HfcTtn05GGNWdOYCiyG1gZ1DoFddDrqriDPoUmi90h2l2l16ohgrn8jyvgxP6QQCdAm00xfC537G8";
\Stripe\Stripe::setApiKey($stripe_secret_key);

// Retrieve the session ID from the URL
$session_id = $_GET['session_id'];

if ($session_id) {
    $session = \Stripe\Checkout\Session::retrieve($session_id);

    // Retrieve the session data
    $amount = $session->amount_total / 100; // Amount in dollars
    $campaign = $session->metadata->campaign;
    $customer_email = $session->customer_details->email;

    // Sanitize input data
    $campaign = mysqli_real_escape_string($conn, $campaign);
    $customer_email = mysqli_real_escape_string($conn, $customer_email);

    // Check if the campaign exists in the campaign table
    $check_campaign_sql = "SELECT title FROM temp WHERE title = '$campaign'";
    $check_campaign_result = mysqli_query($conn, $check_campaign_sql);

    if (mysqli_num_rows($check_campaign_result) > 0) {
        // Campaign exists, proceed with insert
        $sql = "INSERT INTO `payments`(`id`, `user_email`, `campaign_title`, `amount`) VALUES (NULL, '$customer_email', '$campaign', '$amount')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>window.location.replace('homepage.php');</script>";
        } else {
            echo "Error inserting payment: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Campaign does not exist.";
    }
} else {
    echo "Error: Session ID not provided.";
}
?>
