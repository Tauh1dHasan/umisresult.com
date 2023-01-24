        @php
            $year = conver_to_bn_number(date('Y'));
        @endphp
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        {{ $year}} © {{$global_setting->title ?? ""}}
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            ডিজাইন ও ডেভেলপ: সার্ভিস ইঞ্জিন লিমিটেড
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- JAVASCRIPT -->
<script src="{{asset('backend-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('backend-assets/assets/js/plugins.js')}}"></script>

{{-- jquery --}}
<script src="{{asset('backend-assets/assets/js/jquery-3.6.0.min.js')}}"></script>
{{-- select2 min js --}}
<script src="{{asset('backend-assets/assets/js/select2.min.js')}}"></script>
<script src="{{asset('backend-assets/assets/js/select2.init.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('backend-assets/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('backend-assets/assets/js/pages/dashboard-crm.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('backend-assets/assets/js/app.js')}}"></script>

{{-- <script src="{{asset('backend-assets/assets/libs/flatpickr/flatpickr.min.js')}}"></script> --}}
{{-- <script src="{{asset('backend-assets/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script> --}}

<!-- glightbox js -->
<script src="{{asset('backend-assets/assets/libs/glightbox/js/glightbox.min.js')}}"></script>

<!-- isotope-layout -->
<script src="{{asset('backend-assets/assets/libs/isotope-layout/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('backend-assets/assets/js/pages/gallery.init.js')}}"></script>



<script>
    $('[href*="{{\URL::current()}}"]').addClass('will_active');
    $('.simplebar-content .nav-link.will_active').map( function() {
        if ($(this).attr('href') == '{{\URL::current()}}') {
            $(this).addClass('active');
            if (!$('[href*="{{\URL::current()}}"]').parent().parent().hasClass('simplebar-content')) {
                $('[href*="{{\URL::current()}}"]').closest('.menu-dropdown').addClass('show');
                $('[href*="{{\URL::current()}}"]').closest('.menu-dropdown').parent().find('.nav-link').attr('aria-expanded','true');
            }
        }
    }).get();
</script>

{{-- stack script --}}
@stack('script')

</body>

</html>
