@if (session('success') || session('error') || session('info') || session('warning'))
<div id="flash-message" class="fixed top-4 right-4 z-50 max-w-sm">
    @if (session('success'))
        <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif

    @if (session('info'))
        <div class="bg-blue-500 text-white px-6 py-4 rounded-lg shadow-lg">
            {{ session('info') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="bg-yellow-500 text-white px-6 py-4 rounded-lg shadow-lg">
            {{ session('warning') }}
        </div>
    @endif
</div>

<script>
   
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
     
            const duration = <?php echo (int)session('flash_duration', 2000) ?>;
            
        
            flashMessage.style.opacity = '0';
            flashMessage.style.transition = 'opacity 0.3s ease-in-out';
            
            setTimeout(() => {
                flashMessage.style.opacity = '1';
            }, 10);
            
            setTimeout(() => {
                flashMessage.style.opacity = '0';
                setTimeout(() => {
                    flashMessage.style.display = 'none';
                }, 300);
            }, duration);
        }
    });
</script>
@endif