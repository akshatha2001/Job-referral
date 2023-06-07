<?php
@$cn=new mysqli('localhost','root','','job_referral');
    if($cn->connect_error)
    {
      echo"Could not Connect";
      exit;
    }
?>