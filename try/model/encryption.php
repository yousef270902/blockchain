<?php
// Encrypt a message
function safeEncrypt($message, $key) {
    $iv = openssl_random_pseudo_bytes(16); // Initialization Vector
    $ciphertext = openssl_encrypt($message, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($iv . $ciphertext);
}

// Decrypt a message
function safeDecrypt($encrypted, $key) {
    $decoded = base64_decode($encrypted);
    $iv = substr($decoded, 0, 16);
    $ciphertext = substr($decoded, 16);
    //return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, 0, $iv);
}

// Example usage
$message = "Hello, AES!";
$key = "YourSecretKey";
$encrypted = safeEncrypt($message, $key);
echo "Encrypted: $encrypted\n";
$decrypted = safeDecrypt($encrypted, $key);
echo "Decrypted: $decrypted\n";
?>
