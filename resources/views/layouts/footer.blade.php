<!-- ALL JS FILES -->
<!-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    // Set timeout for hiding the success message after 5 seconds (5000 milliseconds)
    $(document).ready(function() {
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 5000);
    });
    $(document).ready(function() {
        setTimeout(function() {
            $('#errorMessage').fadeOut('slow');
        }, 5000);
    });
</script>
</body>

</html>