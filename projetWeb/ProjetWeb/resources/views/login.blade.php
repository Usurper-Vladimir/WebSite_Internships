<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <title>Login - Wardiere Inc.</title> 

    <!-- PWA  -->
  <meta name="theme-color" content="#6777ef"/>
  <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<style>
    body, html {
  background-color: #1C1C39;
  margin: 0;
  font-family: 'Poppins'
}

.container {
  display: flex;
  height: 100%;
}

h1{
  position: relative;
  bottom: 250px
}



.login-section {
  flex-basis: 50%;
  color: white;
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  
}
/*#1c1e3b
#14152a
#1a1a2e*/
.login-section h1,
.login-section h2,
.login-section p {
  margin: 0;
}


input[type="text"], input[type="password"] {
  width: calc(100% - 22px); /* Largeur moins le padding et la bordure */
  padding: 0px;
  background-color: transparent; 
  border: none; 
  border-radius: 0; 
  color: white; 
  font-size: 15px;

}
input[type="text"]:focus, input[type="password"]:focus {
  background: transparent; 
  border: none; 
  outline: none; 
  border-bottom: 2px solid #4e0eff; 
  
}


fieldset {
  border: 0.5px solid white; 
  border-radius: 10px;
  margin-bottom: 20px; 
  width: 600px;
 
}

.test{
  margin-left: 150px;
}

.login-section button {
  width: 200px;
  padding: 10px;
  margin-left: 210px;
  margin-top: 20px;
  border: none;
  border-radius: 20px;
  background-color: #4e0eff;
  color: white;
  cursor: pointer;
  margin-bottom: 5px;
  box-shadow: 0 4px 8px 0 rgba(255,255,255,0.2), 0 6px 20px 0 rgba(255,255,255,0.19);
}


button:hover {
  background-color: #3e00df;
  font-weight: bold;
}

.login-section a {
  margin-left: 155px;
  text-align: center;
  width: 200px;
  color: white;
  cursor: pointer;
  display: block;
  margin-top: 10px;
  text-decoration: none;
}

a:hover{
  
  color: #4e0eff;
  text-decoration:underline;
}

.image-section {
  width: 50%; 
  height: 100vh; 
  background-image: url('storage/image/loginimg.png');
  background-size: cover;
  
}




/* .spinner {
  width: 80px;
  height: 80px;
  --clr: #b05eaf;
  animation: spinner 2s infinite linear;
  transform-style: preserve-3d;
  margin-top: 50px;
  margin-left: 220px;
  position: relative;

    bottom: 600px;
}

.spinner > div {
  background-color: var(--clr-alpha);
  height: 100%;
  position: absolute;
  width: 100%;
  border: 5px solid var(--clr);
}

.spinner div:nth-of-type(1) {
  transform: translateZ(-40px) rotateY(180deg);
}

.spinner div:nth-of-type(2) {
  transform: rotateY(-270deg) translateX(50%);
  transform-origin: top right;
}

.spinner div:nth-of-type(3) {
  transform: rotateY(270deg) translateX(-50%);
  transform-origin: center left;
}

.spinner div:nth-of-type(4) {
  transform: rotateX(90deg) translateY(-50%);
  transform-origin: top center;
}

.spinner div:nth-of-type(5) {
  transform: rotateX(-90deg) translateY(50%);
  transform-origin: bottom center;
}

.spinner div:nth-of-type(6) {
  transform: translateZ(40px);
}

@keyframes spinner {
  0% {
    transform: rotate(0deg) rotateX(0deg) rotateY(0deg);
  }

  50% {
    transform: rotate(180deg) rotateX(180deg) rotateY(180deg);
  }

  100% {
    transform: rotate(360deg) rotateX(360deg) rotateY(360deg);
  }
} */

.spinner {
  width: 80px;
  height: 80px;
  --clr: #1C1C39; /* This is the color you provided */
  animation: spinner 2s infinite linear;
  transform-style: preserve-3d;
  margin-top: 50px;
  margin-left: 220px;
  position: relative;
  bottom: 600px;
}

.spinner > div {
  background-color: var(--clr); 
  border: 5px solid #b05eaf; 
  height: 100%;
  position: absolute;
  width: 100%;
}

.spinner div:nth-of-type(1) {
  transform: translateZ(-40px) rotateY(180deg);
}

.spinner div:nth-of-type(2) {
  transform: rotateY(-270deg) translateX(50%);
  transform-origin: top right;
}

.spinner div:nth-of-type(3) {
  transform: rotateY(270deg) translateX(-50%);
  transform-origin: center left;
}

.spinner div:nth-of-type(4) {
  transform: rotateX(90deg) translateY(-50%);
  transform-origin: top center;
}

