<footer id="footer" class="footer">
    <div class="copyright">
        &copy; {{ Carbon\Carbon::now()->format('Y') }} All rights reserved by <b>{{ setting()->site_name }}</b>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    @if (session('success'))
        <script>
            swal("Good job!", "{{ session('success') }}!", "success");
        </script>
    @endif


    @if (session('warning'))
        <script>
            swal("Are you sure?", "{{ session('warning') }}!", "warning");
        </script>
    @endif


    @if (session('error'))
        <script>
            swal("Opps!", "{{ session('error') }}!", "error");
        </script>
    @endif



</footer>
