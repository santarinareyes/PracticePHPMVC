<div class="sign_in_container">
  <div class="column">
    <div class="header">
      <img
        src="<?php echo URLROOT; ?>/images/richflix_logo.png"
        title="Richflix logo"
        alt="richflix logo"
      />
      <h3>Sign in</h3>
      <span>to continue to Richflix</span>
    </div>
    <form action="" method="POST">
    <?php echo $data["username_err"];?>
      <input type="text" name="username" placeholder="Username" value="<?php echo $data["username"]; ?>"/>
      <?php echo $data["password_err"];?>
      <input type="password" name="password" placeholder="Password"/>
      <input type="submit" name="submit" value="SUBMIT" />
    </form>
    <a class="have_account" href="<?php echo URLROOT ?>/users/register"
      >Need an account? Sign up here!</a
    >
  </div>
</div>
