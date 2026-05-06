<!-- Preloader -->
<div id="preloader" style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; background-color: #ffffff; transition: opacity 0.5s ease, visibility 0.5s ease;">
    <div style="text-align: center;">
        <div style="position: relative; width: 60px; height: 60px; margin: 0 auto 20px;">
            <div style="position: absolute; inset: 0; border: 4px solid #f0fdfa; border-top-color: #0d9488; border-radius: 50%; animation: preloader-spin 0.8s linear infinite;"></div>
        </div>
        <p style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 18px; color: #111827; margin: 0;">HireMate <span style="color: #0d9488;">LK</span></p>
    </div>
</div>

<style>
    @keyframes preloader-spin {
        to { transform: rotate(360deg); }
    }
    #preloader.preloader-hidden {
        opacity: 0;
        visibility: hidden;
    }
</style>

<script>
    window.addEventListener('load', function () {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            preloader.classList.add('preloader-hidden');
            setTimeout(function () {
                preloader.style.display = 'none';
            }, 500);
        }
    });
</script>
