<header class="main_head">
  <nav class="d-flex justify-content-between align-items-center">
    <div class="logo_toggle d-flex justify-content-between align-items-center">
      <a href="./index.html" class="logo">
        <img src="{{URL::TO('public/assets/images/logo.png')}}" alt="logo" class="logo_img_1" />
      </a>
      <div class="toggle_btn">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="profile_bar">
      <div class="search_box">
        {{-- <form>
          <select class="form-select">
            <option>Select Borrowers</option>
            <option>Select</option>
          </select>
        </form> --}}
      </div>
      <ul class="noti_prifile_box d-flex align-items-center">
         
        <li class="notif">
          <div class="dropdown">
            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <a href="javascript:(void)">
                <figure>
                  <img src="{{URL::TO('public/assets/images/avatar.jpg')}}" alt="">
                </figure>
              </a>
            </span>
            <div class="dropdown-menu p-2">
            <div class="profile">
              <figure>
                <img src="{{URL::TO('public/assets/images/avatar.jpg')}}" alt="">
              </figure>
              <div class="right_info">
                <h5>Admin Nistration</h5>
                <p>anusilanservices@gmail.com</p>
                
              </div>
            </div>
            <ul>
              <li><a href="#url">Edit Profile</a></li>
              <li><a href="#url">Logout</a></li>
            </ul>
              
            </div>
          </div>
        </li> 
      </ul>
    </div>
  </nav>
</header>