<?php
// The contact Us Form want work with Local Host but it will work on Live Server
if(isset($_REQUEST['submit'])) {
 // Checking for Empty Fields
 if(($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")){
  // msg displayed if required field missing

  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  
 } else {
 $name = $_REQUEST['name'];
 $subject = $_REQUEST['subject'];
 $email = $_REQUEST['email'];
 $message = $_REQUEST['message'];

 $mailTo = "..com";
 $headers = "From: ". $email;
 $txt = "You have received an email from ". $name. ".\n\n".$message;
 mail($mailTo, $subject, $txt, $headers);
 $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Sent Successfully </div>';

}
}
?>




<div class="col-md-8">
          <form action="" method="POST">
        <input type="text" class="form-control" name="name"
        placeholder="Name"><br>
        <input type="text" class="form-control" name="subject"
        placeholder="Subject"><br>
        <input type="email" class="form-control" name="email"
        placeholder="Email"><br>
        <textarea class="form-control" name="message"
        placeholder="How can we help you?" style="height:150px;"></textarea><br>
        <input type="submit" class="btn btn-primary" value="send" name="submit"><br><br>
      </form>
    </div>