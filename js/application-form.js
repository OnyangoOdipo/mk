document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('applicationForm');
    if (!form) return; // Exit if form not found

    const steps = document.querySelectorAll('.form-step');
    const progressBar = document.getElementById('progressBar');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    let currentStep = 1;

    // Add navigation functionality
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            // Hide current step
            document.querySelector(`.form-step[data-step="${currentStep}"]`).style.display = 'none';
            
            // Show next step
            currentStep++;
            document.querySelector(`.form-step[data-step="${currentStep}"]`).style.display = 'block';
            
            // Update buttons
            prevBtn.style.display = 'block';
            if (currentStep === 4) {
                nextBtn.style.display = 'none';
            }
            
            // Update progress bar
            progressBar.style.width = ((currentStep - 1) / 3 * 100) + '%';
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            // Hide current step
            document.querySelector(`.form-step[data-step="${currentStep}"]`).style.display = 'none';
            
            // Show previous step
            currentStep--;
            document.querySelector(`.form-step[data-step="${currentStep}"]`).style.display = 'block';
            
            // Update buttons
            nextBtn.style.display = 'block';
            if (currentStep === 1) {
                prevBtn.style.display = 'none';
            }
            
            // Update progress bar
            progressBar.style.width = ((currentStep - 1) / 3 * 100) + '%';
        });
    }

    // Form validation
    function validateField(input) {
        if (!input) return true; // Skip if element not found
        
        const field = input.name;
        const value = input.value;
        let isValid = true;
        let message = '';

        switch(field) {
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                isValid = emailRegex.test(value);
                message = isValid ? '' : 'Please enter a valid email address';
                break;

            case 'phone':
                const phoneRegex = /^\+?[1-9]\d{1,14}$/;
                isValid = phoneRegex.test(value);
                message = isValid ? '' : 'Please enter a valid phone number';
                break;

            // ... other validations
        }

        updateFieldStatus(input, isValid, message);
        return isValid;
    }

    function updateFieldStatus(input, isValid, message = '') {
        if (!input) return; // Skip if element not found
        
        const container = input.closest('.form-group');
        if (!container) return; // Skip if container not found

        const feedback = container.querySelector('.feedback') || document.createElement('div');
        feedback.className = `feedback text-sm mt-1 ${isValid ? 'text-green-600' : 'text-red-600'}`;
        
        if (message) {
            feedback.textContent = message;
            if (!container.querySelector('.feedback')) {
                container.appendChild(feedback);
            }
        } else {
            feedback.remove();
        }

        input.classList.remove('border-gray-300', 'border-red-500', 'border-green-500');
        input.classList.add(isValid ? 'border-green-500' : 'border-red-500');
    }

    // Country-state handling
    const countrySelect = document.getElementById('countrySelect');
    const stateContainer = document.getElementById('stateContainer');
    const stateSelect = document.getElementById('stateSelect');

    if (countrySelect) {
        countrySelect.addEventListener('change', function() {
            const selectedCountry = this.value;
            if (!stateContainer || !stateSelect) return;

            if (states[selectedCountry]) {
                stateSelect.innerHTML = '<option value="">Select State/Province</option>';
                Object.entries(states[selectedCountry]).forEach(([code, name]) => {
                    const option = document.createElement('option');
                    option.value = code;
                    option.textContent = name;
                    stateSelect.appendChild(option);
                });
                stateContainer.style.display = 'block';
            } else {
                stateContainer.style.display = 'none';
            }
        });
    }

    // Form submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Validate terms checkbox
        const termsCheckbox = document.getElementById('terms');
        if (!termsCheckbox.checked) {
            alert('Please accept the terms and conditions');
            return false;
        }

        // Disable submit button and show loading state
        const submitBtn = document.getElementById('submitBtn');
        if (!submitBtn) return;
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner"></span> Processing...';

        try {
            // First save the application data
            const formData = new FormData(form);
            const saveResponse = await fetch('save_application.php', {
                method: 'POST',
                body: formData
            });
            
            const saveResult = await saveResponse.json();
            console.log('Save Result:', saveResult);
            
            if (saveResult.success) {
                // If save is successful, redirect to process_payment.php
                window.location.href = 'process_payment.php';
            } else {
                throw new Error(saveResult.message || 'Failed to save application');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Proceed to Payment';
        }
    });

    if (submitBtn) {
        submitBtn.addEventListener('click', async () => {
            // Validate terms checkbox
            const termsCheckbox = document.getElementById('terms');
            if (!termsCheckbox.checked) {
                alert('Please accept the terms and conditions');
                return false;
            }

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner"></span> Processing...';

            try {
                const formData = new FormData(form);
                const saveResponse = await fetch('save_application.php', {
                    method: 'POST',
                    body: formData
                });
                
                const saveResult = await saveResponse.json();
                console.log('Save Result:', saveResult);
                
                if (saveResult.success) {
                    window.location.href = 'process_payment.php';
                } else {
                    throw new Error(saveResult.message || 'Failed to save application');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Proceed to Payment';
            }
        });
    }
}); 