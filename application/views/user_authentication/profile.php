<h2>Google Account Details</h2>
<div class="ac-data">
    <!-- Display Google profile information -->
    <img src="<?php echo $userData['picture']; ?>"/>
    <p><b>Google ID:</b> <?php echo $userData['oauth_uid']; ?></p>
    <p><b>Name:</b> <?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
    <p><b>Email:</b> <?php echo $userData['email']; ?></p>
    <p><b>Gender:</b> <?php echo $userData['gender']; ?></p>
    <p><b>Locale:</b> <?php echo $userData['locale']; ?></p>
    <p><a href="<?php echo base_url().'user_authentication/logout'; ?>"> Logout</a></p>
</div>