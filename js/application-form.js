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
                submitBtn.style.display = 'block'; // Show submit button on last step
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
            submitBtn.style.display = 'none'; // Hide submit button when going back
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
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        try {
            const formData = new FormData(this);
            
            // Save application data
            const response = await fetch('save_application.php', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();
            
            if (result.success) {
                // Store application ID in session
                sessionStorage.setItem('application_id', result.application_id);
                
                // Redirect to payment page
                window.location.href = 'process_payment.php';
            } else {
                throw new Error(result.message || 'Failed to save application');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while saving your application. Please try again.');
            
            const submitBtn = document.getElementById('submitBtn');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Proceed to Payment';
            }
        }
    });
}); 