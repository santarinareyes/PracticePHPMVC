<div class="sign_in_container">
  <div class="column">
    <div class="header">
      <img
        src="<?php echo URLROOT; ?>/images/richflix_logo.png"
        title="Richflix logo"
        alt="richflix logo"
      />
      <h3>Sign Up</h3>
      <span>to continue to Richflix</span>
    </div>
    <form action="" method="POST">
      <?php echo $data["firstname_err"];?>
      <input type="text" name="firstname" placeholder="Firstname" required />
      <input type="text" name="lastname" placeholder="Lastname" required />
      <input type="text" name="username" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <input
        type="email"
        name="confirm_email"
        placeholder="Confirm Email"
        required
      />
      <input type="password" name="password" placeholder="Password" required />
      <input
        type="password"
        name="confirm_password"
        placeholder="Confirm Password"
        required
      />
      <input type="submit" name="submit" value="SUBMIT" />
    </form>
    <a class="have_account" href="<?php echo URLROOT ?>/users/login"
      >Already have an account? Sign in here!</a
    >
  </div>
</div>
