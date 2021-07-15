#!/usr/local/bin/php

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Phished</title>
  </head>

  <body>
    <header>
      <h1>HAHAHA</h1>
    </header>

    <main>
        <section id="phished_section">
      <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          echo '<p>You just got phished!!! Your password is ', $_POST['password'], '</p>';
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