<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
        <div class="text-green-500 text-5xl mb-4">✓</div>
        <h1 class="text-2xl font-bold mb-4">Payment Successful!</h1>
        <p class="text-gray-600 mb-6">Your payment has been processed successfully.</p>
        <a href="index.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg inline-block">
            Return to Home
        </a>
    </div>
</body>
</html> 