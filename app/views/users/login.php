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
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="submit" name="submit" value="SUBMIT" />
    </form>
    <a class="have_account" href="<?php echo URLROOT ?>/users/register"
      >Need an account? Sign up here!</a
    >
  </div>
</div>
