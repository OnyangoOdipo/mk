<div class="form-step active" data-step="1">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="form-group">
            <label class="block text-gray-700 mb-2">
                First Name <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="text" 
                       name="firstName" 
                       id="firstName"
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                       placeholder="Enter your first name">
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">
                Last Name <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="text" 
                       name="lastName" 
                       id="lastName"
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                       placeholder="Enter your last name">
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">
                Email Address <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="email" 
                       name="email" 
                       id="email"
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                       placeholder="your@email.com">
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">
                Phone Number <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="tel" 
                       name="phone" 
                       id="phone"
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                              focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                       placeholder="+1234567890">
            </div>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Date of Birth *</label>
            <input type="date" name="dob" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                          focus:ring-2 focus:ring-blue-200 transition-all duration-300">
        </div>

        <div class="form-group">
            <label class="block text-gray-700 mb-2">Nationality *</label>
            <select name="nationality" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                           focus:ring-2 focus:ring-blue-200 transition-all duration-300">
                <option value="">Select Nationality</option>
                <?php include 'data/nationalities.php'; ?>
            </select>
        </div>

        <div class="form-group md:col-span-2">
            <label class="block text-gray-700 mb-2">Current Address *</label>
            <textarea name="address" required rows="3"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 
                             focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                      placeholder="Enter your current address"></textarea>
        </div>
    </div>
</div> 