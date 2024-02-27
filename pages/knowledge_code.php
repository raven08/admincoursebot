<?php
// Mengambil nilai yang dikirim dari formulir saat tombol "Submit" ditekan
if (isset($_POST['submit_knowledge'])) {
    // Mengambil nilai yang dikirim dari formulir
    $category = $_POST['category'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    // Melakukan koneksi ke database
    $host = "localhost:3306";
    $user = "phpmyadmin";
    $password = "#Fm123456";
    $database = "db_admin";

    $conn = new mysqli($host, $user, $password, $database);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menyiapkan pernyataan SQL INSERT
    $sql = "INSERT INTO tbl_chatbot_knowledge (category, question, answer, created_at) 
            VALUES ('$category', '$question', '$answer', NOW())";

    // Menjalankan pernyataan SQL
    if ($conn->query($sql) === TRUE) {
		
		$sql = "SELECT * FROM tbl_chatbot_knowledge;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Convert to associative array
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

			// Get column names
			$columnNames = array_keys($rows[0]);

			// Save CSV file in current directory
			//$directory = getcwd();
			$filename = '/var/www/html/admin/adminchatbot/mobile/chatbot_data.csv';

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
		
		
		
		
		
		
		
		
        // Mengarahkan pengguna ke halaman data_knowledge.php
        header("Location: ../pages/knowledge_data.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
