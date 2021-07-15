#!/usr/local/bin/php
<?php
  // IMPORTANT: The lack of a blank line between
  // #!/usr/local/bin/php and <?php is essential.

  // SETTING UP OR RESUMING A SESSION
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();


  // At the beginning,
  // there has not been an incorrect submission.
  $incorr_submiss = false;

  if(isset($_SESSION['loggedin']) === false) {
    $_SESSION['loggedin'] = false;
  }

  // If a password has been submitted,
  // we should check it and update
  // $incorr_submiss and $_SESSION['loggedin']
  // accordingly.
  if (isset($_POST['passwordSubmitted'])) {
    validate($_POST['passwordSubmitted'], $incorr_submiss);
  }


  function validate($submiss, &$incorr_submiss) {
    // Using die is not good coding practice, but
    // I don't wish to clutter up our current code
    // by handling this situation more gracefully.
    $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');

    // We obtain the hashed password
    // (removing any surrounding whitespace).
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);

    fclose($file);


    // We hash the submission using the same algorithm
    // as when we hashed the actual password.
    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_submiss !== $hashed_password) {
      $_SESSION['loggedin'] = false;
      $incorr_submiss = true;
    }
    else {
      $_SESSION['loggedin'] = true;
      header('Location: welcome.php');
      exit;
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Shut The Box</title>
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to play "Shut The Box"?</h1>
    </header>

    <main>
      <section>
        <h2>Login</h2>
        <p> In order to play you need the password.</p>

        <p> If you know it, please enter it below and login.</p>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <label for="passwordEntry">Password: </label>
          <input id="passwordEntry" type="password" name="passwordSubmitted">
          <input type="submit" value="Login">
        </form>

        <?php
          if ($incorr_submiss) {
            echo '<p>Invalid password!</p>';
          }
        ?>
      </section>
    </main>

    <footer>
      <hr>
      <small>
      &copy; Michael Ting, 2020. I can only use the Speedchat.
      </small>
    </footer>
  </body>

</html>