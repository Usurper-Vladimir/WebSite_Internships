<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wardiere Inc.</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

  <!-- PWA  -->
  <meta name="theme-color" content="#6777ef"/>
  <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>



<body>
  
  <header>      
    <nav>
    
         <!-- Hamburger Menu Toggle -->
    <input type="checkbox" id="checkbox" class="checkbox">
    <label for="checkbox" class="toggle">
        <div class="bar bar--top"></div>
        <div class="bar bar--middle"></div>
        <div class="bar bar--bottom"></div>
    </label>

    
      
        <div class="logo">
          
          <img src="{{ asset('storage/image/boulle.png') }}" alt="Wardiere Inc. Logo">
          Wardiere Inc.
        </div>
    
        <ul class="nav-links">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/home') }}#home2">About</a></li>
            <li><a href="{{ url('/home') }}#home3">Feedback</a></li>
            <li><a href="{{ url('/internships') }}">Internships</a></li>
            <li><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="account">
              <img src="{{ asset('storage/image/boulle.png') }}" alt="Profile">
              <a href="{{ url('/account') }}">My account</a>
          </li>
        </ul>
      
    </nav>
</header>


@yield('content')


<footer>

  <div class="footer-content">
    <div class="footer-logo">
      <img src="{{ asset('storage/image/footer.png') }}" alt="Wardiere Inc. Logo">
      
    </div>
    <div class="footer-section company">
      <h4>Company</h4>
      <ul>
        <li><a href="#home1">Home</a></li>
        <li><a href="#home1">Solutions</a></li>
        <li><a href="#home2">About</a></li>
        <li><a href="#home3">Feedback</a></li>
        
      </ul>
    </div>
    <div class="footer-section documentation">
      <h4>Documentation</h4>
      <ul>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>
    <div class="footer-section social">
      <h4>Social</h4>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Youtube</a></li>
        <li><a href="#">Twitter</a></li>
      </ul>
    </div>
    <img src="{{ asset('storage/image/socials.png') }}" alt="Decorative Image" class="footer-image">
    
  </div>
  
  
  <div class="footer-bottom">
    <p>© Khireddine Lamine All Rights Reserved 2024</p>
  </div>


</footer>

<script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>

</body>
</html>
