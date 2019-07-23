<?php 
require_once "config.php";
$id = $_REQUEST['id'];
$query = "select * from fields where form_id='$id'";
$result = mysqli_query($db,$query) or die(mysqli_error($db));

$query_forms = "select id,title,description from forms  where id='$id'";
$result_forms = mysqli_query($db,$query_forms) or die(mysqli_error($db));
$row_form = mysqli_fetch_array($result_forms);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row_form['title']; ?></title>
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
    .details{
      margin-top: 2.5%;
      background: #262626;
      padding: 20px;
      border-radius: 30px;
     }
     .details h2{
      color: #4caf50;
      text-align: center;
     }
     .details input[type="text"] , input[type="number"]{
      background: none;
      outline: none;
      padding: 10px;
      text-align: center;
      color: #03a9f4;
      border: 2px solid #4caf50;
      border-radius: 20px;
      margin-bottom: 15px;

     }
     .details label{
      color: white;
      font-size: 23px;
      margin-left: 30%;
     }
     .btn{
      background: none;
      outline: none;
      border:2px solid #4caf50;
      padding: 10px;
      font-size: 15px;
      margin-bottom: 10px;
      color: white;
      color: pointer;
      margin-left: 30%;
      border-radius: 20px;
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
    <h1>Submit your responses here</h1>
  </div>
  <div class="col-4 details">
		<h2> Name:<?php echo $row_form['title']; ?></h2>
  		<h2>Description:<?php echo $row_form['description']; ?></h2>
		<?php if (isset($_SESSION['form_result'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['form_result']; 
          	unset($_SESSION['form_result']);
          ?>
      	</h3>
      </div>
      <?php endif ?>
	<form action="server.php?" id="fill_response" method="post">
		<input type="hidden" name="form_id" value="<?php echo $id; ?>"/>
		 <?php
		$i=1;
		while($row = mysqli_fetch_array($result))
		{ extract($row);?>
			<div class="textbox">
			<label for=""><?php echo $label;?></label>
			<input type="hidden" name="fields_id[]" value="<?php echo $fields_id;?>"/>
			<input type="<?php echo $type; ?>" name="value<?php echo $i++; ?>" value=""/> <br><?php
		} ?>
	</div>
		<button type="submit" class="btn" name="fill_response">Submit</button>
	</div>
	</form>