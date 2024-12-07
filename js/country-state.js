document.addEventListener('DOMContentLoaded', function() {
    const countrySelect = document.getElementById('countrySelect');
    const stateContainer = document.getElementById('stateContainer');
    const stateSelect = document.getElementById('stateSelect');

    // Country-state mapping
    const states = {
        'USA': {
            'AL': 'Alabama', 'AK': 'Alaska', 'AZ': 'Arizona',
            // ... (rest of US states)
        },
        'UK': {
            'ENG': 'England', 'SCT': 'Scotland', 'WLS': 'Wales', 'NIR': 'Northern Ireland'
        },
        'CAN': {
            'AB': 'Alberta', 'BC': 'British Columbia', 'MB': 'Manitoba',
            // ... (rest of Canadian provinces)
        },
        'AUS': {
            'NSW': 'New South Wales', 'VIC': 'Victoria', 'QLD': 'Queensland',
            // ... (rest of Australian states)
        }
    };

    countrySelect.addEventListener('change', function() {
        const selectedCountry = this.value;
        const countryStates = states[selectedCountry];

        if (countryStates) {
            // Clear existing options
            stateSelect.innerHTML = '<option value="">Select State/Province</option>';
            
            // Add new options
            Object.entries(countryStates).forEach(([code, name]) => {
                const option = document.createElement('option');
                option.value = code;
                option.textContent = name;
                stateSelect.appendChild(option);
            });

            // Show state selection
            stateContainer.style.display = 'block';
            stateSelect.required = true;
        } else {
            // Hide state selection for countries without states
            stateContainer.style.display = 'none';
            stateSelect.required = false;
        }
    });
}); 