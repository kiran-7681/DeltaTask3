<?php
session_start();
$id = $_GET['variable1'];
$title = $_GET['variable2'];
 if(!isset($_SESSION['username']))
  {
    $_SESSION['msg'] = "You must login first";
    header('location: login.php');
  }
 if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
 
require_once "config.php";
$username = $_SESSION['username']; 
?>

<!DOCTYPE html>
<html>
<head>
  <title>FORM</title>
  <style type="text/css">
    body{
            background: url(m.jpg) no-repeat;
            background-size: cover;
        }
        * {
     box-sizing: border-box;
    }
    [class*="col-"] {
       float: left;
       padding: 15px;
     }
     .Head{
      background-color: #262626;
      padding: 15px;
      border-radius: 30px;
    }
    .Head h1{
      color: #03a9f4;
      text-align: center;
    }
    .Head p{
      color: #4caf50;
      font-size: 20px;

    }
    .Head a{
      float: right;
      margin-top: -40px;
      margin-right: 20px;
      text-decoration: none;
      padding: 8px;
      background: #ff944d;
      color: #4caf50;
      border-radius: 20px;
    }
    .menu ul {
      background: #262626;
      padding: 25px;
      border-radius: 20px;
     }

    .menu li {
      padding: 8px;
      list-style: none;
      text-decoration: none;
      margin-bottom: 7px;
      text-align: center;
      background-color: #33b5e5;
      color: #000000;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
      border-radius: 10px;
      cursor: pointer;
    }
    .menu a{
      text-decoration: none;
      color: black;
      text-align: center;
    }
    .menu li:hover {
      background-color: #0099cc;
     }
     .details{
      margin-top: 2.5%;
      background: #262626;
      padding: 20px;
      border-radius: 30px;
     }
     #tab{
        margin-left: 40%;
     }
     .details h2{
      color: #03a9f4;
      text-align: center;
     }
     .details thead{
      background-color: #4caf50;
     }
     .details tbody{
      background-color: #03a9f4;
      text-align: center;
     }
     .details a{
        color: black;
     }
        [class*="col-"] {
        width: 100%;
     }
     @media only screen and (min-width: 768px) {
  /* For desktop: */
      .col-1 {width: 12.5%;}
      .col-2 {width: 25%;}
      .col-3 {width: 37.5%;}
      .col-4 {width: 50%;}
      .col-5 {width: 62.5%;}
      .col-6 {width: 75%;}
      .col-7 {width: 87.5%;}
      .col-8 {width: 100%;}
     }
  </style>
</head>
<body>
  <div class="Head">
    <h1>Your Response</h1>
    <?php if (isset($_SESSION['username'])) : ?>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a></p>
    <?php endif ?>
  </div>
  <div class="row">
     <div class="col-2 menu">
        <ul>
          <li><a href="index.php">Home Page</a></li>
          <li><a href="forms.php">View Forms</a></li>
          <li><a href="response.php">View Responses</a></li>
        </ul>
     </div>
     <div class="col-4 details">
     <h2>Form ID:<?php echo $id; ?></h2>
     <h2>Form Name:<?php echo $title; ?></h2>

  <?php
    $query = "select value from user_inputs where form_id='$id' ";
      $query2 = "select distinct entry_id from user_inputs where form_id='$id' ";

      $numresult = mysqli_query($db,$query2) or die(mysqli_error($db));
      $result = mysqli_query($db,$query) or die(mysqli_error($db));
      $count = mysqli_num_rows($result);
      $countrow = mysqli_num_rows($numresult); ?>
      
      <table border="1" id="tab">
          <thead>
            <th>S.no</th>
            <th colspan="<?php echo $countrow; ?>">values</th>
          </thead>
          <tbody><?php
          $j=1;
              $query_user = "select * from users where form_id='$id'";
              $result_user = mysqli_query($db,$query_user);
              while($row_user = mysqli_fetch_array($result_user))
              {
                $user_id = $row_user['id'];
                $i=1;
                $query_values = "select value from user_inputs where user_id='$user_id'";
                $result_values = mysqli_query($db,$query_values);
                while($row_fields = mysqli_fetch_array($result_values))
                {
                  
                   $cols[] =  $row_fields['value'];
                   $i++;
                } ?>
                <tr>
                  <td><?php echo $j; ?></td><?php
                  
                  for($k=0; $k<count($cols);$k++)
                  { ?>
                      <td><?php echo $cols[$k]; ?></td><?php
                  } 
                  unset($cols);
                  ?>
                </tr><?php 
                $j++;
              } ?>
              
          
          </tbody>
      </table>
    </div>
  </div>
</body>
</html>