<script>
        document.getElementById("increment-btn").addEventListener("click", function() {
            var input = document.getElementById("viajeros");
            var currentValue = parseInt(input.value);
            if (currentValue < parseInt(input.max)) {
                input.value = currentValue + 1;
            }
        });

        document.getElementById("decrement-btn").addEventListener("click", function() {
            var input = document.getElementById("viajeros");
            var currentValue = parseInt(input.value);
            if (currentValue > parseInt(input.min)) {
                input.value = currentValue - 1;
            }
        });

        document.getElementById("incrementha-btn").addEventListener("click", function() {
            var input = document.getElementById("habitaciones");
            var currentValue = parseInt(input.value);
            if (currentValue < parseInt(input.max)) {
                input.value = currentValue + 1;
            }
        });

        document.getElementById("decrementha-btn").addEventListener("click", function() {
            var input = document.getElementById("habitaciones");
            var currentValue = parseInt(input.value);
            if (currentValue > parseInt(input.min)) {
                input.value = currentValue - 1;
            }
        });
        
    </script>