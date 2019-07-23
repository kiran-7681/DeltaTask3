<?php
session_start();

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
	<title>Response Page</title>
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
     #buto{
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
        <h1>Response</h1>
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: black;">logout</a></p>
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
        <h2>Click the required form </h2>
      <?php
        $query = "select * from forms where status=1";
        $result = mysqli_query($db,$query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);?>
        <table border="1" id="buto">
        	<thead>
        		<th>Form ID</th>
        		<th>Forms</th>
        	</thead>
        	<tbody><?php
        	    $i=1;
        	    while ($row = mysqli_fetch_array($result))
        	    { extract($row); ?>
        	    	<tr>
        	    		<td><?php echo $id; ?> </td>
        	    		<td><a href="view.php?variable1=<?php echo $id; ?>&variable2=<?php echo $title; ?>"><?php echo $title; ?></a></td>
        	    	</tr><?php	
        	    }?>
        		
        	</tbody>
        </table>
	</div>
</div>
</body>
</html>    