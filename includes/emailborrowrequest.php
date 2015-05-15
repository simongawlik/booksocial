<?php
    /*
     * This file sends the request to borrow email to the owner of the book.
     * This only works on Harvard campus.
     */
     
    require_once("PHPMailer/class.phpmailer.php");

    $address = $book["email"];
    
    // instantiate mailer
    $mail = new PHPMailer();
    
    // set SMTP server:
    $mail->IsSMTP();
    $mail->Host = "smtp.fas.harvard.edu";
    
    // set From:
    $mail->SetFrom("donotreply@fas.harvard.edu");
    
    // set To:
    $mail->AddAddress($address);
    
    // set Subject:
    $mail->Subject = "Borrow Request confirmation email";
    
    // set body
    $mail->Body = "Hi {$book["owner"]},
        
    $requester would like to borrow {$book["title"]} by {$book["author"]} from you!";
    
    // send mail and apologize if it fails
    if ($mail->Send() === false)
    {
        apologize("Sending of email confimation failed.");
    }
?>
