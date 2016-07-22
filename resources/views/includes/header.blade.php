<header>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 fullblock"><a class="logo" href="{{ url('/index') }}"><img src="images/logo.png" alt="" title="PrincipleBrothers"></a></div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 pull-right fullblock">
          <div class="loginInfo">
          @if(Auth::check()) 
          <a class="signin" href="{{ url('/myaccount') }}">account</a> 
          <a class="log" href="{{ url('/logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a> 
          @else
          <a class="signin" href="{{ url('/register') }}">Sign up</a> 
          <a class="log" href="{{ url('/login') }}"><i class="fa fa-unlock-alt"></i> Login</a> 
          @endif
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <nav class="navbar navbar-default"> 
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="standard-content.html" title="About">About</a></li>
                <li><a href="find-a-doctor.html" title="Find a doctor">Find a doctor</a></li>
                 <li><a href="contact-us.html" title="Contact">Contact</a></li>
               <li class="last"><a href="membership-plan.html" title="pricing">pricing</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse --> 
            
          </nav>
        </div>
      </div>
    </div>
  </header>