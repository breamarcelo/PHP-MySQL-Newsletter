<?php
// declare connection variables
  $servername = "localhost";
  $username = "user";
  $password = "password";
  $dbname = "dbname";
  
// create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
// check connection
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }
  
// fetch data from database
  $sql = "SELECT email FROM table";
  $result = $conn->query($sql);

// send emails
  if($result->num_rows > 0){
    while($row =  $result->fetch_assoc()){
      $to = $row["email"];
      $subject = "Newsletter subject";
      $message = "
        <html>
        // email content
        </html>
        ";
        
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type: text/html; charset = UTF-8" . "\r\n";
      
      $headers .= "From: <webmaster@example.com>" . "\r\n";
      $headers .= "Cc: myboss@example.com" . "\r\n";
      
      $mail($to, $subject, $message, $headers);
    } echo "Newsletters sent \n";
  } else {
    echo "No subscribers found on database \n";
  }
  
  $conn->close();
?>
