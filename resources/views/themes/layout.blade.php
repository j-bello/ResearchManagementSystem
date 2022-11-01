<!DOCTYPE html>

<html>

<head>
    <title>Laravel7 CRUD @fahmidasclassroom.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

<script>
    $(document).ready(function() {

        /* When click New customer button */
        $('#new-theme').click(function() {
            $('#btn-save').val("create-theme");
            $('#theme').trigger("reset");
            $('#themeCrudModal').html("Add New Theme");
            $('#crud-modal').modal('show');
        });

        /* Edit customer */
        $('body').on('click', '#edit-theme', function() {
            var customer_id = $(this).data('id');
            $.get('themes/' + customer_id + '/edit', function(data) {
                $('#themeCrudModal').html("Edit Theme");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#theme_id').val(data.id);
                $('#theme').val(data.theme);
                $('#description').val(data.description);
            })
        });
        /* Show customer */
        $('body').on('click', '#show-theme', function() {
            $('#themeCrudModal-show').html("Theme Details");
            $('#crud-modal-show').modal('show');
        });


    });
</script>

</html>
