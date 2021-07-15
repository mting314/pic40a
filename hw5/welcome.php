#!/usr/local/bin/php

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Interesting</title>
  </head>

  <body>
    <header>
      <h1>Welcome to site with interesting content</h1>
    </header>

    <main>
        <section id="welcome_section">
      <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          echo '<p>Welcome: ', $_POST['username'], '!!!</p>';
        }

      ?>
      </section>
      <section id="recent_section">
            <h2>Recent posts by users</h2>
            <p>
            NiceGuy666 said, "check out my <a href="holiday1.html" rel="opener" target="_blank">holiday</a> <a href="holiday2.html" rel="opener" target="_blank">pictures</a>!"
            </p>
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