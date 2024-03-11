<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gavirpkn_eu');
define('DB_PASSWORD', 'gavirpkn_eu');
define('DB_NAME', 'gavirpkn_eu');

/* Attempt to connect to the MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Some variables
$today = date("Y-m-d");
$todayStart = $today . " 00:00:00";
$todayEnd = $today . " 23:59:59";

// Loop through all appointments that are not reminded and are scheduled for today
$sql = "SELECT * FROM ea_appointments WHERE start_datetime BETWEEN '$todayStart' AND '$todayEnd' AND is_reminded_email = 0";
$result = $link->query($sql);
while ($row = $result->fetch_assoc()) {

    // Get the user's timezone from the database
    $userId = $row['id_users_customer'];
    $sqlUserInfo = mysqli_query($link, "SELECT timezone FROM ea_users WHERE id = '$userId'");
    $userInfo = mysqli_fetch_array($sqlUserInfo);
    $userTimezone = $userInfo['timezone'];

    // Convert appointment time and end time to user's timezone
    $appointmentTimeUTC = new DateTime($row['start_datetime'], new DateTimeZone('Europe/Rome'));
    $appointmentTimeUTC->setTimezone(new DateTimeZone('UTC'));
    $appointmentTimeUserTZ = $appointmentTimeUTC->setTimezone(new DateTimeZone($userTimezone))->format('Y-m-d H:i:s');

    $endTimeUTC = new DateTime($row['end_datetime'], new DateTimeZone('Europe/Rome'));
    $endTimeUTC->setTimezone(new DateTimeZone('UTC'));
    $endTimeUserTZ = $endTimeUTC->setTimezone(new DateTimeZone($userTimezone))->format('Y-m-d H:i:s');

    // Fetch user information from the database
    $userId = $row['id_users_customer'];
    $sqlUserInfo = mysqli_query($link, "SELECT * FROM ea_users WHERE id = '$userId'");
    $userInfo = mysqli_fetch_array($sqlUserInfo);

    $fn = $userInfo['first_name'];
    $ln = $userInfo['last_name'];
    $email = $userInfo['email'];
    $phone = $userInfo['phone_number']; // Assuming 'phone_number' column exists in 'ea_users' table
    $location = $row['location'];
    $hash = $row['hash'];
    $url = "https://extramus.naijanetsolution.com/index.php/appointments/index/" . $hash;

    sendMail($fn, $ln, $email, $appointmentTimeUserTZ, $endTimeUserTZ, $location, $url);
    sendWhatsAppReminder($fn, $ln, $phone, $appointmentTimeUserTZ, $endTimeUserTZ, $location, $url);

    // Mark the appointment as reminded in the database
    $appId = $row['id'];
    mysqli_query($link, "UPDATE ea_appointments SET is_reminded_email = 1 WHERE id = '$appId'");
}

// Close the database connection
mysqli_close($link);

function sendMail($fn, $ln, $email, $appointmentTimeUserTZ, $endTimeUserTZ, $location, $url){
    // Your email sending code here using $fn, $ln, $email, $appointmentTimeUserTZ, $endTimeUserTZ, $location, $url
    $getTimeStamp = $appointmentTimeUserTZ;
  $date = new \DateTime($getTimeStamp);

  $dateString = $date->format('Y-m-d');
  $hourString = $date->format('H');
  $minuteString = $date->format('i');
  $to = $email;

  /// E-mail subject here
  $companyName = 'Extramus';
  $logoImageUrl = 'https://extramus.naijanetsolution.com/assets/img/logo.png';
  $subject = "Appointment Reminder";

  // HTML e-mail body here
  $message = '
  <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f2f2f2;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #ffffff;
                    }
                    .header {
                        background-color: #007bff;
                        color: #ffffff;
                        padding: 20px;
                        text-align: center;
                    }
                    .content {
                        padding: 20px;
                    }
                    .footer {
                        background-color: #f2f2f2;
                        padding: 20px;
                        text-align: center;
                        font-size: 12px;
                        color: #777777;
                    }
                    .logo {
                        max-width: 200px;
                        margin: 0 auto;
                        display: block;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>' . $companyName . ' Appointment Reminder</h1>
                    </div>
                    <div class="content">
                        <h3>Dear ' . $fn . ' ' . $ln . ',</h3>
                        <p>This is a reminder for your appointment with ' . $companyName . '. Your appointment has been confirmed for:</p>
                        <p>Start: ' . $appointmentTimeUserTZ . '</p>
                        <p>End: ' . $endTimeUserTZ . '</p>
                        <p>Location: ' . $location . '</p>
                        <p>Manage: ' . $url . '</p>
                        <p>We look forward to seeing you!</p>
                        <img src="' . $logoImageUrl . '" alt="' . $companyName . ' Logo" class="logo">
                    </div>
                    <div class="footer">
                        <p>This email is for informational purposes only. Please do not reply to this email.</p>
                    </div>
                </div>
            </body>
            </html>
  ';

  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: ' . $companyName . ' <noreply@extramus.naijanetsolution.com>' . "\r\n";

  mail($to,$subject,$message,$headers);
    
}

function sendWhatsAppReminder($fn, $ln, $phone, $appointmentTimeUserTZ, $endTimeUserTZ, $location, $url){
    // Your Twilio WhatsApp sending code here
    require_once 'twilio-php-master/src/Twilio/autoload.php';

    $accountSid = 'AC5eca43109b351608a13e64eb3ce2ace4';
    $authToken = '0e760b43c723b1d993669469e740696d';
    $twilioNumber = '+12194016027';

    $client = new Twilio\Rest\Client($accountSid, $authToken);

    $messageBody = 'This is a reminder for your appointment with Extramus.' . PHP_EOL .
        'Start: ' . $appointmentTimeUserTZ . PHP_EOL .
        'End: ' . $endTimeUserTZ . PHP_EOL .
        'Location: ' . $location;

    $client->messages->create(
        'whatsapp:' . $phone,
        [
            'from' => 'whatsapp:' . $twilioNumber,
            'body' => $messageBody
        ]
    );
}
?>
