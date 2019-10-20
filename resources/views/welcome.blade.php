@extends('layouts.app')

@push('page-styles')
<style type="text/css">
    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-pack: center;
        -webkit-box-pack: center;
        justify-content: center;
        color: #fff;
        text-shadow: 0 0.05rem 0.1rem rgba(10, 0, 10, .5);
        box-shadow: inset 0 0 5rem rgba(10, 0, 10, .5);
/*        background-image: url(https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Colorful-Circle-Simple-Background-Image-1.jpg);
*/        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    html, body {
        height: 100%;
        background: #bdc3c7; /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #bdc3c7, #2c3e50); /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #bdc3c7, #2c3e50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .cover-container {
      max-width: 42em;
    }
    /*
     * Cover
     */
    .cover {
      padding: 0 1.5rem;
    }
    .cover .btn-lg {
      padding: .75rem 1.25rem;
      font-weight: 700;
    }
</style>
@endpush

@section('content')
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
     {{--  <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Cover</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Contact</a>
          </nav>
        </div>
      </header> --}}

      <main role="main" class="inner cover">
        <br><br>
        <h1 class="cover-heading">Test your math!</h1>
        <p class="lead">Take this short 5 minute math quiz.</p>
        <p class="lead">
          <a href="/start" class="btn btn-lg btn-primary">Start Now</a>
        </p>
      </main>

{{--       <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
      </footer> --}}
    </div>

@endsection
