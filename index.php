<?php
function alphanumericEncrypt($letter) {
    $mapping = [
        'A' => '5z0',
        'B' => '4y9',
        'C' => '3x8',
        'D' => '2w7',
        'E' => '1v6',
        'F' => '0u5',
        'G' => '9t4',
        'H' => '8s3',
        'I' => '7r2',
        'J' => '6q1',
        'K' => '5p0',
        'L' => '4o9',
        'M' => '3n8',
        'N' => '2m7',
        'O' => '1l6',
        'P' => '0k5',
        'Q' => '9j4',
        'R' => '8i3',
        'S' => '7h2',
        'T' => '6g1',
        'U' => '5f0',
        'V' => '4e9',
        'W' => '3d8',
        'X' => '2c7',
        'Y' => '1b6',
        'Z' => '0a5',
    ];

    return isset($mapping[$letter]) ? $mapping[$letter] : $letter;
}

function alphanumericDecrypt($code) {
    $mapping = [
        '5z0' => 'A',
        '4y9' => 'B',
        '3x8' => 'C',
        '2w7' => 'D',
        '1v6' => 'E',
        '0u5' => 'F',
        '9t4' => 'G',
        '8s3' => 'H',
        '7r2' => 'I',
        '6q1' => 'J',
        '5p0' => 'K',
        '4o9' => 'L',
        '3n8' => 'M',
        '2m7' => 'N',
        '1l6' => 'O',
        '0k5' => 'P',
        '9j4' => 'Q',
        '8i3' => 'R',
        '7h2' => 'S',
        '6g1' => 'T',
        '5f0' => 'U',
        '4e9' => 'V',
        '3d8' => 'W',
        '2c7' => 'X',
        '1b6' => 'Y',
        '0a5' => 'Z',
    ];

    return isset($mapping[$code]) ? $mapping[$code] : $code;
}


if (isset($_POST['submit'])) {
    $action = $_POST['action'];
    $input = $_POST['input'];
    $output = '';

    if ($action === 'encrypt') {
        for ($i = 0; $i < strlen($input); $i++) {
            $output .= alphanumericEncrypt($input[$i]);
        }
    } elseif ($action === 'decrypt') {
        $length = strlen($input);
        if ($length % 3 != 0) {
            $output = "Invalid input for decryption.";
        } else {
            for ($i = 0; $i < $length; $i += 3) {
                $code = substr($input, $i, 3);
                $output .= alphanumericDecrypt($code);
            }
        }
    }
}
?>

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
