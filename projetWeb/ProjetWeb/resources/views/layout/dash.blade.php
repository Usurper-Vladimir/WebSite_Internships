<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">
    <title>DASHBOARD</title>

        <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="{{url('admin/dashboard')}}" >
                        <span class="icon" >
                          <ion-icon name="bonfire-outline"></ion-icon>
                        </span>
                        <span class="title">Wardiere Inc.</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/stat')}}">
                        <span class="icon">
                            <ion-icon name="home"></ion-icon>                        
                          </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/company')}}">
                        <span class="icon">
                            <ion-icon name="business-outline"></ion-icon>                        
                          </span>
                        <span class="title">Manage Companies</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/internship')}}">
                        <span class="icon">
                            <ion-icon name="school"></ion-icon>
                        </span>
                        <span class="title">Manage internships</span>
                    </a>
                </li>
                
                {{-- <li>
                    <a href="{{url('admin/pilote')}}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Pilots</span>
                        // <span class="title">Manage Pilots {{dd($data->id)}}</span> 
                    </a>
                </li> --}}
                
                @if(isset($data) /*&& isset($data->type)*/ && $data->type === 'admin')
                <li>
                    <a href="{{ url('admin/pilote') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Pilots</span>
                         
                    </a>
                </li>
            @endif

                <li>
                    <a href="{{url('admin/student')}}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Students</span>
                    </a>
                </li>

               

                <li>
                    <a href="{{url('account')}}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">EXIT</span>
                    </a>
                </li>
            </ul>
        </div>

        @yield('content')

        <script>
            // add hovered class to selected list item
    let list = document.querySelectorAll(".navigation li");
    
    function activeLink() {
      list.forEach((item) => {
        item.classList.remove("hovered");
      });
      this.classList.add("hovered");
    }
    
    list.forEach((item) => item.addEventListener("mouseover", activeLink));
    
    // Menu Toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");
    
    toggle.onclick = function () {
      navigation.classList.toggle("active");
      main.classList.toggle("active");
    };
    
        </script>
    
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        
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
