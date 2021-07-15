#!/usr/local/bin/php
<?php
if (isset($_FILES['fileUserSelected']['name'])){
    $originalName = $_FILES['fileUserSelected']['name'];
    $fileName = $_FILES['fileUserSelected']['tmp_name'];
    $infile = @fopen($fileName, 'r');
    if ($infile)
    {
        $outfile = fopen('_0_123_tmp_4_8888_8888.txt', "w");
        while (!feof($infile)) {
            $line = fgets($infile);
            if (stripos($line, "\r\n") !== false) {
                fwrite($outfile, rtrim($line) . "\r\n");
            }
            else if (stripos($line, "\n") !== false) {
                fwrite($outfile, rtrim($line) . "\n");
            }
            else if (stripos($line, "\n") !== false) {
                fwrite($outfile, rtrim($line) . "");
            }
            else {
                fwrite($outfile, rtrim($line));
            }
        }
            fclose($infile);
            header('Content-Disposition: attachment; filename="tidy_' . $originalName. '"');
            readfile('_0_123_tmp_4_8888_8888.txt');
            unlink('_0_123_tmp_4_8888_8888.txt');
            fclose($outfile);
            exit;
            
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PIC 40A Demo</title>
</head>

<body>
    <header>
        <h1>PIC 40A Demo - Tidy Trailing Space</h1>
    </header>

    <main>


        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="file" name="fileUserSelected" accept=".txt">
            <br>
            <input type="submit">
        </form>

    </main>

    <footer>
        <hr>
        <small>
            &copy; Michael Ting, 2020
        </small>
    </footer>
</body>

</html>