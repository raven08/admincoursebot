<?php
$arr_default_low_respons = ["Maaf atas ketidak mampuan saya untuk mengerti.",
                            "Lebih baik tidak untuk bertanya.",
                            "Memang, hari ini sungguh menyenangkan.",
                            "Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.",
                            "Semoga harimu menyenangkan.",
                            "Ayo mendaftar di Universitas Klabat.",
                            "Kami mencoba menjadi yang terbaik.",
                            "Senang bertemu denganmu."];

$arr_default_med_respons = ["Maaf, saya tidak mengerti. Bisa diperjelas.",
                            "Mohon diperjelas pertanyaan anda.",
                            "Ada kalanya keyword tidak cocok, mohon diperjelas.",
                            "Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.",
                            "Ku coba untuk mengerti tapi tidak bisa.",
                            "Ayo mendaftar di Universitas Klabat.",
                            "Kami mencoba mengerti dan menjadi yang terbaik.",
                            "Senang bertemu denganmu. Pertanyaan yang menarik."];


// Database variable
$host="localhost:3306";
$user="phpmyadmin";
$password="#Fm123456";
$database="db_admin";

// Create connection
$conn = new mysqli($host,$user,$password,$database);

// Set time zone
date_default_timezone_set('Asia/Jakarta');

// check method post
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	// validate user input
	$email = $_POST['input-email'];
	$message = $_POST['input-message'];
	
	// Simpan kode Python dalam file
	$pythonFile = '/var/www/html/admin/adminchatbot/mobile/run_probability_similarity.py';

	// Menjalankan file Python menggunakan perintah shell_exec
	$output = exec("python3 '$pythonFile' '$message'");

	// Harus print
	//echo $output;
	
	
	// Check connection database
	if ($conn->connect_error) {
	  echo "ERROR";
	
	}else{
		
		// Mengonversi JSON menjadi array asosiatif
		try {
			$data = json_decode($output, true);

			// JIKA TIDAK ADA MASALAH
			if (isset($data[0]['answer'])) {
				// get data
				$email_user = $email;
				$id_pattern = $data[0]['id_pattern'];
				$category = $data[0]['category'];
				$user_question = $message;
				$chabot_answer = $data[0]['answer'];
				$decision_threshold = $data[0]['similarity_probability']*100;
				
				if($decision_threshold < 30){
					$randomIndex = rand(0, count($arr_default_low_respons) - 1);
					$randomItem = $arr_default_low_respons[$randomIndex];

					$chabot_answer = $randomItem;
					$data[0]['answer'] = $chabot_answer; // change value in json format
					
				}else if($decision_threshold < 70){
					$randomIndex = rand(0, count($arr_default_med_respons) - 1);
					$randomItem = $arr_default_med_respons[$randomIndex];
					
					$chabot_answer = $randomItem;
					$data[0]['answer'] = $chabot_answer; // change value in json format
				}
				
				// sql query
				$sql = "INSERT INTO `tbl_history_chat`(`email_user`, `id_pattern`, `category`, `user_question`, `chabot_answer`, `decision_threshold`, `created_at`) VALUES ('$email_user','$id_pattern','$category','$user_question','$chabot_answer','$decision_threshold', NOW());";
				
				if ($conn->query($sql) === TRUE) {
					//echo "SUCCESS";
				
				} else { 
					echo "ERROR";
				}
				
				
			}else{
				echo "ERROR";
			}
			
			// Display data (format json) to mobile setelah perubahan
			$json = json_encode($data);
			echo $json;
			
			
		} catch (Exception $e) {
			echo "ERROR";
		}
	}

}else{
	echo "ERROR";
}
?>
