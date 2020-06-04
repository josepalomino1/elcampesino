<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();

    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);

    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems);

    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    var toastElement = document.querySelector('.toast');
    var toastInstance = M.Toast.getInstance(toastElement);
    toastInstance.dismiss();

    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
        direction: 'top'
    });
});
</script>