<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    @yield('title')

    <!-- Favicon -->
    <meta name="author" content="Victor John Ukam" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('hse-assets/img/favicon/apple-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('hse-assets/img/favicon/apple-icon-60x60.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('hse-assets/img/favicon/apple-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('hse-assets/img/favicon/apple-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('hse-assets/img/favicon/apple-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('hse-assets/img/favicon/apple-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('hse-assets/img/favicon/apple-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('hse-assets/img/favicon/apple-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('hse-assets/img/favicon/apple-icon-180x180.png') }}" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('hse-assets/img/favicon/android-icon-192x192.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('hse-assets/img/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('hse-assets/img/favicon/favicon-96x96.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('hse-assets/img/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('hse-assets/img/favicon/manifest.json') }}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="{{ asset('hse-assets/img/favicon/ms-icon-144x144.png') }}" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    @livewireStyles()
    <link rel="stylesheet" href="{{ asset('admin-assets/css/vendor.min.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/theme.minc619.css?v=1.0') }}">

    <link rel="preload" href="{{ asset('admin-assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{ asset('admin-assets/css/theme-dark.min.css') }}" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
        *
        {
        transition: unset !important;
        }

        body
        {
        opacity: 0;
        }
    </style>

    <script>
        window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.html","assets/css/docs.css","assets/vendor/icon-set/style.html","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                c= hex.substring(1).split('');
                if(c.length== 3){
                    c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c= '0x'+c.join('');
                return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
</head>

<body class="d-flex align-items-center min-h-100">

    <script src="{{ asset('admin-assets/js/hs.theme-appearance.js') }}"></script>

    <!-- ========== HEADER ========== -->
    <header class="position-absolute top-0 start-0 end-0 mt-3 mx-3">
        <div class="d-flex d-lg-none justify-content-between">
            <a href="index.html">
            <img class="w-100" src="{{ asset('admin-assets/img/logos/main.jpg') }}" alt="N.U.E logo" data-hs-theme-appearance="default" style="min-width: 7rem; max-width: 7rem;">
            <img class="w-100" src="{{ asset('admin-assets/img/logos/main.jpg') }}" alt="Image Description" data-hs-theme-appearance="dark" style="min-width: 7rem; max-width: 7rem;">
            </a>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    @yield('content')
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Implementing Plugins -->
    @livewireScripts()
    <script src="{{ asset('admin-assets/js/vendor.min.js') }}"></script>

    <!-- JS Front -->
    <script src="{{ asset('admin-assets/js/theme.min.js') }}"></script>

    <script src="https://unpkg.com/trix@1.2.3/dist/trix.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    @stack('scripts')

    <!-- JS Plugins Init. -->
    <script>
        (function() {
        window.onload = function () {
            // INITIALIZATION OF BOOTSTRAP VALIDATION
            // =======================================================
            HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                alert('Submited')
            }
            })


            // INITIALIZATION OF TOGGLE PASSWORD
            // =======================================================
            new HSTogglePassword('.js-toggle-password')


            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')
        }
        })()
    </script>

</body>

</html>


