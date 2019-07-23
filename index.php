<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
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
	<title>Home Page</title>
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
    .img_tag{
      width: 18px;
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
     .details h2{
      color: #03a9f4;
      text-align: center;
     }
     .details input[type="text"],textarea{
      background: none;
      padding: 10px;
      border: 2px solid #4caf50;
      border-radius: 20px;
      color: white;
      margin-left: 25%;
      text-align: center;
     }
     .btn,.btn1{
      background: none;
      outline: none;
      border:2px solid #4caf50;
      padding: 10px;
      font-size: 15px;
      margin-bottom: 10px;
      color: white;
      color: pointer;
      margin-left: 25%;
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
  <script type="text/javascript">

     var tcounter = 0;
     var dcounter = 0;


     function nameFunction()
     {
      var span_tag = document.createElement('span');
      var name_tag = document.createElement('INPUT');
      name_tag.setAttribute("type","text");
      name_tag.setAttribute("placeholder","Enter Label Name");
      var img_tag = document.createElement("IMG");
      img_tag.setAttribute("src","delete.png");
      img_tag.setAttribute("class","img_tag");
      
      var select_tag = document.createElement('SELECT');
      select_tag.options.add( new Option("text","text", true, true) );
      select_tag.options.add( new Option("number","number"));

      var mybr = document.createElement('br');
      span_tag.appendChild(mybr);

      increment();
      name_tag.setAttribute("Name","textelement[]");
      name_tag.setAttribute("id","textelement_"+ i);
      span_tag.appendChild(name_tag);

      span_tag.appendChild(select_tag);
      select_tag.setAttribute("Name","options[]");
      span_tag.appendChild(select_tag);

      img_tag.setAttribute("onclick","removeElement('myForm','id_"+ i +"')");
      span_tag.appendChild(img_tag);

      span_tag.setAttribute("id","id_"+i);
      document.getElementById("myForm").appendChild(span_tag)
    }
    var i = 0; /* Set Global Variable i */
    function increment()
    {
      i += 1; /* Function for automatic increment of field's "Name" attribute. */
    }


    function removeElement(parentDiv, childDiv)
    {
      if (childDiv == parentDiv)
      {
        alert("The parent div cannot be removed.");
      }
      else if (document.getElementById(childDiv))
      {
        var child = document.getElementById(childDiv);
        var parent = document.getElementById(parentDiv);
        parent.removeChild(child);
      }
      else
      {
        alert("Child div has already been removed or does not exist.");
        return false;
      } 
    }
</script>
</head>
<body>
<div class="Head">
	<h1>Home Page</h1>
    <?php  if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p> <a href="index.php?logout='1'" style="color: black;">logout</a> </p>
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
    <form method="POST" action="server.php">
      <div class="col-3 details">
        <h2>Create Form</h2>
     
      <input type="text" name="title" placeholder="Enter Form Name" value=""></p>

      <textarea name="description" placeholder="Enter Description"></textarea><br>

       <span id="myForm"></span><br>
       <button type="button" class ="btn" onclick="nameFunction()">Add Field</button><br>
       <input type="submit" class="btn1" name="create_form" value="Submit Form">
   </div>
    </form>
	</div>	
</body>
</html>
