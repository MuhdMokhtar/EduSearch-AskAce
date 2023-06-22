<?php 
//call connection
include("dbase.php");

//sql command SELECT
$cmdselect="SELECT post.*, users.Username FROM post INNER JOIN users ON post.UserID=users.UserID";
$cmdselectlast="SELECT post.*, users.Username FROM post INNER JOIN users ON post.UserID=users.UserID ORDER BY PostDate DESC";

//execute command
$result = $conn->query($cmdselect);
$result2 = $conn->query($cmdselectlast);

?>
<html>
    <head>
        <title>FK-EduSearch</title>
    </head>
    <style>
			form{
				box-shadow: 0 5px 15px #888888;
				width: 50%;
				border-radius:10px;
				font-size:20px;
				border: 0px solid black;
				font-weight:bold;
				margin-top: 10px;
				align:center;
				
				  display: block;
				  margin-left: auto;
				  margin-right: auto;

			}
			
			input[type=text], select {
			  width: 80%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
              margin-left: 10%;
			}

            input[type=textarea], select {
			  width: 80%;
              height: 200px;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
              margin-left: 10%;
			}

			input[name="Save"] {
			  width: 10%;
              float: left;
			  background-color: #41a1dd;
			  color: white;
			  padding: 14px 20px;
			  margin: 8px;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			}

            input[name="Send"] {
			  width: 10%;
			  background-color: #41a1dd;
			  color: white;
			  padding: 14px 20px;
			  margin: 8px 0;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			}

            input[name="Reset"] {
			  width: 10%;
              float: right;
			  background-color: #41a1dd;
			  color: white;
			  padding: 14px 20px;
			  margin-right: 8px;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			}

			input[type=submit]:hover {
			  background-color: blue;
			}

            label {
                margin-left: 10%;
            }
		</style>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <body>
        <header class="header">
            <div class="logo logo-left">
                <img width="60px" src="Image/fklogo.png" alt="Left Logo">
            </div>
            <div class="text">FK-EduSearch</div>
            <div class="logo logo-right">
                <img width="60px" src="Image/notiLogo.png" alt="Right Logo">
            </div>
        </header>

        <div id="navBar">
            <ul>
			<li><a href="main.php"> HOME </a></li>
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
            </ul>
        </div>
        <br>
        <form name="myform" method="post" action="postQuestionprocess.php">
		<div class="postQuest">
            
                <label align="left" for="usrname">Post Title</label>
                <br>
                <input type="text" id="title" name="title" required/>
                <br>
                <label for="fullname">Post Content</label>
                <br>
                <input type="textarea" id="content" name="content" required/>
                <br>
                <center>
                <input type="submit" name="Save" value="Save">
                <input type="submit" name="Send" value="Post">
                <input type="reset" name="Reset" value="Reset">
                </center>
	    </div>
	  </form>
    </body>
    <footer>Copyright FK</footer>
</html>