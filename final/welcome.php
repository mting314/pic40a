#!/usr/local/bin/php
<?php
  // IMPORTANT: The lack of a blank line between
  // #!/usr/local/bin/php and <?php is essential.

  // SETTING UP OR RESUMING A SESSION
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();

  if(isset($_SESSION['loggedin']) === false) {
    $_SESSION['loggedin'] = false;
  }

  // First check if even logged in
  // If not, send to login.php
  if($_SESSION['loggedin'] === false) {
    header('Location: login.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shut The Box</title>
    <script src="username.js" defer=""></script>
    <script src="welcome.js" defer=""></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Welcome! Ready to play "<span id="title">Shut The Box</span>"?</h1>
    </header>
    <main>
        <section id="username">
            <h2>Choose a username</h2>
            <p>
                So that we can post your score(s), please choose a username.
            </p>
            <fieldset>
                <label for="username_input">Username:</label>
                <input id="username_input" type="text">
                <input type="button" value="Submit" onclick="process_username();">
            </fieldset>
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