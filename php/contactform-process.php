<?php
if(isset($_POST['submit'])){
    $errorMSG = "";
    if (empty($_POST['name'])) {
        $errorMSG = "Name is required ";
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $errorMSG = "Email is required ";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['message'])) {
        $errorMSG = "Message is required ";
    } else {
        $message = $_POST['message'];
    }

    

    $EmailTo = "abhiksi613@gmail.com";
    $Subject = "[Tujjari, Contact Us Page] New message from " . $email;

    // prepare email body text
    $Body = ' 
    <html> 
    <body> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>' .$email. '</td> 
            </tr> 
            <tr> 
                <th>Message:</th><td>'.$message.'</td> 
            </tr> 
        </table> 
    </body> 
    </html>';
    $headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

    // send email
    $success = mail($EmailTo, $Subject, $Body, $headers);

    // redirect to success page
    if ($success && $errorMSG == ""){
       echo "<script>window.open('../contactformsubmitted.php' , '_self')</script>";
    }else{
        echo "Something went wrong :(";
    }
}
?>