<?php
require __DIR__ . '/../route.php';





$site_url = $_ENV['site4'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use setasign\Fpdi\Fpdi;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$errors = array();
$toast = array();
// $GLOBALS['$errors']= array();
// connect to the database
$db = mysqli_connect($_ENV['host'], $_ENV['user'], $_ENV['pass'], $_ENV['database4']);
$access_key = $_ENV['ipapi'];
date_default_timezone_set('Asia/Kuala_Lumpur');


// REGISTER USER


function debug_to_console($data)
{
  $enable = 1;
  $output = $data;
  if (is_array($output))
    $output = implode(',', $output);
  if ($enable) {
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
}






//validation on label

function formvalidatelabel($key, $arr)
{

  if ($arr) {
    $error = "";
    if (array_key_exists($key, $arr)) {

      if ($arr[$key]) {
        echo "is-invalid";
      } else {
        echo "is-valid";

      }


    } else {
      echo "is-valid";

    }
  }


}
//validation on label

function formvalidateerr($key, $arr)
{
  if ($arr) {

    if (array_key_exists($key, $arr)) {
      echo $arr[$key];




    }
  }
}
//check pic by id

function checkuploadpid($id, &$err)
{

  $uploadOk = 1;


  $target_dir = "./assets/images/user/test/";

  $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
  // $check = getimagesize($_FILES["gambar"]["tmp_name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target_file = $target_dir . "gambar." . $imageFileType;

  echo $imageFileType;

  if ($_FILES["gambar"]["size"] > 500000) {
    $err['gambar'] = "Image too large";
    $uploadOk = 0;

  }
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $err['gambar'] = "Sorry, only JPG, JPEG & PNG  files are allowed.";
    $uploadOk = 0;

  }

}
//upload pic by id

function uploadpic_id($id, &$err)
{
  $uploadOk = 1;

  if (!is_dir("./assets/images/user/$id/")) {
    mkdir("./assets/images/user/$id/", 0755, true);
  }

  $target_dir = "./assets/images/user/$id/";

  $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
  // $check = getimagesize($_FILES["gambar"]["tmp_name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target_file = $target_dir . "gambar." . $imageFileType;


  if ($_FILES["gambar"]["size"] > 500000) {
    $err['gambar'] = "File too large";
    $uploadOk = 0;

  }
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $err['gambar'] = "Sorry, only JPG, JPEG & PNG  files are allowed.";
    $uploadOk = 0;

  }
  if ($uploadOk == 1) {

    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
      $err['gambar'] = "Sorry, there was an error uploading your file.";
    } else {
      return "gambar." . $imageFileType;

    }
  }

}

function showtoast($message, &$toast)
{
  array_push($toast, $message);


  echo '<script>document.addEventListener("DOMContentLoaded", function(event){
  $.each($(".toast"), function (i, item) {coreui.Toast.getOrCreateInstance(item).show();});
});</script>';
}


function showmodal($modal_name)
{




  echo '    <script>  const myModal = new coreui.Modal("#' . $modal_name . '")
      myModal.show();</script>';
}

// verify_email.php

if (isset($_GET['admin_token'])) {
  $token = $_GET['admin_token'];

  // Check if token exists and is not expired
  $query = "SELECT * FROM email_verification  WHERE token = '$token' LIMIT 1";
  $results = mysqli_query($db, $query);
  $row = $result->fetch_assoc();

  if ($row && strtotime($row['expires_at']) > time()) {
    // Token is valid and not expired
    $id = $row['user_id'];

    // Update the admin's status to verified
    $query = "UPDATE user SET email_verified = 1 WHERE id = '$id'";
    $results = mysqli_query($db, $query);

    // Delete the token after verification
    $query = "DELETE FROM   email_verification   WHERE user_id = '$id'";

    $results = mysqli_query($db, $query);


    echo "Email successfully verified!";
  } else {
    echo "Invalid or expired token.";
  }
}


function validateAdminEmail($email)
{
  // Check if the email starts with 8 digits
  if (preg_match('/^\d{8}@/', $email)) {
    return false; // Invalid for admin email
  }
  return true; // Valid for admin email
}

function generateVerificationToken($id, $db)
{
  $token = bin2hex(random_bytes(32)); // Generate a secure random token
  $expiresAt = date('Y-m-d H:i:s', strtotime('+1 day')); // Set expiration time (e.g., 1 day from now)

  // Insert the token into the email_verification_tokens table

  $query = "INSERT INTO  email_verification (user_id, token, expires_at) VALUES ('$id','$token','$expiresAt')";
  $results = mysqli_query($db, $query);

  return $token;
}



