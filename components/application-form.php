<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form - Decedat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/country-state.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .gradient-text {
            background: linear-gradient(to right, #3b82f6, #2563eb, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-600 to-blue-800 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Back to Home Link -->
            <div class="mb-8">
                <a href="index.php" class="text-white hover:text-blue-200 transition-colors duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Application Form Content -->
                <?php include 'form-content.php'; ?>
            </div>
        </div>
    </div>

    <script src="js/application-form.js"></script>
</body>
</html> 