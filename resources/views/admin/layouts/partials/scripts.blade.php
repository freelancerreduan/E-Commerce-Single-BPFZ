 <!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <!-- Vendor JS Files -->
 <script src="{{ asset('assets/admin') }}/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Template Main JS File -->
 <script src="{{ asset('assets/admin') }}/js/main.js"></script>
 <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 </script>
 @yield('scripts')
</body>

</html>
