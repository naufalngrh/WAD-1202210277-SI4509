Users - <a href="/">Home</a><br/><br/>
<h1>Welcome</h1>
<?php foreach($users as $user): ?>
    <p>User ID: <?php echo $user->getId(); ?>, Name: <?php echo $user->getUsername(); ?></p>
    <?php if ($user->getImage() == "data:image/png;base64,") { ?>
        <p>No Image</p>
        <br>
    <?php } else { ?>
        <p>Image:</p>
        <img src="<?php echo $user->getImage(); ?>" alt="image" id="image" width="300" height="300">

        
        
    <?php } ?>
<?php endforeach; ?>