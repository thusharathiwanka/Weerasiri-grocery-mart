<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;


  require_once '../vendor/autoload.php';
  include 'db_conn_inc.php';



  if(isset($_GET['sent'])){
    $sal_ID = $_GET['sent'];

    //Select the data from the salary table
    $query = "SELECT* from salary where salary_id = $sal_ID";
    $result = mysqli_query($conn,$query);

    if($result){
      if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
          $salary_id = $row['salary_id'];
          $emp_ID = $row['employee_id'];
          $basic_sal = $row['basic_salary'];
          $bonus = $row['bonus'];
          $netSalary = $row['net_salary'];
        }
      }
    }

    //Select fnam, lnam, email, designation, from employee table;
    $query1 = "SELECT first_name, last_name, email, designation FROM employee WHERE employee_id = $emp_ID";
    $result1 = mysqli_query($conn,$query1);

    if($result1){
      if(mysqli_num_rows($result1)){
        while ($row1 = mysqli_fetch_assoc($result1)){
          $fname = $row1['first_name'];
          $lname = $row1['last_name'];
          $email = $row1['email'];
          $designation = $row1['designation'];
        }
      }
    }

    $mpdf = new \Mpdf\Mpdf();

    $salaryDetails = '';

    $salaryDetails .= '<h1>Weerasiri Grocery Mart</h1>';
    $salaryDetails .= '<p>A1, Yakkala</p><hr>';
    $salaryDetails .= '<h2>Salary Sheet.</h2><br>';
    $salaryDetails .= '<strong>Salary ID:</strong>'.$salary_id.'<br/>';
    $salaryDetails .= '<strong>Employee ID:</strong>'.$emp_ID.'<br/>';
    $salaryDetails .= '<strong>First Name:</strong>'.$fname.'<br/>';
    $salaryDetails .= '<strong>Last Name:</strong>'.$lname.'<br/>';
    $salaryDetails .= '<strong>Designation:</strong>'.$designation.'<br/>';
    $salaryDetails .= '<strong>Basic Salary: Rs.</strong>'.$basic_sal.'<br/>';

    //Select the attendance and number of delivery according to the designation
    if($designation == 'Helper'){
      $sql2 = "SELECT attendance FROM helper WHERE helper_id = $emp_ID";
      $result1 = mysqli_query($conn,$sql2);

      if($result1){
        if(mysqli_num_rows($result1)>0){
          while ($rows1 = mysqli_fetch_assoc($result1)) {
            $type = $rows1['attendance'];

          }
        }
        $salaryDetails .= '<strong>No Of Attendance:</strong>'.$type.'<br/>';
      }
    }elseif($designation == 'Driver'){
      $sql3 = "SELECT no_of_delivery FROM driver WHERE driver_id = $emp_ID";
      $result3 = mysqli_query($conn,$sql3);

      if($result3){
        if(mysqli_num_rows($result3)>0){
          while($rows2 = mysqli_fetch_assoc($result3)){
            $type = $rows2['no_of_delivery'];

          }
        }
      }
      $salaryDetails .= '<strong>No Of delivery:</strong>'.$type.'<br/>';
    }
    $salaryDetails .= '<strong>Bonus: Rs.</strong>'.$bonus.'<br/>';
    $salaryDetails .= '<strong>Net Salary: Rs.</strong>'.$netSalary.'<br/>';
    $salaryDetails .= '<strong>Date:</strong>'.date("y/m/d").'<br/>';

    //Write PDF file
    $mpdf->writeHTML($salaryDetails);


    $pdf = $mpdf->output('','S');

    $enquirydata = [
      'Salary ID' => $salary_id,
      'Employee ID' => $emp_ID,
      'First Name' => $fname,
      'Last Name' => $lname,
      'Designation' => $designation,
      'BasicSalry' => $basic_sal,
      'Attendance' => $type,
      'No of delivery' => $type,
      'Bonus' => $bonus,
      'Net Salary' => $netSalary,
      'Email' => $email
    ];



    sendEmail($email, $pdf, $enquirydata);
    /*if(sendEmail($email, $pdf, $enquirydata)){
      header("Location: ../salaryTable.php?delete2=sent");
    }else{
      header("Location: ../salaryTable.php?delete2=notsent");
    }*/



}

function sendEmail($email, $pdf, $enquirydata){
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "weerasirigmtest@gmail.com";                     // SMTP username
    $mail->Password   = "weerasiri@123";                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom("weerasirigmtest@gmail.com", "Weerasiri Grocery Mart");
    $mail->addAddress($email);     // Add a recipient

    //String attachment
    $mail->addStringAttachment($pdf, 'salarysheet.pdf');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Subject';
    $mail->Body    = 'This is your salary sheet. If you want to do any changes please contact HR department.<b>in bold!</b>';


    $mail->send();

    header("Location: ../salary_table.php?sent=sent");

  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}


 ?>