{{--  <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Basic Log In | Front - Admin &amp; Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/vendor.min.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/theme.minc619.css?v=1.0') }}">

    <link rel="preload" href="{{ asset('admin-assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{ asset('admin-assets/css/theme-dark.min.css') }}" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
        *
        {
        transition: unset !important;
        }

        body
        {
        opacity: 0;
        }
    </style>

    <script>
        window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["{{ asset('admin-assets/js/hs.theme-appearance.js') }}","{{ asset('admin-assets/js/hs.theme-appearance-charts.js') }}","{{ asset('admin-assets/js/demo.js') }}"],"build":["{{ asset('admin-assets/css/theme.css') }}","{{ asset('admin-assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}","{{ asset('admin-assets/js/demo.js') }}","{{ asset('admin-assets/css/theme-dark.html') }}","{{ asset('admin-assets/css/docs.css') }}","{{ asset('admin-assets/vendor/icon-set/style.html') }}","{{ asset('admin-assets/js/hs.theme-appearance.js') }}","{{ asset('admin-assets/js/hs.theme-appearance-charts.js') }}","{{ asset('admin-assets/node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html') }}","{{ asset('admin-assets/js/demo.js') }}"],"minifyCSSFiles":["{{ asset('admin-assets/css/theme.css') }}","{{ asset('admin-assets/css/theme-dark.css') }}"],"copyDependencies":"dist":"{{ asset('*admin-assets/js/theme-custom.js') }}":"",
        "build":"{{ asset('*admin-assets/js/theme-custom.js') }}":"","{{ asset('admin-assets/node_modules/bootstrap-icons/font/*fonts/**') }}":"{{ asset('admin-assets/css') }}",
        "buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}}}
        window.hs_config.gulpRGBA = (p1) => {
        const options = p1.split(',')
        const hex = options[0].toString()
        const transparent = options[1].toString()

        var c;
        if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
            c= hex.substring(1).split('');
            if(c.length== 3){
            c= [c[0], c[0], c[1], c[1], c[2], c[2]];
            }
            c= '0x'+c.join('');
            return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
        }
        throw new Error('Bad Hex');
        }
                    window.hs_config.gulpDarken = (p1) => {
        const options = p1.split(',')

        let col = options[0].toString()
        let amt = -parseInt(options[1])
        var usePound = false

        if (col[0] == "#") {
            col = col.slice(1)
            usePound = true
        }
        var num = parseInt(col, 16)
        var r = (num >> 16) + amt
        if (r > 255) {
            r = 255
        } else if (r < 0) {
            r = 0
        }
        var b = ((num >> 8) & 0x00FF) + amt
        if (b > 255) {
            b = 255
        } else if (b < 0) {
            b = 0
        }
        var g = (num & 0x0000FF) + amt
        if (g > 255) {
            g = 255
        } else if (g < 0) {
            g = 0
        }
        return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
                    window.hs_config.gulpLighten = (p1) => {
        const options = p1.split(',')

        let col = options[0].toString()
        let amt = parseInt(options[1])
        var usePound = false

        if (col[0] == "#") {
            col = col.slice(1)
            usePound = true
        }
        var num = parseInt(col, 16)
        var r = (num >> 16) + amt
        if (r > 255) {
            r = 255
        } else if (r < 0) {
            r = 0
        }
        var b = ((num >> 8) & 0x00FF) + amt
        if (b > 255) {
            b = 255
        } else if (b < 0) {
            b = 0
        }
        var g = (num & 0x0000FF) + amt
        if (g > 255) {
            g = 255
        } else if (g < 0) {
            g = 0
        }
        return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
</head>

<body>

  <script src="{{ asset('admin-assets/js/hs.theme-appearance.js') }}"></script>

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url({{ asset('admin-assets/svg/components/card-6.svg') }});">
      <!-- Shape -->
      <div class="shape shape-bottom zi-1">
        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
          <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
        </svg>
      </div>
      <!-- End Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
      <a class="d-flex justify-content-center mb-5" href="index.html">
        <img class="zi-2" src="{{ asset('admin-assets/svg/logos/logo.svg') }}" alt="Image Description" style="width: 8rem;">
      </a>

      <div class="mx-auto" style="max-width: 30rem;">
        <!-- Card -->
        <div class="card card-lg mb-5">
          <div class="card-body">
            <!-- Form -->
            <form class="js-validate needs-validation" novalidate>
              <div class="text-center">
                <div class="mb-5">
                  <h1 class="display-5">Sign in</h1>
                  <p>Don't have an account yet? <a class="link" href="authentication-signup-basic.html">Sign up here</a></p>
                </div>

                <div class="d-grid mb-4">
                  <a class="btn btn-white btn-lg" href="#">
                    <span class="d-flex justify-content-center align-items-center">
                      <img class="avatar avatar-xss me-2" src="{{ asset('admin-assets/svg/brands/google-icon.svg') }}" alt="Image Description">
                      Sign in with Google
                    </span>
                  </a>
                </div>

                <span class="divider-center text-muted mb-4">OR</span>
              </div>

              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="signinSrEmail">Your email</label>
                <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail" tabindex="1" placeholder="email@address.com" aria-label="email@address.com" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>
              </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-4">
                <label class="form-label w-100" for="signupSrPassword" tabindex="0">
                  <span class="d-flex justify-content-between align-items-center">
                    <span>Password</span>
                    <a class="form-label-link mb-0" href="authentication-reset-password-basic.html">Forgot Password?</a>
                  </span>
                </label>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupSrPassword" placeholder="8+ characters required" aria-label="8+ characters required" required minlength="8" data-hs-toggle-password-options='{
                           "target": "#changePassTarget",
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": "#changePassIcon"
                         }'>
                  <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                    <i id="changePassIcon" class="bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Please enter a valid password.</span>
              </div>
              <!-- End Form -->

              <!-- Form Check -->
              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
                <label class="form-check-label" for="termsCheckbox">
                  Remember me
                </label>
              </div>
              <!-- End Form Check -->

              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Card -->

        <!-- Footer -->
        <div class="position-relative text-center zi-1">
          <small class="text-cap text-body mb-4">Trusted by the world's best teams</small>

          <div class="w-85 mx-auto">
            <div class="row justify-content-between">
              <div class="col">
                <img class="img-fluid" src="{{ asset('admin-assets/svg/brands/gitlab-gray.svg') }}" alt="Logo">
              </div>
              <!-- End Col -->

              <div class="col">
                <img class="img-fluid" src="{{ asset('admin-assets/svg/brands/fitbit-gray.svg') }}" alt="Logo">
              </div>
              <!-- End Col -->

              <div class="col">
                <img class="img-fluid" src="{{ asset('admin-assets/svg/brands/flow-xo-gray.svg') }}" alt="Logo">
              </div>
              <!-- End Col -->

              <div class="col">
                <img class="img-fluid" src="{{ asset('admin-assets/svg/brands/layar-gray.svg') }}" alt="Logo">
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- JS Implementing Plugins -->
  <script src="{{ asset('admin-assets/js/vendor.min.js') }}"></script>

  <!-- JS Front -->
  <script src="{{ asset('admin-assets/js/theme.min.js') }}"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {
        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
          onSubmit: data => {
            data.event.preventDefault()
            alert('Submited')
          }
        })


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')
      }
    })()
  </script>
</body>

</html>  --}}