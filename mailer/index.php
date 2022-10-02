<?php 
    require 'PHPMailerAutoload.php';
    require 'credential.php';
    include("../connection/connectionPDO.php");
    session_start();

    // error_reporting(-1);
    ini_set('display_errors', 'On');
    // set_error_handler("var_dump");

    $result=array();
    //$result["data"] = [];
    $sql = "SELECT * FROM `registration` WHERE roli = 'user' ";
    $stmt = $conn->query($sql);
    while($row=$stmt->fetch())
    {
        $result[]=$row;
    }

    $mail = new PHPMailer;
    $mail->SMTPDebug = 4;                               // Enable verbose debug output
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    
    $mail->setFrom(EMAIL, 'Serxhio Bekteshi');

    $mail->addReplyTo(EMAIL);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'MUSIC TIME';
    $mail->Body    = 'Dont forget to enter our app to discover everything new related to music';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    

    foreach($result as $r)
    {
        $mail->addAddress($r["email"]);     // Add a recipient

        if(!$mail->send()) 
        {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        else 
        {
            echo 'Message has been sent to' ;
        }
    }

?>