
<nav class="white blue-text"> 

<div class="nav-wrapper hide-on-med-and-down">
     <a href="#!" class="brand-logo blue-text" style="font-size:30px;margin-left: 45%">Photo Gallery</a><a href="logout.php" onclick="return confirm('Are you sure you want to logout?');"><i class="material-icons blue-text
          " style="margin-left: 90%;font-size: 30px;">exit_to_app</i></a>
    </div>
    <div class="nav-wrapper hide-on-large-only">
  <a href="#!" class="brand-logo blue-text"><i class="material-icons">add_to_photos</i></a>
</div>
</nav>


  <ul id="slide-out" class="sidenav sidenav-fixed" style="width:250px;">
    <li ><div class="user-view indigo darken-4">
      <div class="background">
        <img src="">
      </div>
      <a href="#user"><img class="circle" src="../images/hard.jpg" style="margin-left: 18%;"></a>
      <a href="#name"><span class="white-text name" style="margin-left: 18%;"><?php echo "Admin";?></span></a>
    </div></li>
    <ul class="collapsible pop-out">
    <li>
      <div class="collapsible-header"><i class="material-icons">add_a_photo</i>Add Albums</div>
      <div class="collapsible-body">
        <span>
        <ul class="margin-left:300%;">
          <li><a href="add_photo.php"><i class="material-icons">add_a_photo</i>Add photo</a></li>
          <li><a href="list_photos.php"><i class="material-icons">photo_library</i>View photos</a></li>

        </ul>
      </span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">person_pin</i>Users</div>
      <div class="collapsible-body"><span>
        <ul class="margin-left:300%">
          <li><a href="create_user.php"><i class="material-icons">person_add</i>Create New User</a></li>
         <li><a href="list_users.php"><i class="material-icons">verified_user</i>View Users</a></li>
        </ul>
      </span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">account_box</i>LOGS</div>
      <div class="collapsible-body"><span>
        <ul class="margin-left:300%">
          <li><a href="logfile.php"><i class="material-icons">details</i>View logs</a></li>
         
        </ul>
      </span></div>
    </li>
  
    <li class="hide-on-large-only" ><a href="logout.php">LOGOUT</a></li>
  </ul>
        </ul>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons white-text" style="font-size: 40px;">menu</i></a>

