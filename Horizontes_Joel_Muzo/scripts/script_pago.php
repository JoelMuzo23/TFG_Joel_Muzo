<script>
    function mostrarFormularioPago() {
        var metodoPago = document.querySelector('input[name="metodoPago"]:checked').value;

        if (metodoPago === "tarjeta") {
            document.getElementById("formularioTarjeta").classList.remove("hidden");
            document.getElementById("formularioBancario").classList.add("hidden");
        } else if (metodoPago === "bancario") {
            document.getElementById("formularioBancario").classList.remove("hidden");
            document.getElementById("formularioTarjeta").classList.add("hidden");
            // Aquí podrías generar el IBAN automáticamente o con una llamada AJAX
            document.getElementById("iban").value = "ES9121000418450200051332";
        }
    }
</script>