<div class="form-step hidden" data-step="3">
    <div class="space-y-6">
        <div class="form-group">
            <label class="block text-gray-700 mb-2">Passport Number *</label>
            <input type="text" name="passportNumber" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                          focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                   placeholder="Enter passport number">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="block text-gray-700 mb-2">Passport Issue Date *</label>
                <input type="date" name="passportIssue" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300">
            </div>

            <div class="form-group">
                <label class="block text-gray-700 mb-2">Passport Expiry Date *</label>
                <input type="date" name="passportExpiry" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300">
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Passport Copy (PDF/JPG) *</label>
            <div class="relative">
                <input type="file" name="passportCopy" required accept=".pdf,.jpg,.jpeg,.png"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <p class="text-sm text-gray-500 mt-1">Maximum file size: 5MB</p>
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Photo ID (PDF/JPG) *</label>
            <div class="relative">
                <input type="file" name="photoId" required accept=".pdf,.jpg,.jpeg,.png"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <p class="text-sm text-gray-500 mt-1">Maximum file size: 5MB</p>
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Additional Supporting Documents</label>
            <div class="relative">
                <input type="file" name="additionalDocs[]" multiple accept=".pdf,.jpg,.jpeg,.png"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <p class="text-sm text-gray-500 mt-1">You can upload multiple files (Max 5 files, 5MB each)</p>
            </div>
        </div>
    </div>
</div> 