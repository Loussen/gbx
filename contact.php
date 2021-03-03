<?php
include "admin_gt7751/pages/__includes/config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

$response = json_encode(array("code"=>0, "content" => "Error system", "err_param" => ''));

if($_POST)
{
    $_POST = array_map("strip_tags", $_POST);
    extract($_POST);

    if(strlen($name)<2)
        $response = json_encode(array("code"=>0, "content" => "Error name", "err_param" => 'name'));
    elseif(strlen($email)<4 || !filter_var($email, FILTER_VALIDATE_EMAIL))
        $response = json_encode(array("code"=>0, "content" => "Error email", "err_param" => 'email'));
    elseif(strlen($message)<10)
        $response = json_encode(array("code"=>0, "content" => "Error message", "err_param" => 'message'));
    else
    {
        //Create a new PHPMailer instance
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.gih.az';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->SMTPSecure   = 'tls';                                   //Enable SMTP authentication
            $mail->Username   = 'info@gih.az';                     //SMTP username
            $mail->Password   = 'Gence#2020';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('info@gih.az', 'Mailer');
            $mail->addAddress('info@gih.az', 'Joe User');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


//            $mail->CharSet = "UTF-8";
//            $mail->IsSMTP(); // enable SMTP
//            $mail->SMTPAuth = false; // authentication enabled
//            $mail->SMTPSecure = 'tls';
//            $mail->IsHTML(true);
//            $mail->Port = 465; // or 587
//            $mail->Host = "mail.gih.az";
//            $mail->Username   = "info@gih.az"; // SMTP account username
//            $mail->Password   = "Gence#2020";        // SMTP account password
//            $mail->SetFrom("info@gih.az", "GIH E-message");
//            $mail->Subject = 'Əlaqə formu';
//            $mail->Body = $message;
//            $mail->AddAddress("info@gih.az");

            //Server settings
//            $mail->SMTPDebug = 3;                                 // Enable verbose debug output
//            $mail->isSMTP();                                      // Set mailer to use SMTP
//            $mail->Host = 'smtp.yandex.com';  // Specify main and backup SMTP servers
//            $mail->SMTPAuth = true;                               // Enable SMTP authentication
//            $mail->Username = 'fuad.hasanli@yandex.com';                 // SMTP username
//            $mail->Password = '159357fh!)(';                           // SMTP password
//            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//            $mail->Port = 587;                                    // TCP port to connect to
//
//            //Recipients
//            $mail->setFrom('fuad.hasanli@yandex.com', 'Contact');
//            $mail->addAddress('fhesenli92@gmail.com', 'Vusal');     // Add a recipient
//            $mail->addReplyTo($email, $name);
//
//            //Content
//            $mail->isHTML(true);                                  // Set email format to HTML
//            $mail->Subject = $subject;
//            $mail->AltBody = 'Test message.';
//
//            $message = "Ad : ".$name."<br />
//                        Email : ".$email."<br />
//                        Phone : ".$phone."<br />
//                        Title : ".$subject."<br />
//                        Mesaj : ".$message."<br /><br />";
//
//            $mail->Body    = $message;
            $date = date("Y-m-d H:i:s");

            $insert = mysqli_query($db,"insert into `appointment_users` (`name`,`email`,`message`,`datetime`) values ('$name','$email','$message', '$date')");

            if($mail->send() && $insert)
            {
                $response = json_encode(array("code"=>1, "content" => "Success", "err_param" => ''));
            }
            else
            {
                echo $mail->ErrorInfo;
                $response = json_encode(array("code"=>0, "content" => "Error", "err_param" => ''));
            }
            

        } catch (Exception $e) {
            echo $e->getMessage(); exit;
            $response = json_encode(array("code"=>-1, "content" => "Try again", "err_param" => ''));
        }
    }
}

echo $response;
?>
