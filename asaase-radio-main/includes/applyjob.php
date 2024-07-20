<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_POST['apply'])) {
  $apply_vacancy_id = $_POST['apply_vacancy_id'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  //CV upload
  $cv_name = $_FILES['cv_name']['name'];
  $tmp_cv_name = $_FILES['cv_name']['tmp_name'];

  //new cv name
  $newCVname= date('d-m-Y-His').str_replace(" ", "", basename($cv_name));

  $query = "INSERT INTO applicant (fullname, email, phone, cv_name, cv_file, vacancy_id)
            VALUES ('$fullname', '$email', '$phone', '$newCVname', '$newCVname', '$apply_vacancy_id')";
  $result = mysqli_query($dbcon, $query);


  if ($result) {
    move_uploaded_file($tmp_cv_name,"applicants/".$newCVname);
    echo $query;
    header('location:successapply.php');
  }else{
    echo include"includes/applyerror.php";
  }

}
?>

