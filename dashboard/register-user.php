<?PHP
  include('header.php');
?>

        <div class="pageheader">
          <h2><i class="fa fa-edit"></i> Register User
            <span>Add new user here</span>
          </h2>
          <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
              <li><a href="index.php">SPYR Games</a></li>
              <li class="active">Register User</li>
            </ol>
          </div>
        </div>

        <div class="contentpanel">

          <div class="panel panel-default col-md-4">
            <div class="panel-heading">
              <h4 class="panel-title">Add New User</h4>
              <p>Add a new user here.</p>
            </div>
            <div class="panel-body">
              <div class="col-md-offset-2 col-md-8">
                <form method="post" action="loginform.php?action=register" name="registerform">
                        <div class="mb10">
                            <input placeholder="Username" id="login_input_username" type="text" class="form-control" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required/>
                        </div>

                        <div class="mb10">
                            <input placeholder="Password" id="login_input_password_new" class="login_input form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
                        </div>

                        <div class="mb10">
                            <input placeholder="Retype Password" id="login_input_password_repeat" class="login_input form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
                        </div>

                        <div class="mb10">
                            <input placeholder="Email Address" id="login_input_email" type="text" class="form-control" name="user_email" required />
                        </div>

                        <input class="btn btn-success btn-block" type="submit" name="register" value="Register" />
                  </form>
              </div>
            </div>
          </div>

          <div class="panel panel-default col-md-offset-1 col-md-6">
            <div class="panel-heading">
              <h4 class="panel-title">Current Users</h4>
              <p>A list of current users.</p>
            </div>
            <div class="panel-body">
              <div class="col-md-offset-2 col-md-8">
                <div class="table responsive">
                <table class="table">
                  <tr>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Delete User</th>
                  </tr>
                  <!--USER DISPLAY-->
                  <?php
                  //database connect
                    $db = new SQLite3('users.db');

                  //database query
                    $usersdata = $db->query("SELECT user_id,user_name,user_email FROM users");
                    while($userdata = $usersdata->fetchArray()) {
                      echo "<tr><td id=".$userdata[0].">";
                      echo $userdata[1];
                      echo "</td><td>";
                      echo $userdata[2];
                      echo "</td>";
                      if($_SESSION['user_name'] == $userdata[1]){
                        echo "<td class='table-action'><i class='fa fa-user'></i></td></tr>";
                      }  else {
                       echo"<td class='table-action'><a href='#' class='delete-row'><i class='fa fa-trash-o'></i></a></td></tr>";
                      }
                    }
                    $db->close();
                   ?>
                </table>
              </div>
              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="rightpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#rp-alluser" data-toggle="tab"><i class="fa fa-users"></i></a></li>
          <li><a href="#rp-favorites" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
          <li><a href="#rp-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
          <li><a href="#rp-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
        </ul>

      </div>
      <!-- rightpanel -->
    </section>

    <?php include('footer-user.php'); ?>
