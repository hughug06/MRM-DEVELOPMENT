<?php 
require '../../Database/database.php';
session_start();

if(isset($_POST['save'])){
    $id = 1;
    $title1 = $_POST['title1'];
    $words = preg_split('/\s+/', $title1);
    // Check if there is more than one word
    if (count($words) > 1) {
        // First word
        $title1_f = $words[0];

        // Last word
        $title1_l = $words[count($words) - 1];

        // Middle words (if any)
        $middleWords = array_slice($words, 1, count($words) - 2);
        $title1_d = implode(' ', $middleWords);
    } else {
        // Handle case when only one word exists in the title
        $title1_f = $title1;
        $title1_d = '';
        $title1_l = $title1;
    }

    $desc1 = $_POST['desc1'];
    $title2 = $_POST['title2'];
    $desc2 = $_POST['desc2'];
    $goal1 = $_POST['goal1'];
    $goal2 = $_POST['goal2'];
    $goal3 = $_POST['goal3'];
    $goal4 = $_POST['goal4'];
    $desc3 = $_POST['desc3'];
    $desc4 = $_POST['desc4'];
    $faqdesc = $_POST['faqdesc'];
    $faq_q1 = $_POST['faq_q1'];
    $faq_q2 = $_POST['faq_q2'];
    $faq_q3 = $_POST['faq_q3'];
    $faq_q4 = $_POST['faq_q4'];
    $faq_q5 = $_POST['faq_q5'];
    $faq_q6 = $_POST['faq_q6'];
    $faq_q7 = $_POST['faq_q7'];
    $faq_q8 = $_POST['faq_q8'];
    $faq_q9 = $_POST['faq_q9'];
    $faq_q10 = $_POST['faq_q10'];
    $faq_a1 = $_POST['faq_a1'];
    $faq_a2 = $_POST['faq_a2'];
    $faq_a3 = $_POST['faq_a3'];
    $faq_a4 = $_POST['faq_a4'];
    $faq_a5 = $_POST['faq_a5'];
    $faq_a6 = $_POST['faq_a6'];
    $faq_a7 = $_POST['faq_a7'];
    $faq_a8 = $_POST['faq_a8'];
    $faq_a9 = $_POST['faq_a9'];
    $faq_a10 = $_POST['faq_a10'];
    $pj1_title = $_POST['pj1_title'];
    $pj2_title = $_POST['pj2_title'];
    $pj3_title = $_POST['pj3_title'];
    $pj4_title = $_POST['pj4_title'];
    $pj5_title = $_POST['pj5_title'];
    $pj6_title = $_POST['pj6_title'];
    $pj1_desc = $_POST['pj1_desc'];
    $pj2_desc = $_POST['pj2_desc'];
    $pj3_desc = $_POST['pj3_desc'];
    $pj4_desc = $_POST['pj4_desc'];
    $pj5_desc = $_POST['pj5_desc'];
    $pj6_desc = $_POST['pj6_desc'];
    $xp1_name = $_POST['xp1_name'];
    $xp1_comment = $_POST['xp1_comment'];
    $xp2_name = $_POST['xp2_name'];
    $xp2_comment = $_POST['xp2_comment'];
    $xp3_name = $_POST['xp3_name'];
    $xp3_comment = $_POST['xp3_comment'];
    $about = $_POST['about'];


    $title_array =[
        "title1_f" => $title1_f,
        "title1_d" => $title1_d,
        "title1_l" => $title1_l,
        "title2" => $title2
    ];

    $description =[
        "desc1" => $desc1,
        "desc2" => $desc2,
        "desc3" => $desc3,
        "desc4" => $desc4,
        "about" => $about
    ];

    $goals =[
        "goal1" => $goal1,
        "goal2" => $goal2,
        "goal3" => $goal3,
        "goal4" => $goal4
    ];

    $faqs =[
        "faqdesc" => $faqdesc,
        "faq_q1" => $faq_q1,
        "faq_q2" => $faq_q2,
        "faq_q3" => $faq_q3,
        "faq_q4" => $faq_q4,
        "faq_q5" => $faq_q5,
        "faq_q6" => $faq_q6,
        "faq_q7" => $faq_q7,
        "faq_q8" => $faq_q8,
        "faq_q9" => $faq_q9,
        "faq_q10" => $faq_q10,
        "faq_a1" => $faq_a1,
        "faq_a2" => $faq_a2,
        "faq_a3" => $faq_a3,
        "faq_a4" => $faq_a4,
        "faq_a5" => $faq_a5,
        "faq_a6" => $faq_a6,
        "faq_a7" => $faq_a7,
        "faq_a8" => $faq_a8,
        "faq_a9" => $faq_a9,
        "faq_a10" => $faq_a10
    ];

    $projects =[
        "pj1_title" => $pj1_title,
        "pj2_title" => $pj2_title,
        "pj3_title" => $pj3_title,
        "pj4_title" => $pj4_title,
        "pj5_title" => $pj5_title,
        "pj6_title" => $pj6_title,
        "pj1_desc" => $pj1_desc,
        "pj2_desc" => $pj2_desc,
        "pj3_desc" => $pj3_desc,
        "pj4_desc" => $pj4_desc,
        "pj5_desc" => $pj5_desc,
        "pj6_desc" => $pj6_desc
    ];

    $xp =[
        "xp1_name" => $xp1_name,
        "xp2_name" => $xp2_name,
        "xp3_name" => $xp3_name,
        "xp1_comment" => $xp1_comment,
        "xp2_comment" => $xp2_comment,
        "xp3_comment" => $xp3_comment
    ];
    

    $json_title = json_encode($title_array);
    $json_desc = json_encode($description);
    $json_goals = json_encode($goals);
    $json_faqs = json_encode($faqs);
    $json_projects = json_encode($projects);
    $json_xp = json_encode($xp);

    $images = []; // Initialize an array to hold the names of the images for database storage

foreach ($_FILES as $key => $file) {
    // Only process keys that start with 'image' (these represent images)
    if (strpos($key, 'image') === 0 && $file['error'] === UPLOAD_ERR_OK) {
        // Check if there is an uploaded file and no errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Generate a unique name for the file
            $uploadDir = '../../assets/images/landing/';
            $fileName = basename($file['name']);
            $uniqueFileName = uniqid() . '_' . $fileName; // Unique file name for storage
            $uniqueFilePath = $uploadDir . $uniqueFileName; // Full file path for uploading

            // Ensure the upload directory exists
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($file['tmp_name'], $uniqueFilePath)) {
                // Store only the file name (without the path) for the database
                $images[] = $uniqueFileName;
            } else {
                // Handle the error during file upload
                echo "Failed to upload file: {$file['name']}";
            }
        } else {
            // Handle file upload errors
            echo "Error with file: {$file['name']}";
        }
    }
}

    // Convert the images array to JSON
    $imagesJson = json_encode($images);


    // Prepare the SQL query with placeholders
$sql = "UPDATE landing_page_info SET title=?, description=?, goals=?, faq=?, projects=?, user_experience=?, images=? WHERE id=?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameters
mysqli_stmt_bind_param(
    $stmt, 
    'sssssssi',  // 's' for string (for json data), 'i' for integer (for the id)
    $json_title, 
    $json_desc, 
    $json_goals, 
    $json_faqs, 
    $json_projects, 
    $json_xp, 
    $imagesJson,
    $id
);

// Execute the query
$result = mysqli_stmt_execute($stmt);
    echo json_encode(['success' => true]);
  
}


else{
  echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}

$conn->close();
?>