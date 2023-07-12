
<!DOCTYPE html>
<html>
<head>
    <title>Alphanumeric Encryptor & Decryptor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>  
    <div class="container">
        <h1>Alphanumeric JS Encryptor & Decryptor</h1>
        <form method="POST" action="index.php">
        <div class="dropdown">
            <label for="action">Select Action:</label>
        </div>
        <div class="dropdown-content">
            <select id="action" name="action">
                <option  value="encrypt">Encrypt</option>
                <option value="decrypt">Decrypt</option>
            </select>
        </div>
            
            <label for="input">Input Text:</label>
            <input type="text" id="input" name="input" required>
            <br>
            <input type="submit" class="submit" name="submit" value="Submit">
        </form>
    </div>
    <div class="result">
    <?php if (isset($output)): ?>
        <h2 class="glow">Result</h2>
        <p class="glow"><?php echo $output; ?></p>
    <?php endif; ?>
    </div>

</body>
</html>
