

<!doctype html>
<html lang="ar" dir="" >
    <style>
        *{
            
            text-align: left
        }
    </style>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Blog Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
  </head>
  <body>
    <header class="blog-header w-100 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted ml-4" href="#"><svg style="fill: #fff" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
          </svg></a>
        </div>
        <div class="col-4 text-center ">
          <a class="blog-header-logo text-dark"> BeeMedia - <span style="text-transform: lowercase">BeeMedia.com</span></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
          </a>
        <a class="btn btn-sm btn-light" href="{{route("posts.index")}}">المقالات</a>
          <a class="btn btn-sm btn-light ml-2" href="{{route("posts.create")}}">مقالة جديدة</a>
        </div>
      </div>
    </header>
    <div class="container"> 




</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main mt-4">
      




             {{--   معناها إدخل بالعربي --}}
         @yield('content') {{--  هنا حط لي متحوى الذي يحمل نفس الاسم  --}}
                            {{--      في سي اس اس   import      عمل هذي زي  --}}

      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div><!-- /.blog-main -->

    <aside class=" col-md-4 blog-sidebar mt-5">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="">About</h4>
        <p class="mb-0">Etiam porta sem malesuada magna  mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

     
      <div class="p-4">
        <h4 class="">Archives</h4>
        <ol class="list-unstyled mb-0">
          @foreach ($archives as $archive)
        <li><a href="/cms/public/posts/{{$archive->year}}/{{$archive->month_number}}">{{$archive->month . ' ' . $archive->year .' (' . $archive->post_count .')' }}</a></li>
          @endforeach
          
        </ol>
      </div>


    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->
@yield('footer')

</body>
</html>
