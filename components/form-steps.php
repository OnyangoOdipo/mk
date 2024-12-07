<form id="applicationForm" action="process_payment.php" method="POST" enctype="multipart/form-data" class="space-y-6">
    <!-- Step 1: Personal Information -->
    <?php include 'form-steps/personal-info.php'; ?>

    <!-- Step 2: Travel Details -->
    <?php include 'form-steps/travel-details.php'; ?>

    <!-- Step 3: Documents -->
    <?php include 'form-steps/documents.php'; ?>

    <!-- Step 4: Review & Payment -->
    <?php include 'form-steps/review-payment.php'; ?>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8">
        <button type="button" id="prevBtn" 
                class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold
                       hover:bg-gray-300 transition-all duration-300" style="display: none;">
            Previous
        </button>
        <button type="button" id="nextBtn" 
                class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold
                       hover:bg-blue-700 transition-all duration-300">
            Next
        </button>
    </div>
</form>
<script src="js/states.js"></script>
<script src="js/application-form.js"></script> 
<style>
.form-step {
    display: none;
}

.form-step.active {
    display: block;
}

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
</style> 