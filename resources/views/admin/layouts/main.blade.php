<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Affiliate Dashboard - SB Admin Pro</title>
        <link href="{{ asset('templates/sb-admin-pro/cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css') }}" rel="stylesheet" />
        <link href="{{ asset('templates/sb-admin-pro/css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('templates/sb-admin-pro/assets/img/favicon.png') }}" />
        <script data-search-pseudo-elements="" defer="" src="{{ asset('templates/sb-admin-pro/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('templates/sb-admin-pro/cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js') }}" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        @include('admin.partials.topbar')
        <div id="layoutSidenav">
            @include('admin.partials.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-5">
                        @yield('container')
                    </div>
                </main>
            </div>
        </div>
        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../cdn.jsdelivr.net/npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="{{ asset('templates/sb-admin-pro/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('templates/sb-admin-pro/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('templates/sb-admin-pro/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('templates/sb-admin-pro/assets/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('templates/sb-admin-pro/cdn.jsdelivr.net/npm/litepicker/dist/bundle.js') }}" crossorigin="anonymous"></script>
        <script src="{{ aseet('templates/sb-admin-pro/js/litepicker.js') }}"></script>

        <script src="{{ asset('templates/sb-admin-pro/assets.startbootstrap.com/js/sb-customizer.js') }}"></script>
        <sb-customizer project="sb-admin-pro"></sb-customizer>
    <script>(function(){var js = "window['__CF$cv$params']={r:'822e4aec3e498b2f',t:'MTY5OTQ1MTUwNi43NzAwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='cdn-cgi/challenge-platform/h/g/scripts/jsd/9914b343/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"822e4aec3e498b2f","b":1,"version":"2023.10.0","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from sb-admin-pro.startbootstrap.com/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 13:52:40 GMT -->
</html>
