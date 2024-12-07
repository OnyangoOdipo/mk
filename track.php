<?php
session_start();
require_once 'config/database.php';

$error = '';
$application = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tracking_id = $_POST['tracking_id'] ?? '';
    $email = $_POST['email'] ?? '';

    if (empty($tracking_id) || empty($email)) {
        $error = 'Please provide both Tracking ID and Email';
    } else {
        try {
            $database = new Database();
            $db = $database->getConnection();

            $query = "SELECT * FROM invitation_applications 
                     WHERE tracking_id = :tracking_id 
                     AND email = :email";
            
            $stmt = $db->prepare($query);
            $stmt->execute([
                'tracking_id' => $tracking_id,
                'email' => $email
            ]);

            $application = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$application) {
                $error = 'No application found with the provided details';
            }
        } catch (PDOException $e) {
            $error = 'An error occurred while retrieving the application';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Track Application - Decedat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Back Link -->
            <div class="mb-8">
                <a href="index.php" class="text-gray-600 hover:text-gray-800 transition-colors duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-8">
                    <h2 class="text-3xl font-bold mb-6 text-center">Track Your Application</h2>

                    <?php if (!$application): ?>
                        <form method="POST" class="space-y-6">
                            <?php if ($error): ?>
                                <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6">
                                    <?php echo htmlspecialchars($error); ?>
                                </div>
                            <?php endif; ?>

                            <div>
                                <label class="block text-gray-700 mb-2">Tracking ID</label>
                                <input type="text" name="tracking_id" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                       placeholder="Enter your tracking ID"
                                       value="<?php echo htmlspecialchars($_POST['tracking_id'] ?? ''); ?>">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Email Address</label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                       placeholder="Enter your email address"
                                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                            </div>

                            <button type="submit" 
                                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all duration-300">
                                Track Application
                            </button>
                        </form>
                    <?php else: ?>
                        <div class="space-y-6">
                            <!-- Application Status -->
                            <div class="bg-blue-50 p-6 rounded-xl">
                                <h3 class="text-lg font-semibold mb-4">Application Status</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-gray-600">Tracking ID</p>
                                        <p class="font-semibold"><?php echo htmlspecialchars($application['tracking_id']); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Status</p>
                                        <p class="font-semibold text-green-600">
                                            <?php echo htmlspecialchars($application['payment_status']); ?>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Application Date</p>
                                        <p class="font-semibold">
                                            <?php echo date('M d, Y', strtotime($application['created_at'])); ?>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Travel Date</p>
                                        <p class="font-semibold">
                                            <?php echo date('M d, Y', strtotime($application['travel_date'])); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Details -->
                            <div class="border-t pt-6">
                                <h3 class="text-lg font-semibold mb-4">Personal Details</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-gray-600">Full Name</p>
                                        <p class="font-semibold">
                                            <?php echo htmlspecialchars($application['first_name'] . ' ' . $application['last_name']); ?>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Email</p>
                                        <p class="font-semibold"><?php echo htmlspecialchars($application['email']); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Phone</p>
                                        <p class="font-semibold"><?php echo htmlspecialchars($application['phone']); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Nationality</p>
                                        <p class="font-semibold"><?php echo htmlspecialchars($application['nationality']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Travel Details -->
                            <div class="border-t pt-6">
                                <h3 class="text-lg font-semibold mb-4">Travel Details</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-gray-600">Purpose of Visit</p>
                                        <p class="font-semibold"><?php echo htmlspecialchars($application['visit_purpose']); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Destination</p>
                                        <p class="font-semibold">
                                            <?php echo htmlspecialchars($application['destination_country']); ?>
                                            <?php if ($application['destination_state']): ?>
                                                - <?php echo htmlspecialchars($application['destination_state']); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Duration</p>
                                        <p class="font-semibold"><?php echo htmlspecialchars($application['duration']); ?> days</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8">
                                <button onclick="window.print()" 
                                        class="w-full bg-gray-600 text-white py-3 rounded-lg font-semibold hover:bg-gray-700 transition-all duration-300">
                                    <i class="fas fa-print mr-2"></i> Print Details
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 