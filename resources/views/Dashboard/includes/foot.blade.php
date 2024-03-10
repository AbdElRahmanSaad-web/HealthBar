 <!-- Bootstrap JS -->
 <script src="{{ asset('AdminAssets/assets/js/bootstrap.bundle.min.js') }}"></script>
 <!--plugins-->
 <script src="{{ asset('AdminAssets/assets/js/jquery.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
 <!--notification js -->
 <script src="{{ asset('AdminAssets/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/plugins/notifications/js/notifications.min.js') }}"></script>
 <script src="{{ asset('AdminAssets/assets/js/index.js') }}"></script>
 <!--app JS-->
 <script src="{{ asset('AdminAssets/assets/js/app.js') }}"></script>

 {{-- dataTaples --}}
 <script src="{{asset('AdminAssets/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('AdminAssets/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
 {{-- <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script> --}}

 @yield('scripts')

 <script>
     $('.multiple-select').select2({
         theme: 'bootstrap4',
         width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
             'w-100') ? '100%' : 'style',
         placeholder: $(this).data('placeholder'),
         allowClear: Boolean($(this).data('allow-clear')),
     });
 </script>

 <script>
     $(document).ready(function() {
         $('#example').DataTable({
             "bPaginate": false,
             dom: 'frtip'
         });
     });

     $(window).on('load', function() {
         $('.preloader').fadeOut('slow');
         // $('.wrapper').fadeIn('slow');
         $('.wrapper').removeClass('d-none');
     });
 </script>

    @stack('scripts')

 </body>

 </html>
