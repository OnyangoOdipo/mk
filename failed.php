<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed - Decedat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-600 to-blue-800 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
        <!-- Error Icon -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 mb-4">
                <i class="fas fa-times-circle text-3xl text-red-600"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Payment Failed</h1>
            <p class="text-gray-600">
                <?php 
                $error = $_GET['error'] ?? 'An error occurred during payment processing.';
                echo htmlspecialchars($error);
                ?>
            </p>
        </div>

        <!-- Error Details -->
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
            <div class="flex items-center text-red-800">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <p class="text-sm">The payment could not be processed. Please try again or contact support if the problem persists.</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-3">
            <a href="javascript:history.back()" 
               class="block w-full px-6 py-3 text-center bg-blue-600 text-white rounded-lg font-semibold
                      hover:bg-blue-700 transition-all duration-300">
                <i class="fas fa-redo mr-2"></i> Try Again
            </a>
            
            <a href="index.php" 
               class="block w-full px-6 py-3 text-center bg-gray-100 text-gray-700 rounded-lg font-semibold
                      hover:bg-gray-200 transition-all duration-300">
                <i class="fas fa-home mr-2"></i> Return to Home
            </a>
        </div>

        <!-- Support Information -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Need help?</p>
            <a href="mailto:support@decedat.com" class="text-sm text-blue-600 hover:underline">
                <i class="fas fa-envelope mr-1"></i> Contact Support
            </a>
        </div>
    </div>

    <!-- Debug Information (only show in development) -->
    <?php if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false): ?>
    <div class="fixed bottom-4 left-4 bg-white p-4 rounded-lg shadow-lg max-w-lg text-sm">
        <h3 class="font-semibold mb-2">Debug Information:</h3>
        <pre class="text-xs bg-gray-100 p-2 rounded overflow-auto max-h-40">
<?php
print_r([
    'Error' => $_GET['error'] ?? null,
    'Session' => $_SESSION,
    'POST Data' => $_POST,
]);
?>
        </pre>
    </div>
    <?php endif; ?>
</body>
</html> 