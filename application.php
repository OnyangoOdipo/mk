<?php
include 'components/application-form.php';

if (isset($_SESSION['payment_error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?php echo htmlspecialchars($_SESSION['payment_error']); ?></span>
    </div>
    <?php unset($_SESSION['payment_error']); ?>
<?php endif; ?>

<!-- Add this payment button where needed -->
<div class="mt-8">
    <a href="payment.php" 
       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">
        Pay Application Fee (KES 7,700)
    </a>
</div>
?> 