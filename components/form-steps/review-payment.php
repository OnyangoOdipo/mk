<?php
// Ensure session is started
session_start();

// You might want to get some data from your session or database
$application_id = $_SESSION['application_id'] ?? null;
$amount = $_SESSION['payment_amount'] ?? 1000; // Default or calculated amount
?>

<div class="payment-form-container">
    <h2>Payment Details</h2>
    
    <form action="../../process_payment.php" method="POST" id="paymentForm" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
                <div class="invalid-feedback">
                    Please provide your first name.
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
                <div class="invalid-feedback">
                    Please provide your last name.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                    Please provide a valid email address.
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" 
                       pattern="^(?:254|\+254|0)?(7[0-9]{8})$" required>
                <div class="invalid-feedback">
                    Please provide a valid phone number.
                </div>
                <small class="form-text text-muted">Format: 254XXXXXXXXX or 07XXXXXXXX</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="amount" class="form-label">Amount (KES)</label>
                <input type="number" class="form-control" id="amount" name="amount" 
                       value="<?php echo htmlspecialchars($amount); ?>" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="description" class="form-label">Payment Description</label>
                <input type="text" class="form-control" id="description" name="description" 
                       value="Application Payment #<?php echo htmlspecialchars($application_id ?? 'New'); ?>" readonly>
            </div>
        </div>

        <!-- Hidden fields -->
        <input type="hidden" name="currency" value="KES">
        
        <div class="payment-summary mb-4">
            <h4>Payment Summary</h4>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Application Fee:</span>
                        <span>KES <?php echo number_format($amount, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Total Amount:</strong>
                        <strong>KES <?php echo number_format($amount, 2); ?></strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="terms" required>
            <label class="form-check-label" for="terms">
                I agree to the terms and conditions and confirm that the information provided is correct
            </label>
            <div class="invalid-feedback">
                You must agree before proceeding.
            </div>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary btn-lg" type="submit">Proceed to Payment</button>
        </div>
    </form>
</div>

<script>
// Form validation script
(function () {
    'use strict'

    // Fetch all forms that need validation
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

// Phone number formatter
document.getElementById('phone').addEventListener('input', function(e) {
    let number = e.target.value.replace(/\D/g, '');
    
    // Format for Kenya numbers
    if (number.startsWith('0')) {
        number = '254' + number.slice(1);
    } else if (number.startsWith('7')) {
        number = '254' + number;
    }
    
    e.target.value = number;
});
</script>

<style>
.payment-form-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.payment-summary {
    margin-top: 30px;
}

.card {
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.btn-primary {
    padding: 12px 24px;
    font-weight: 600;
}

.form-label {
    font-weight: 500;
}

.invalid-feedback {
    font-size: 0.875rem;
}
</style> 