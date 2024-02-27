
<?php

$host = "localhost:3306";
$user = "phpmyadmin";
$password = "#Fm123456";
$database = "db_admin";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo "ERROR";
} else {
    $sql = "SELECT * FROM tbl_chatbot_knowledge;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Convert to associative array
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Get column names
        $columnNames = array_keys($rows[0]);

        // Save CSV file in current directory
        $directory = getcwd();
        $filename = $directory . '/chatbot_data.csv';

        // Open file for writing
        $file = fopen($filename, 'w');

        // Write column names to CSV
        fputcsv($file, $columnNames);

        // Write rows to CSV
        foreach ($rows as $row) {
            fputcsv($file, $row);
        }

        // Close file
        fclose($file);

        echo "Table 'chatbot_data' converted to CSV successfully.";

    } else {
        echo "No data found.";
    }

    $conn->close();
}

?>