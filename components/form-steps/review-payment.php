<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/database.php';

// Create database connection
$database = new Database();
$pdo = $database->getConnection();

// Get application data from session
$applicationData = $_SESSION['application_data'] ?? [];

// Debug log
error_log('Application Data: ' . print_r($applicationData, true));
?>

<div class="form-step" data-step="4">
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Review Your Application</h2>
            <p class="text-gray-600">Please review your information before proceeding to payment</p>
        </div>

        <!-- Personal Information Section -->
        <!-- ... (keep your existing personal info display section) ... -->

        <!-- Travel Details Section -->
        <!-- ... (keep your existing travel details display section) ... -->

        <!-- Payment Summary Section -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center mb-4">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-credit-card text-green-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Payment Summary</h3>
            </div>
            <div class="mt-4 space-y-4">
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Application Processing Fee</span>
                    <span class="font-medium text-gray-800">KES 7,700.00</span>
                </div>
                <div class="flex justify-between py-3">
                    <span class="text-lg font-semibold text-gray-800">Total Amount</span>
                    <span class="text-lg font-bold text-blue-600">KES 7,700.00</span>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <form action="process_payment.php" method="POST" id="paymentForm" class="space-y-6">
            <!-- Terms Checkbox -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mb-6">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" 
                           id="terms" 
                           name="terms" 
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer"
                           required>
                    <span class="text-gray-700">
                        I confirm that all the information provided is correct
                    </span>
                </label>
            </div>

            <!-- Hidden fields -->
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($applicationData['email'] ?? ''); ?>">
            <input type="hidden" name="phone" value="<?php echo htmlspecialchars($applicationData['phone'] ?? ''); ?>">
            <input type="hidden" name="first_name" value="<?php echo htmlspecialchars($applicationData['firstName'] ?? ''); ?>">
            <input type="hidden" name="last_name" value="<?php echo htmlspecialchars($applicationData['lastName'] ?? ''); ?>">

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center">
                <button type="button" 
                        onclick="previousStep()"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold
                               hover:bg-gray-200 transition-all duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Previous
                </button>
                <button type="submit" 
                        id="submitBtn"
                        class="px-8 py-3 bg-blue-600 text-white rounded-lg font-semibold
                               hover:bg-blue-700 transition-all duration-300 flex items-center">
                    Proceed to Payment <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentForm = document.getElementById('paymentForm');
    if (!paymentForm) return; // Exit if form not found

    paymentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Check terms
        const termsCheckbox = document.getElementById('terms');
        if (!termsCheckbox || !termsCheckbox.checked) {
            alert('Please accept the terms and conditions to proceed');
            return;
        }

        // Show loading state
        const submitBtn = document.getElementById('submitBtn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner"></span> Processing...';
        }

        // Submit the form
        this.submit();
    });
});
</script>

<style>
.spinner {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid rgba(255,255,255,.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
    margin-right: 8px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Make sure the button is always clickable */
#submitBtn:not(:disabled) {
    cursor: pointer;
}

#submitBtn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}
</style> 