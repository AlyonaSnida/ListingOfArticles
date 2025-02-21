<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Balita &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>



    <header role="banner">

      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="index.html">Balita</a></h1>
          </div>
        </div>
      </div>

      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">


          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                    @foreach($categories_info as $category)
                        <a class="dropdown-item" href="{{ route('category.show', ['slug_category' => $category->slug]) }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contacts.show', []) }}">Contact</a>
              </li>
            </ul>

          </div>
        </div
      </nav>
    </header>
    <!-- END header -->

    <section class="site-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="owl-carousel owl-theme home-slider">
                @foreach($first_articles as $article)
                  <div>
                    <a href="{{ route('article.show', ['slug_category' => $article->category->slug, 'slug_article' => $article->slug]) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url({{ $article->images[0] }}); ">
                      <div class="text half-to-full">
                        <div class="post-meta">
                          <span class="category">{{ $article->category->name }}</span>
                          <span class="mr-2">{{ $article->created_at->format('F d, Y') }} </span> &bullet;
                        </div>
                        <h3>{{ $article->title }}</h3>
                      </div>
                    </a>
                  </div>
                @endforeach
          </div>
        </div>
      </div>


    </section>
    <!-- END section -->

    <section class="site-section py-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="mb-4">Lifestyle Category</h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-6">
                        <a href="{{ route('article.show', ['slug_category' => $article->category->slug, 'slug_article' => $article->slug]) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                            @if ($article->images)
                                <img src="{{ $article->images[0] }}" alt="Image placeholder">
                            @endif
                            <div class="blog-content-body">
                                <div class="post-meta">
                                    <span class="category">{{ $article->category->name }}</span>
                                    <span class="mr-2">{{ $article->created_at->format('F d, Y') }} </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> {{ $article->comments_count }}</span>
                                </div>
                                <h2>{{ $article->title }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach

                {{ $articles->links() }}

          <!-- END main-content -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                @foreach($categories_info as $index => $category)
                    <li>
                        <a href="{{ route('category.show', ['slug_category' => $category->slug]) }}">
                            {{ $category->name }} <span>({{ $category->articles_count }})</span>
                        </a>
                    </li>
                @endforeach
              </ul>
            </div>
            <!-- END sidebar-box -->

          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.0.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>


    <script src="js/main.js"></script>
  </body>
</html>
