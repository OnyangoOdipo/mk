<div class="fixed bottom-6 right-6 z-50">
    <button type="button" 
            onclick="toggleHelp()"
            class="bg-blue-600 text-white w-14 h-14 rounded-full shadow-lg hover:bg-blue-700 
                   transition-all duration-300 flex items-center justify-center">
        <i class="fas fa-question text-xl"></i>
    </button>

    <div id="helpPanel" class="hidden absolute bottom-16 right-0 w-80 bg-white rounded-lg shadow-xl p-4">
        <h3 class="text-lg font-semibold mb-2">Need Help?</h3>
        <p class="text-gray-600 mb-4">Having trouble with your application? Here are some options:</p>
        
        <div class="space-y-2">
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-book-open w-6"></i>
                <span>View Guide</span>
            </a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-envelope w-6"></i>
                <span>Email Support</span>
            </a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-phone w-6"></i>
                <span>Call Us</span>
            </a>
        </div>
    </div>
</div>

<script>
function toggleHelp() {
    const panel = document.getElementById('helpPanel');
    panel.classList.toggle('hidden');
}
</script> 