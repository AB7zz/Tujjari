<?php
if(isset($_POST['subscribe'])){
    $errorMSG = "";
    if (empty($_POST['email'])) {
        $errorMSG = "Email is required ";
    } else {
        $email = $_POST['email'];
    }

    

    $EmailTo = "abhiksi613@gmail.com";
    $Subject = $email . " subscribed to Tujjari";

    // prepare email body text
    $Body = ' 
    <html> 
    <body> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>' .$email. '</td> 
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
       echo "<script>window.open('https://tujjari.com' , '_self')</script>";
    }else{
        echo "Something went wrong :(";
    }
}
?>