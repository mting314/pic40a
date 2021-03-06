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

  if($_SESSION['loggedin'] === false) {
    header('Location: login.php');
	exit;
  }
  // Now access cookie to see if username has been set
  if (!isset($_COOKIE['username'])) {
    header('Location: welcome.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shut The Box</title>
    <script src="shut_the_box.js" defer=""></script>
    <script src="username.js" defer=""></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script></head>
<body>
    <header>
        <h1>Shut The Box</h1>
    </header>
    <main>
        <section id="rules">
            <h2>The Rules</h2>
            <ol type="i">
                <li>Each turn, you roll the dice (or die) and select 1 or more boxes which sum to the value of your
                    roll.</li>
                <li>You will not be allowed to pick the boxes which you choose on subsequent turns.</li>
                <li>When the sum of the boxes which are left is less than or equal to 6, you will only roll a single
                    die.</li>
                <li>When you cannot make a move or you give up, the sum of the boxes which are left gives your score.
                </li>
                <li>Lower scores are better and a score of 0 is called "shutting the box".</li>
            </ol>
        </section>
        <h2>Dice roll</h2>
        <fieldset>
            <input type="button" id="diceroll" value="Roll dice" onclick="roll();">
            Result:
            <span id="rollresult"></span>
        </fieldset>
        <h2>Box selection</h2>
        <table>
            <thead>
                <tr>
                    <th class="boxheader">1</th>
                    <th class="boxheader">2</th>
                    <th class="boxheader">3</th>
                    <th class="boxheader">4</th>
                    <th class="boxheader">5</th>
                    <th class="boxheader">6</th>
                    <th class="boxheader">7</th>
                    <th class="boxheader">8</th>
                    <th class="boxheader">9</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                    <td><input type="checkbox" class="boxes"></td>
                </tr>
            </tbody>
        </table>
        <fieldset>
            <input type="button" id="submit" value="Submit box selection" onclick="check_submission();">
            <input type="button" id="finish" value="I give up/I can't make a valid move" onclick="finish();">
        </fieldset>


    </main>
    <footer>
        <hr>
        <small>
            &copy; Michael Ting, 2020. I can only use the Speedchat.
        </small>
    </footer>
</body>

</html>