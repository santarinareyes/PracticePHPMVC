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
      <input type="text" name="firstname" placeholder="Firstname" value="<?php echo (!empty($data["firstname"])) ? $data["firstname"] : "" ; ?>"/>
      <?php echo $data["lastname_err"];?>
      <input type="text" name="lastname" placeholder="Lastname" value="<?php echo (!empty($data["lastname"])) ? $data["lastname"] : "" ; ?>"/>
      <?php echo $data["username_err"];?>
      <input type="text" name="username" placeholder="Username" value="<?php echo (!empty($data["username"])) ? $data["username"] : "" ; ?>"/>
      <?php echo $data["email_err"];?>
      <input type="email" name="email" placeholder="Email" value="<?php echo (!empty($data["email"])) ? $data["email"] : "" ; ?>"/>
      <?php echo $data["confirm_email_err"];?>
      <input
        type="email"
        name="confirm_email"
        placeholder="Confirm Email"
        value="<?php echo (!empty($data["confirm_email"])) ? $data["confirm_email"] : "" ; ?>"
        />
      <?php echo $data["password_err"];?>
      <input type="password" name="password" placeholder="Password" value="<?php echo (!empty($data["password"])) ? $data["password"] : "" ; ?>"/>
      <?php echo $data["confirm_password_err"];?>
      <input
        type="password"
        name="confirm_password"
        placeholder="Confirm Password"
        value="<?php echo (!empty($data["confirm_password"])) ? $data["confirm_password"] : "" ; ?>"
        />
      <input type="submit" name="submit" value="SUBMIT" />
    </form>
    <a class="have_account" href="<?php echo URLROOT ?>/users/login"
      >Already have an account? Sign in here!</a
    >
  </div>
</div>
