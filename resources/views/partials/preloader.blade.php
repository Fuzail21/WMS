<!-- resources/views/partials/preloader.blade.php -->
<div id="preloader">
    <div class="preloader-content">
        <img src="{{ asset('img/proloader.gif') }}" alt="Loading...">
    </div>
</div>

<style>
    /* Preloader styles */
    #preloader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: rgba(255, 255, 255, 1); /* Slightly dim background */
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
        transition: opacity 1s ease-out;
    }
    .preloader-content {
        animation: fadeIn 1s ease-in-out infinite;
    }
    @keyframes fadeIn {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .preloader-hidden {
        opacity: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var preloader = document.getElementById('preloader');
        var loadTime = Date.now();

        // Show preloader immediately on page load
        preloader.style.display = 'flex';

        window.addEventListener('load', function() {
            var currentTime = Date.now();
            var timeElapsed = currentTime - loadTime;
            var delayTime = 1000 - timeElapsed;

            if (delayTime < 0) {
                delayTime = 0;
            }

            setTimeout(function() {
                preloader.classList.add('preloader-hidden');
                setTimeout(function() {
                    preloader.style.display = 'none';
                }); // Matches the transition duration
            }, delayTime);
        });
    });
</script>
