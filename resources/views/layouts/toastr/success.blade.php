@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function () {
            toastr.success('{{ Session::get('message') }}', '', {
                "closeButton": true,
                "progressBar": true,
                "timeOut": "2000"
            });
        });
    </script>
@endif

