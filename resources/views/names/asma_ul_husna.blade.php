<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="//d3w4b6mljoazo9.cloudfront.net/assets/ico/favicon.png">
    <link rel="apple-touch-icon"
        href="//d3w4b6mljoazo9.cloudfront.net/assets/ico/apple-touch-icon-144-precomposed.png" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link rel="dns-prefetch" href="//connect.facebook.net">
    @yield('styles')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php
echo json_encode([
'csrfToken' => csrf_token(),
]);
?>
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W9W26C9');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W9W26C9" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">
        @if (!$agent->isMobile())
        <header class="white-bg">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <div class="logo"><img src="//cdn.names4muslims.com/assets/img/logo.png" alt="Muslim Names"
                                title="Muslim Names" class="img-fluid" /></div>
                    </div>
                    <div class="d-none d-sm-block col-sm-8 col-lg-8">
                        <h1 class="float-right text-info  main-title2">
                            {{ Str::before(SEOMeta::getTitle('title'),'|') ?? 'Muslim Names and Meaning' }}</h1>
                    </div>
                </div>
            </div>
        </header>
        @endif
        @include('partials.main-menu')
        <!-- /navbar -->
        @if ($agent->isMobile())
        <div class="container-fluid px-1">
            <div class="row no-gutters">
                @else
                <div class="container pt-2">
                    <div class="row">
                        @endif
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-olive text-white">
                                    <h2>Asma Ul Husna</h2>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="table-success">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Arabic</th>
                                                    <th scope="col">Meaning</th>
                                                </tr>
                                            </thead>
                                            @foreach($names as $name)
                                            <tr>
                                                <th scope="row">{{ $name->id }}</th>
                                                <td nowrap>
                                                    <h3>{{ $name->name }}</h3>
                                                </td>
                                                <td nowrap>
                                                    <h2>{!! $name->arabic !!}</h2>
                                                </td>
                                                <td data-title="Meaning">{{ strip_tags($name->meaning) }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="text-xs-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 sidebar">
                            <div class="theiaStickySidebar">
                                <div class="card">
                                    <div class="card-body">
                                        <iframe class="embed-responsive-item"
                                            src="https://www.youtube.com/embed/fb_GuT1LO4w?rel=0" frameborder="0"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-danger-alt" role="alert"><strong>We are not
                                                allowed</strong> to
                                            give any Name/Attributes of Allah to the creation because Allah is UNIQUE.
                                            If we do,
                                            we have to add "Abd(slave)" before the name of Allah. Such as:
                                            Abd-Ar-Rahman;
                                            Abd-Allah; Abd-Aliyyun.</div>


                                        <h5>Allah said in Quran:</h5>
                                        <p>
                                            <div class="alert alert-info-alt" role="alert">(17:110): Say, "Call upon
                                                Allah or
                                                call upon the Most Merciful. Whichever [name] you call - to Him belong
                                                the most
                                                beautiful names."</div>
                                            <div class="alert alert-info-alt" role="alert">(20:8): To Him belong the
                                                most
                                                beautiful names.</div>
                                            <div class="alert alert-info" role="alert">(59:24): To him belong the most
                                                beautiful
                                                names.</div>
                                            <div class="alert alert-info" role="alert">(16:74): Do not assert
                                                similitudes to
                                                Allah (112:4): There is none comparable to him (42:11): There is nothing
                                                like
                                                him</div>
                                            <div class="alert alert-warning-alt" role="alert">So, the attributes / names
                                                of
                                                Allah is only for Allah. Not for any creation of Allah.</div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer mt-3">
                    <div class="container">
                        <div class="row p-3">
                            <div class="col-xs-12 col-sm-5 col-md-5 col-md-push-7 text-muted"><a
                                    href="https://www.names4muslims.com/">Home</a> | <a
                                    href="{{ URL('/privacy.html') }}">Privacy &
                                    Policy</a> | <a href="{{ URL('/contacts.html')}}">Contact Us</a></div>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-md-pull-5 text-muted">Copyright &copy; <script>
                                    document.write(new Date().getFullYear())
                                </script> Names4muslims.com and www.muslim-names.net. Site by <a class="text-muted"
                                    href="http://mebron.com" title="Website by">Mebron</a></div>

                        </div>
                    </div>
                </footer>
            </div>
            <!-- Scripts -->
            <script src="{{ mix('/js/app.js') }}"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js"
                integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH"
                crossorigin="anonymous">
            </script>

            <script>
                $(document).ready(function () {
 $('.content, .sidebar').theiaStickySidebar({
  // Settings
  additionalMarginTop: 80
 });
});
            </script>
            <script>
                $('#pop').popover({
    html: true,
    placement: "left",
    content: function(){
        $.ajax({
            type: 'GET',
            url: '/get-favorites',
            cache: false,
        }).done(function(d){
            $('#favs-results').html(d);
        });

        return '<div id="favs-results">Loading...</div>';
        // Initially, the content() function returns a parent div,
        // which shows "Loading..." message.
        // As soon as the ajax call is complete, the parent div inside
        // the popover gets the ajax call's result.
    }
});
            </script>
            @include('sweetalert::alert')
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-554db26f7c3a70ba">
            </script>
</body>

</html>
