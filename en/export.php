<?php
if (isset($_POST['export'])) {
    // Database connection
    $servername = "localhost";
    $username = "gavirpkn_eu";
    $password = "gavirpkn_eu";
    $dbname = "gavirpkn_eu";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch users with id_roles = 3
    $sql = "SELECT * FROM ea_users WHERE id_roles = 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create the CSV data in memory
        $csv_data = "S/N,First Name,Last Name,Email,Phone Number,Address,Nationality,Link to CV,Duration,Gender,Timezone,Language\n";
        $row_count = 0; // Initialize the row counter
        while ($row = $result->fetch_assoc()) {
            $row_count++;
            $csv_data .= $row_count . ',' . $row['first_name'] . ',' . $row['last_name'] . ',' . $row['email'] . ',' . $row['phone_number'] . ',' . $row['address'] . ',' . $row['city'] . ',' . $row['zip_code'] . ',' . $row['months'] . ',' . $row['gender'] . ',' . $row['timezone'] . ',' . $row['language'] . "\n";
        }

        // Close the database connection
        $conn->close();

        // Set headers to force download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="users_export.csv"');

        // Output the CSV data
        echo $csv_data;
        exit();
    } else {
        echo "No users found.";
    }
}
?>
