#!/usr/local/bin/php
<?php
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();

  if(isset($_SESSION['loggedin']) === false) {
    $_SESSION['loggedin'] = false;
}

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
    <script src="scores.js" defer=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to play "Shut The Box"?</h1>
    </header>

    <main>
      <section>
        <h2>Scores</h2>
        <p> Well done! Here are the scores so far...</p>

        <p id="scores"> </p>
        <fieldset>
            <input type="button" id="play-again" value="PLAY AGAIN!!!" onclick="playAgain();">
        </fieldset>
        <fieldset>
        <input type="button" id="update" value="Force update / start updating" onclick="update();">
        <input type="button" id="stop-update" value="Stop updating" onclick="stop_update()">
        </fieldset>

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