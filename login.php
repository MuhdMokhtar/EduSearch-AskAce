<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="style/styles.css">

    <script src="functions.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body style="background-color:rgb(128, 128, 128)>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 bg-light mt-5 px-0">
        <h3 class="text-center text-light bg-secondary p-3">FK-EduSearch</h3>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form class="form-signin" action="session.php" method="post" >

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Enter username" required autofocus/>
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" required />
                                            </div>
                                          
                                            <div class="form-group" id="inputCategory">
                                                <label class="small mb-1" for="category">Category</label>
                                                <select class="form-control" id="category" name="category">
                                                  <option value="admin">Admin</option>
                                                  <option value="user">User</option>
                                                  <option value="expert">Expert</option>
                                                </select>
                                              </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                              
                                                <button class="btn btn-lg btn-dark btn-block" type="submit">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                
							
    </body>

</html>
