<?php
// Get the form data
$customer_name = $_POST['customer-name'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$number_of_rooms = $_POST['number'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// Validate the form data
if (empty($customer_name) || empty($checkin) || empty($checkout) || empty($number_of_rooms) || empty($contact_number) || empty($email)) {
  // If any of the required fields are empty, display an error message
  die('Please fill out all required fields.');
}

// If the form data is valid, process it
// For example, you could insert it into a database or send it to an email address

// Insert the data into a database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO bookings (customer_name, checkin, checkout, number_of_rooms, contact_number, email, comment) VALUES (?, ?, ?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("ssisiis", $customer_name, $checkin, $checkout, $number_of_rooms, $contact_number, $email, $comment);

// Execute the statement
$stmt->execute();

// Close the statement and the connection
$stmt->close();
$conn->close();

// Or, send the data to an email address
// For example, using the PHP mail() function

// Set the recipient email address
$to = 'example@example.com';

// Set the subject of the email
$subject = 'New booking from Hotel-web';

// Set the message of the email
$message = "Customer Name: $customer_name\n" .
           "Check-in Date: $checkin\n" .
           "Check-out Date: $checkout\n" .
           "Number of Rooms: $number_of_rooms\n" .
           "Contact Number: $contact_number\n" .
           "Email: $email\n" .
           "Comment: $comment";

// Set the headers of the email
$headers = 'From: Hotel-web <noreply@hotel-web.com>' . "\r\n" .
            'Reply-To: noreply@hotel-web.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

// Send the email
mail($to, $subject, $message, $headers);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = 'contact@hotel-web.com';
  $subject = 'New message from Hotel-Web website';
  $headers = 'From: ' . $email;

  if (mail($to, $subject, $message, $headers)) {
    echo 'Your message has been sent.';
  } else {
    echo 'There was an error sending your message.';
  }

?>
