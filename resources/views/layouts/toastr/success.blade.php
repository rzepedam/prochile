@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.success('{!! Session::get('message') !!}', '');
        });
    </script>
@endif

