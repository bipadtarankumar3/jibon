<header class="header-area">
    <div class="top-header-area">
        <div class="container">
                <div class="top_header">

                    <div class="logo">
                        <a href="{{URL::TO('/')}}">
                        <img src="{{URL::TO('public/assets/images/logo.png')}}" alt="">
                    </a>
                    </div>

                    <div class="top-contact-info d-flex align-items-center">
                        <a href="#url" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="25 th Street Avenue, Los Angeles, CA"><img style="height: auto;" src="images/placeholder.png" alt=""> <span>BANGALBARI,HEMTABAD,WEST BENGAL,733134</span></a>
                        <a href="mailto:sahajjibon31@gmail.com" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="anusilanservices@gmail.com"><img style="height: auto;" src="images/message.png" alt=""> <span>sahajjibon31@gmail.com</span></a>
                    </div>
                </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
       <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="{{URL::TO('/')}}">Home </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::TO('about-us')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a href="{{URL::TO('services')}}">Services</a>
            </li>
            <li class="nav-item">
                <a href="{{URL::TO('contact-us')}}">Contact</a>
              </li>
              <li class="nav-item">
                <a href="{{URL::TO('admin/login')}}">Admin</a>
              </li>
              <li class="nav-item">
                <a href="#">BranchT</a>
              </li>
              <li class="nav-item">
                <a href="#">BranchB</a>
              </li>
          </ul>
        </div>
        <div class="navbar-text righgth_info">
            <a href="tel:8370809067"> <img src="{{URL::TO('public/assets/images/call.svg')}}" alt=""> +91 8370809067</a>
            </div>
      </div>
      </nav>
</header>