.spinner div:nth-of-type(5) {
  transform: rotateX(-90deg) translateY(50%);
  transform-origin: bottom center;
}

.spinner div:nth-of-type(6) {
  transform: translateZ(40px);
}

@keyframes spinner {
  0% {
    transform: rotate(0deg) rotateX(0deg) rotateY(0deg);
  }
  50% {
    transform: rotate(180deg) rotateX(180deg) rotateY(180deg);
  }
  100% {
    transform: rotate(360deg) rotateX(360deg) rotateY(360deg);
  }
}


@keyframes spinner {
  0% {
    transform: rotate(0deg) rotateX(0deg) rotateY(0deg);
  }
  50% {
    transform: rotate(180deg) rotateX(180deg) rotateY(180deg);
  }
  100% {
    transform: rotate(360deg) rotateX(360deg) rotateY(360deg);
  }
}


/* Media Query pour les écrans d'une largeur maximale de 768px */
@media (max-width: 1000px) {
  .container {
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  h1,h2,p{
    text-align: center;
  }
  h1{
    position: relative;
    top: 10px;
    margin-bottom: 200px
  }


  .image-section {
    display: none; /* Cache l'image de fond sur les petits écrans */
  }

  .login-section {
    padding: 20px;
    margin: 0 auto; /* Centre la section de connexion */
  }

  .test {
    margin-left: 0; 
    margin-top: 180px;
  }

  .login-section button {
    margin-left: calc(50% - 100px); /* Centrer le bouton. Ajustez selon la largeur de votre bouton */
  }

  .login-section a {
    margin-left: calc(50% - 100px); /* Centrer le lien. Ajustez selon la largeur de votre lien */
  }

  fieldset {
    width: 500px;
  }

  .spinner{
    position: relative;
    bottom: 570px;
}
}

@media (max-width: 620px) {

  .container {
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  h1,h2,p{
    text-align: center;
  }
  

  .login-section, .image-section {
    flex-basis: 100%;
  }

  .image-section {
    display: none; /* Cache l'image de fond sur les petits écrans */
  }

  .login-section {
    padding: 20px;
    margin: 0 auto; /* Centre la section de connexion */
  }

  .test {
    margin-left: 0; /* Ajuste la marge pour les petits écrans */
  }

  .login-section button {
    margin-left: calc(50% - 100px); /* Centrer le bouton. Ajustez selon la largeur de votre bouton */
  }

  .login-section a {
    margin-left: calc(50% - 100px); /* Centrer le lien. Ajustez selon la largeur de votre lien */
  }

  fieldset {
    width: 100%;
  }

  .spinner{

    right: 110px;
}
}


@media (max-width: 380px) {

  .container {
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  h1,h2,p{
    text-align: center;
  }
 

  .login-section, .image-section {
    flex-basis: 100%;
  }

  .image-section {
    display: none; /* Cache l'image de fond sur les petits écrans */
  }

  .login-section {
    padding: 20px;
    margin: 0 auto; /* Centre la section de connexion */
  }

  .test {
    margin-left: 0; /* Ajuste la marge pour les petits écrans */
  }

  .login-section button {
    margin-left: calc(50% - 100px); /* Centrer le bouton. Ajustez selon la largeur de votre bouton */
  }

  .login-section a {
    margin-left: calc(50% - 100px); /* Centrer le lien. Ajustez selon la largeur de votre lien */
  }

  fieldset {
    width: 250px;
    margin-left: 15px;
  }

  

}

.text-danger{
    color: red;
    
}
.alert {
  color: red;

}
</style>

<body>
    <div class="container">
      <div class="login-section">
       
        <h1 style="font-weight: bold; font-size: 30px;">Wardiere Inc.</h1>
       
        <div class="test">
          <h2 style="font-weight: bold; font-size: 22px;">Sign in</h2>
          
          <p style="margin-bottom: 20px;">Let's get started!</p>
          <form action="{{route('login-user')}}" method="post">

            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            @csrf

          <fieldset >
            <legend> <h4>Email</h4> </legend>
            <input type="text"  placeholder="Ex: azerty@gmail.com"
              name="email" value="{{old('email')}}">
          </fieldset>
          <span class="text-danger">@error('email')  {{$message}} @enderror</span>

          <fieldset >
            <legend> <h4>Password</h4> </legend>
            <input type="password"  placeholder="Password" 
              name="password" value="" >
          </fieldset>
          <span class="text-danger">@error('password')  {{$message}} @enderror</span>

          
          <div>
          <button type="submit">Log in</button>
          <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
          </form>
      
        </div>
      </div>

      <div class="image-section"></div>
  
    </div>



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