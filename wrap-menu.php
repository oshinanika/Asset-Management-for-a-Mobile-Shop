<?php include('config.php');
$name1 = $_SESSION['name1'];
$username = $_SESSION['username'];
 ?>
<div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="assets/images/avatar1.png" width="52" alt=""/><span>Full Name</span></div>
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-star"></i><span>Profile</span></a>
                    <a href="asset-view.php"><i class="fa fa-star"></i><span>Asset</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
</div>