function getEmailContent($filePath, $var = "")
{
  ob_start(); // Start output buffering
  extract($var);
  include(getcwd() . '/views/email/' . $filePath); // Include the PHP file
  $content = ob_get_clean(); // Get the content of the output buffer and clean it
  return $content;


}

function sendmail($receiver, $title, $filepath, $var = "")
{





  $mail = new PHPMailer(true);

  try {

    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'fast.e-veterinar.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['email4_username'];
    $mail->Password = $_ENV['email4_password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465; // Adjust as needed (e.g., 465 for SSL)


    $mail->setFrom('kedatangan@fast.e-veterinar.com', 'Attendance');
    $mail->addAddress($receiver);


    $emailBodyContent = getEmailContent($filepath, $var);


    // $mail->addEmbeddedImage(getcwd() . '/assets/img/logo3.png', 'logo_cid'); // 'logo_cid' is a unique ID

    if ($var['attachment']) {


      $mail->addAttachment($var['attachment'], $var['attachment_name']);
    }


    $mail->isHTML(true);

    $mail->Subject = $title;
    if (!$var) {


      $mail->Body = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    } else {
      $mail->Body = $emailBodyContent;         // Set the body with the content from the .php file
      $mail->AltBody = $title;
    }
    $mail->send();
    // echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}














function generateQRCodeWithLogo($data, $logoPath)
{
  $options = new QROptions([
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel' => QRCode::ECC_H,
    'scale' => 10,
    'imageBase64' => false, // We will convert to base64 manually
  ]);

  // Generate the QR code image
  $qrOutputInterface = new QRCode($options);
  $qrImage = $qrOutputInterface->render($data);

  // Load the QR code and logo images
  $qrImageResource = imagecreatefromstring($qrImage);
  $logoImageResource = imagecreatefrompng($logoPath);

  // Get dimensions
  $qrWidth = imagesx($qrImageResource);
  $qrHeight = imagesy($qrImageResource);
  $logoWidth = imagesx($logoImageResource);
  $logoHeight = imagesy($logoImageResource);

  // Calculate logo placement
  $logoQRWidth = $qrWidth / 5; // Logo will cover 1/5th of the QR code
  $scaleFactor = $logoWidth / $logoQRWidth;
  $logoQRHeight = $logoHeight / $scaleFactor;

  $xPos = ($qrWidth - $logoQRWidth) / 2;
  $yPos = ($qrHeight - $logoQRHeight) / 2;

  // Merge logo onto QR code
  imagecopyresampled(
    $qrImageResource,
    $logoImageResource,
    $xPos,
    $yPos,
    0,
    0,
    $logoQRWidth,
    $logoQRHeight,
    $logoWidth,
    $logoHeight
  );

  // Output QR code with logo to a string
  ob_start();
  imagepng($qrImageResource);
  $outputImage = ob_get_clean();

  // Convert to base64
  $base64 = base64_encode($outputImage);

  // Free memory
  imagedestroy($qrImageResource);
  imagedestroy($logoImageResource);

  return $base64;
}


function calculateAge($birthDate)
{
  // Convert the birth date to a timestamp
  $birthDate = strtotime($birthDate);

  // Get the current date
  $currentDate = time();

  // Calculate the difference in years
  $age = floor(($currentDate - $birthDate) / (365.25 * 24 * 60 * 60));

  return $age;
}



function trackVisitor($access_key, &$db)
{
  // Get visitor's IP address
  $ip_address = $_SERVER['REMOTE_ADDR'];

  // Get visitor's user agent (browser info)
  $user_agent = $_SERVER['HTTP_USER_AGENT'];

  // Get the current page URL
  $page_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  // Full URL

  // Geolocation API: Use ipinfo.io to get location details from the IP address
  $location_data = file_get_contents("http://ipinfo.io/$ip_address/json?token=$access_key");
  $location_data = json_decode($location_data, true);

  // Extract geolocation details (default to 'Unknown' if not available)
  $city = isset($location_data['city']) ? $location_data['city'] : 'Unknown';
  $region = isset($location_data['region']) ? $location_data['region'] : 'Unknown';
  $country = isset($location_data['country']) ? $location_data['country'] : 'Unknown';

  // Prepare the SQL query to insert visitor data into the database using MySQLi
  $query = "INSERT INTO visitors (ip, user_agent, page_url, city, region, country) 
            VALUES ('$ip_address', '$user_agent', '$page_url', '$city', '$region', '$country')";

  // Execute the query and check for success
  if ($db->query($query)) {
    // echo "Visitor information recorded successfully.";
  } else {
    // echo "Error: " . $db->error;
  }
}


if (isset($_POST['visitor_info'])) {


  // Check for connection errors


  // Get visitor data from POST request
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $user_agent = $_POST['user_agent'];
  $page_url = $_POST['page_url'];

  // Fetch geolocation information securely using server-side API key
  // Make a request to the ipinfo.io API to get geolocation data
  $location_data = file_get_contents("http://ipinfo.io/$ip_address/json?token=$access_key");
  $location_data = json_decode($location_data, true);

  // Extract geolocation details (default to 'Unknown' if not available)
  $city = isset($location_data['city']) ? $location_data['city'] : 'Unknown';
  $region = isset($location_data['region']) ? $location_data['region'] : 'Unknown';
  $country = isset($location_data['country']) ? $location_data['country'] : 'Unknown';

  // Prepare and bind the SQL query using MySQLi
  $stmt = $db->prepare("INSERT INTO visitors (ip, user_agent, page_url, city, region, country) 
                        VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $ip_address, $user_agent, $page_url, $city, $region, $country);

  // Execute the query and check for success
  if ($stmt->execute()) {
    // echo json_encode(["status" => "success", "message" => "Visitor information recorded successfully."]);
  } else {
    // echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
  }

}


if (isset($_POST['visitor_click'])) {


  // Get visitor data from POST request
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $user_agent = $_POST['user_agent'];
  $click_url = $_POST['click_url'];

  // Fetch geolocation information securely using server-side API key
  // Make a request to the ipinfo.io API to get geolocation data
  $location_data = file_get_contents("http://ipinfo.io/$ip_address/json?token=$access_key");
  $location_data = json_decode($location_data, true);

  // Extract geolocation details (default to 'Unknown' if not available)
  $city = isset($location_data['city']) ? $location_data['city'] : 'Unknown';
  $region = isset($location_data['region']) ? $location_data['region'] : 'Unknown';
  $country = isset($location_data['country']) ? $location_data['country'] : 'Unknown';

  // Prepare and bind the SQL query using MySQLi
  $stmt = $db->prepare("INSERT INTO clicks (ip, user_agent, click_url, city, region, country) 
                        VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $ip_address, $user_agent, $click_url, $city, $region, $country);

  // Execute the query and check for success
  if ($stmt->execute()) {
    // echo json_encode(["status" => "success", "message" => "Visitor information recorded successfully."]);
  } else {
    // echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
  }

}


if (isset($_POST['get_visitor_data'])) {
  $filter = $_POST['get_visitor_data']['filter'];

  switch ($filter) {
    case 'today':
      $date_filter = date('Y-m-d');  // Today's date
      $query = "SELECT *  FROM visitors WHERE DATE(visit_time) = ?";
      break;

    case 'month':
      $date_filter = date('Y-m');  // Current month
      $query = "SELECT * FROM visitors WHERE DATE_FORMAT(visit_time, '%Y-%m') = ?";
      break;

    case 'year':
      $date_filter = date('Y');  // Current year
      $query = "SELECT * FROM visitors WHERE YEAR(visit_time) = ?";
      break;

    default:
      echo json_encode(["status" => "error", "message" => "Invalid filter"]);
      exit();
  }

  if ($stmt = $db->prepare($query)) {
    $stmt->bind_param('s', $date_filter);  // Bind the filter date
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize the response data
    $visitorCount = 0;
    $details = [];

    while ($row = $result->fetch_assoc()) {
      $visitorCount++;
      $details[] = [
        'ip_address' => $row['ip'],
        'user_agent' => $row['user_agent'],
        'page_url' => $row['page_url'],
      ];
    }

    // Get the previous count (for comparison)
    $previousCountQuery = "SELECT COUNT(*) AS previous_count FROM visitors WHERE DATE(visit_time) < ?";
    $stmt2 = $db->prepare($previousCountQuery);
    $stmt2->bind_param('s', $date_filter); // Previous count before the selected date range
    $stmt2->execute();
    $stmt2->bind_result($previousCount);
    $stmt2->fetch();

    // Calculate the percentage change if previous count exists
    $percentageChange = 0;
    $status = 'no change'; // Default status

    if ($previousCount > 0) {
      // Calculate percentage change
      $percentageChange = (($visitorCount - $previousCount) / $previousCount) * 100;

      // Determine if it's an increase or decrease
      if ($percentageChange > 0) {
        $status = 'increase';
      } elseif ($percentageChange < 0) {
        $status = 'decrease';
      } 


      
    } else {
      $percentageChange = ($visitorCount ) * 100;

        $status = 'increase';
    }

    // Example: Add change percentage to response
    $changePercentage = round($percentageChange, 2); // Round to 2 decimal places

    // Return the response as JSON
    $response = [
      "status" => "success",
      "visitorCount" => $visitorCount,
      "changePercentage" => $changePercentage,
      "statusText" => $status, // 'increase', 'decrease', or 'no change'
      "details" => $details
    ];

    // Set the correct header and output JSON
    header('Content-Type: application/json');
    echo json_encode($response);
  } else {
    echo json_encode(["status" => "error", "message" => "Error preparing the query"]);
  }
}




if (isset($_POST['get_click_data'])) {
  $filter = $_POST['get_click_data']['filter'];

  switch ($filter) {
    case 'today':
      $date_filter = date('Y-m-d');  // Today's date
      $query = "SELECT *  FROM clicks WHERE DATE(click_time) = ?";
      break;

    case 'month':
      $date_filter = date('Y-m');  // Current month
      $query = "SELECT * FROM clicks WHERE DATE_FORMAT(click_time, '%Y-%m') = ?";
      break;

    case 'year':
      $date_filter = date('Y');  // Current year
      $query = "SELECT * FROM clicks WHERE YEAR(click_time) = ?";
      break;

    default:
      echo json_encode(["status" => "error", "message" => "Invalid filter"]);
      exit();
  }

  if ($stmt = $db->prepare($query)) {
    $stmt->bind_param('s', $date_filter);  // Bind the filter date
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize the response data
    $clickCount = 0;
    $details = [];

    while ($row = $result->fetch_assoc()) {
      $clickCount++;
      $details[] = [
        'ip_address' => $row['ip'],
        'user_agent' => $row['user_agent'],
        'click_url' => $row['click_url'],
      ];
    }

    // Get the previous count (for comparison)
    $previousCountQuery = "SELECT COUNT(*) AS previous_count FROM clicks WHERE DATE(click_time) < ?";
    $stmt2 = $db->prepare($previousCountQuery);
    $stmt2->bind_param('s', $date_filter); // Previous count before the selected date range
    $stmt2->execute();
    $stmt2->bind_result($previousCount);
    $stmt2->fetch();

    // Calculate the percentage change if previous count exists
    $percentageChange = 0;
    $status = 'no change'; // Default status

    if ($previousCount > 0) {
      // Calculate percentage change
      $percentageChange = (($clickCount - $previousCount) / $previousCount) * 100;

      // Determine if it's an increase or decrease
      if ($percentageChange > 0) {
        $status = 'increase';
      } elseif ($percentageChange < 0) {
        $status = 'decrease';
      } 


      
    } else {
      $percentageChange = ($clickCount ) * 100;

        $status = 'increase';
    }

    // Example: Add change percentage to response
    $changePercentage = round($percentageChange, 2); // Round to 2 decimal places

    // Return the response as JSON
    $response = [
      "status" => "success",
      "clickCount" => $clickCount,
      "changePercentage" => $changePercentage,
      "statusText" => $status, // 'increase', 'decrease', or 'no change'
      "details" => $details
    ];

    // Set the correct header and output JSON
    header('Content-Type: application/json');
    echo json_encode($response);
  } else {
    echo json_encode(["status" => "error", "message" => "Error preparing the query"]);
  }
}


if (isset($_POST['get_report_data'])) {
  $filter = $_POST['get_report_data']['filter'];

  // Initialize query variables
  $query = '';
  $query2 = '';

  switch ($filter) {
      case 'today':
          $date_filter = date('Y-m-d');  // Today's date
          $query = "SELECT * FROM clicks WHERE DATE(click_time) = ?";
          $query2 = "SELECT * FROM visitors WHERE DATE(visit_time) = ?";
          break;

      case 'month':
          $date_filter = date('Y-m');  // Current month
          $query = "SELECT * FROM clicks WHERE DATE_FORMAT(click_time, '%Y-%m') = ?";
          $query2 = "SELECT * FROM visitors WHERE DATE_FORMAT(visit_time, '%Y-%m') = ?";
          break;

      case 'year':
          $date_filter = date('Y');  // Current year
          $query = "SELECT * FROM clicks WHERE YEAR(click_time) = ?";
          $query2 = "SELECT * FROM visitors WHERE YEAR(visit_time) = ?";
          break;

      default:
          echo json_encode(["status" => "error", "message" => "Invalid filter"]);
          exit();
  }

  // Fetching data for clicks
  if ($stmt = $db->prepare($query)) {
      $stmt->bind_param('s', $date_filter);
      $stmt->execute();
      $result = $stmt->get_result();

      $clickCount = 0;
      $clickDetails = [];
      $clickDates = [];

      while ($row = $result->fetch_assoc()) {
          $clickCount++;
          $clickDetails[] = [
              'ip_address' => $row['ip'],
              'user_agent' => $row['user_agent'],
              'click_url' => $row['click_url'],
          ];

          // Collect dates for chart plotting
          $clickDates[] = $row['click_time']; // Store the click date for charting
      }

      // Free the result set explicitly after processing
      $result->free();

      // Fetch previous count for clicks (to calculate change percentage)
      $previousCountQuery = "SELECT COUNT(*) AS previous_count FROM clicks WHERE DATE(click_time) < ?";
      if ($stmt2 = $db->prepare($previousCountQuery)) {
          $stmt2->bind_param('s', $date_filter);
          $stmt2->execute();
          $stmt2->bind_result($previousClickCount);
          $stmt2->fetch();

          $clickPercentageChange = 0;
          $clickStatus = 'no change';

          if ($previousClickCount > 0) {
              // Calculate percentage change
              $clickPercentageChange = (($clickCount - $previousClickCount) / $previousClickCount) * 100;
              $clickStatus = $clickPercentageChange > 0 ? 'increase' : ($clickPercentageChange < 0 ? 'decrease' : 'no change');
          } else {
              $clickPercentageChange = ($clickCount) * 100;
              $clickStatus = 'increase';
          }

          $clickChangePercentage = round($clickPercentageChange, 2);

          // Close statement after processing
          $stmt2->close();
      }
      $stmt->close();
  } else {
      echo json_encode(["status" => "error", "message" => "Error preparing the clicks query"]);
      exit();
  }

  // Fetching data for visitors
  if ($stmt2 = $db->prepare($query2)) {
      $stmt2->bind_param('s', $date_filter);
      $stmt2->execute();
      $result2 = $stmt2->get_result();

      $visitorCount = 0;
      $visitorDetails = [];
      $visitorDates = [];

      while ($row = $result2->fetch_assoc()) {
          $visitorCount++;
          $visitorDetails[] = [
              'ip_address' => $row['ip'],
              'user_agent' => $row['user_agent'],
          ];

          // Collect dates for chart plotting
          $visitorDates[] = $row['visit_time']; // Store visitor date for charting
      }

      // Free the result set explicitly after processing
      $result2->free();

      // Fetch previous count for visitors (to calculate change percentage)
      $previousVisitorCountQuery = "SELECT COUNT(*) AS previous_count FROM visitors WHERE DATE(visit_time) < ?";
      if ($stmt3 = $db->prepare($previousVisitorCountQuery)) {
          $stmt3->bind_param('s', $date_filter);
          $stmt3->execute();
          $stmt3->bind_result($previousVisitorCount);
          $stmt3->fetch();

          $visitorPercentageChange = 0;
          $visitorStatus = 'no change';

          if ($previousVisitorCount > 0) {
              // Calculate percentage change
              $visitorPercentageChange = (($visitorCount - $previousVisitorCount) / $previousVisitorCount) * 100;
              $visitorStatus = $visitorPercentageChange > 0 ? 'increase' : ($visitorPercentageChange < 0 ? 'decrease' : 'no change');
          } else {
              $visitorPercentageChange = ($visitorCount) * 100;
              $visitorStatus = 'increase';
          }

          $visitorChangePercentage = round($visitorPercentageChange, 2);

          // Close statement after processing
          $stmt3->close();
      }
      $stmt2->close();
  } else {
      echo json_encode(["status" => "error", "message" => "Error preparing the visitors query"]);
      exit();
  }

  // Return the response as JSON
  $response = [
      "status" => "success",
      "clickCount" => $clickCount,
      "visitorCount" => $visitorCount,
      "clickChangePercentage" => $clickChangePercentage,
      "visitorChangePercentage" => $visitorChangePercentage,
      "clickStatus" => $clickStatus,
      "visitorStatus" => $visitorStatus,
      "clickDetails" => $clickDetails,
      "visitorDetails" => $visitorDetails,
      "clickDates" => $clickDates,
      "visitorDates" => $visitorDates,
  ];

  // Set the correct header and output JSON
  header('Content-Type: application/json');
  echo json_encode($response);
}



?>