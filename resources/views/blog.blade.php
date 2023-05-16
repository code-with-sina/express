<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ \App\Models\Setting::find(1)->blog_name }}</title>
  <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->blog_favicon }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/front/css/styles.css">
  <script src="https://use.fontawesome.com/f6996e3010.js"></script>
  <livewire:styles />
</head>
<body class="bg-dark text-white">
    <div class="container-fluid bg-dark">
        <nav class="navbar navbar-expand-lg container bg-dark mb-5 py-3 border-bottom fixed-top" data-bs-theme="dark">
          <div class="container-fluid">
    
            <a class="navbar-brand d-none d-sm-block" href="#">
              <img src="{{ \App\Models\Setting::find(1)->blog_logo }}" class="img-fluid rounded-top w-75" alt="">
            </a>
    
            <i class="fa fa-bars fa-2x navbar-brand d-block d-sm-none" data-bs-toggle="offcanvas" href="#offcanvasExample"
              role="button" aria-controls="offcanvasExample"></i>
            <div class="d-none d-sm-block d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Terms and Condition</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Legal</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Fees</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex d-block">
              <img src="/front/image/notifiable.png" class="img-fluid" style="height: 30px;" alt="">
            </div>
          </div>
        </nav>
      </div>

      <main class="container-fluid vh-75 mt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col col-md-8">
                    <div class="container py-5 px-5">
                        <div class="row">
                            <div class="col-md-12 border-bottom fw-light py-4">
                                <div class="row">
                                    <div class="d-none d-sm-block col-md-1">
                                        <img src="/front/image/notifiable.png" class="img-fluid" style="height: 30px;" alt=""> 
                                    </div>
                                    <div class="col-md-11 text-start">
                                       <span> Keep up with the latest in any topic</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 border-bottom py-2">
                                <div class="row justify-between">
                                    <div class="col col-md-9 gx-2">
                                        <p class="lead fs-3 fw-light text-truncate py-3">
                                            Your portfolio is stopping you from geting that job
                                        </p>
                                        <p class="fw-light py-3">
                                            An intense way to learn about the process and practice your designs skills 
                                            — My 1st hackathon Hackathons have been on my 
                                            mind since I heard it was a good way to gain experience 
                                            <span class="text-truncate">as a junior UX designer. As my portfolio...</span>
                                        </p>
                                    </div>
                                    <div class="col col-md-3 py-3">
                                        <img src="/front/image/blogimage.png" class="img-fluid w-100 m-0 p-0" alt=""> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 border-bottom"></div>
                            <div class="col-md-12 border-bottom"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 border-start">
                    <div class="container py-5 px-2">
                        <div class="mb-5">
                            <input type="email" class="form-control rounded-pill bg-transparent text-white" id="exampleFormControlInput1" placeholder="" value="Search">
                        </div>
                        <div class="mb-3 px-2 pb-5">
                            <a href="#" class="nav-link mb-2">
                                <span class="badge bg-success rounded-pill text-success me-3">.</span>
                                How to do Payoneer to Payoneer transfer
                            </a>
                            <a href="#" class="nav-link mb-2">
                                <span class="badge bg-success rounded-pill text-success me-3">.</span>
                                How to do Payoneer to Payoneer transfer
                            </a>
                            <a href="#" class="nav-link mb-2">
                                <span class="badge bg-success rounded-pill text-success me-3">.</span>
                                How to do Payoneer to Payoneer transfer
                            </a>
                            <a href="#" class="nav-link mb-2">
                                <span class="badge bg-success rounded-pill text-success me-3">.</span>
                                How to do Payoneer to Payoneer transfer
                            </a>
                            <a href="#" class="nav-link mb-2">
                                <span class="badge bg-success rounded-pill text-success me-3">.</span>
                                How to do Payoneer to Payoneer transfer
                            </a>
                        </div>
                        <div class="pb-5 px-3">
                            <p class="text-success">See full list</p>
                        </div>
                        <div class="py-3">
                            <p class="text-white">
                                Recommended Topic
                            </p>

                            <button class="bg-light py-2 px-4 rounded-pill">Technology</button>
                            <button class="bg-light py-2 px-4 rounded-pill">Money</button>
                            <button class="bg-light py-2 px-4 rounded-pill">Business</button>
                            <button class="bg-light py-2 px-4 rounded-pill">Productivity</button>
                            <button class="bg-light py-2 px-4 rounded-pill">Art</button>
                            <button class="bg-light py-2 px-4 rounded-pill">Mindfullness</button>
                            <button class="bg-light py-2 px-4 rounded-pill">Yada Yada</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </main>

<livewire:scripts />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>