<script>
    window.addEventListener('DOMContentLoaded', event => {
        console.log("🚀 Vào datatables")
        // https://github.com/fiduswriter/Simple-DataTables/wiki
        // Simple-DataTables

        const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });

</script>