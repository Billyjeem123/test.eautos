<!-- resources/views/countdown.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const endDate = new Date("{{ $endingDate }}").getTime();

            const countdownElement = document.getElementById('countdown');

            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = endDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

                if (distance < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML = "EXPIRED";
                }
            };

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown();
        });
    </script>
</head>
<body>
<h1>Countdown Timer</h1>
<div id="countdown"></div>
</body>
</html>
