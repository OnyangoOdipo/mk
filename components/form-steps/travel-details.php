<div class="form-step hidden" data-step="2">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="form-group md:col-span-2">
            <label class="block text-gray-700 mb-2">Purpose of Visit *</label>
            <select name="visitPurpose" required id="visitPurpose"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                           focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <option value="">Select Purpose</option>
                <option value="tourism">Tourism</option>
                <option value="business">Business</option>
                <option value="education">Education</option>
                <option value="medical">Medical</option>
                <option value="conference">Conference</option>
                <option value="family">Family Visit</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group" id="otherPurposeContainer" style="display: none;">
            <label class="block text-gray-700 mb-2">Specify Other Purpose *</label>
            <input type="text" name="otherPurpose"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                          focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                   placeholder="Please specify">
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Destination Country *</label>
            <select name="country" required id="countrySelect"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                           focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <option value="">Select Country</option>
                <?php include 'data/countries.php'; ?>
            </select>
        </div>

        <div class="form-group" id="stateContainer" style="display: none;">
            <label class="block text-gray-700 mb-2">State/Province *</label>
            <select name="state" id="stateSelect"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                           focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <option value="">Select State</option>
            </select>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Expected Travel Date *</label>
            <input type="date" name="travelDate" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                          focus:ring-2 focus:ring-blue-200 transition-all duration-300">
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Duration of Stay (days) *</label>
            <input type="number" name="duration" required min="1" max="365"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                          focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                   placeholder="Number of days">
        </div>

        <div class="form-group md:col-span-2">
            <label class="block text-gray-700 mb-2">Additional Travel Information</label>
            <textarea name="travelInfo" rows="3"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                             focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                      placeholder="Any additional information about your travel"></textarea>
        </div>
    </div>
</div> 