<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="{{ ('templates/sb-admin-pro/css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('templates/sb-admin-pro/assets/img/favicon.png') }}" />
        <script data-search-pseudo-elements="" defer="" src="{{ asset('templates/sb-admin-pro/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('templates/sb-admin-pro/cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js') }}" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header d-flex justify-content-center"><h3 class="fw-light my-4">Masuk Shift Kerja</h3></div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form method="POST" action="{{ route('post-login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Shift Kerja</label>
                                                <select name="shift" class="form-control" id="shift">
                                                    <option value="" selected disabled>Pilih Shift</option>
                                                    <option value="Siang/06:00-18:00">Siang/06:00-18:00</option>
                                                    <option value="Malam/18:00-06:00">Malam/18:00-06:00</option>
                                                </select>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control @error('username') is-invalid @enderror" id="inputEmailAddress" type="text" name="username" placeholder="Masukkan Username Anda" />
                                                @error('username')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Masukkan Password Anda" />
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- Form Group (login box)-->
                                            <div class="d-flex align-items-center mt-4 mb-0">
                                                <button class="btn w-100 btn-primary" type="submit">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; 2024 Rachmad Suharja</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('templates/sb-admin-pro/cdn.jsdelivr.net/npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('templates/sb-admin-pro/js/scripts.js') }}"></script>

        <script src="{{ asset('templates/sb-admin-pro/assets.startbootstrap.com/js/sb-customizer.js') }}"></script>
        <sb-customizer project="sb-admin-pro"></sb-customizer>
    <script>(function(){var js = "window['__CF$cv$params']={r:'822e4b009a200987',t:'MTY5OTQ1MTUxMC4xNDgwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='cdn-cgi/challenge-platform/h/g/scripts/jsd/9914b343/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"822e4b009a200987","b":1,"version":"2023.10.0","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>
</body>

</html>
