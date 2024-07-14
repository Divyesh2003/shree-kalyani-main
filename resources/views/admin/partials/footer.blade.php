  <!-- / Layout page -->
</div>
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
  <!-- / Layout wrapper -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js')}}"></script>
    <script src="{{ asset('admin/assets/js/app-invoice-add.js')}}"></script>
    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields

      $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    </script>
  @stack('scripts')
  </body>
</html>