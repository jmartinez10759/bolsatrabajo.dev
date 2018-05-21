
<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

                <div class="container">            
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <a href="{{ url('/') }}" class="navbar-brand" href="index.html">
                            <img src="{{ asset('images/img/logo.png') }}" class="logo logo-display" alt="">
                            <img src="{{ asset('images/img/logo-white.png') }}" class="logo logo-scrolled" alt="">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class="">
                                <!-- <input type="text" class="form-control" placeholder="Find Freelancer"> -->
                                <!-- <a href="{{route('details')}}">Bienvenid@ {{ Session::get('name') }} {{ Session::get('first_surname') }}</a> -->
                            </li>
                            <!-- <li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Brows</a>
                                <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Main Pages</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="index.html">Home Page 1</a></li>
                                                        <li><a href="index-2.html">Home Page 2</a></li>
                                                        <li><a href="index-3.html">Home Page 3</a></li>
                                                        <li><a href="index-4.html">Home Page 4</a></li>
                                                        <li><a href="index-5.html">Home Page 5</a></li>
                                                        <li><a href="signin-signup.html">Ingresar / Registrarse</a></li>
                                                        <li><a href="search-job.html">Search Job</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">For Candidate</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                                        <li><a href="browse-company.html">Browse Companies</a></li>
                                                        <li><a href="create-resume.html">Create Resume</a></li>
                                                        <li><a href="resume-detail.html">Resume Detail</a></li>
                                                        <li><a href="manage-jobs.html">Manage Jobs</a></li>
                                                        <li><a href="job-detail.html">Job Detail</a></li>
                                                        <li><a href="browse-jobs-grid.html">Job In Grid</a></li>
                                                        <li><a href="candidate-profile.html">Candidate Profile</a></li>                                                         
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">For Employee</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="create-job.html">Create Job</a></li>
                                                        <li><a href="create-company.html">Create Company</a></li>
                                                        <li><a href="manage-company.html">Manage Company</a></li>
                                                        <li><a href="manage-candidate.html">Manage Candidate</a></li>
                                                        <li><a href="manage-employee.html">Manage Employee</a></li>
                                                        <li><a href="browse-resume.html">Browse Resume</a></li>
                                                        <li><a href="search-new.html">New Search Job</a></li>
                                                        <li><a href="employer-profile.html">Employer Profile</a></li>
                                                    </ul>
                                                </div>
                                            </div>    
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Extra Pages</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="manage-resume-2.html">Manage Resume 2</a></li>
                                                        <li><a href="manage-resume.html">Manage Resume</a></li>
                                                        <li><a href="company-detail.html">Company Detail</a></li>
                                                        <li><a href="blog-detail.html">Blog detail</a></li>
                                                        <li><a href="accordion.html">Accordion</a></li>
                                                        <li><a href="tab.html">Tab Style</a></li>
                                                        <li><a href="new-job-detail.html">New Job Detail</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li> -->
                            <li><!-- <a href="">Blog</a> --></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <!-- <li><a href="{{route('details')}}">Bienvenid@ {{ Session::get('name') }}</a></li> -->
                            <li><!-- <a href="pricing.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Paquetes</a> --></li>
                            @if( !Session::has('name') )
                                <li class="left-br">
                                    <a data-toggle="modal" data-target="#signup" class="signin" style="cursor: pointer;">Acceso Usuarios</a>
                                </li>
                            @else
                                <li class="">
                                    <a href="{{route('details')}}">Bienvenid@ {{ Session::get('name') }} {{ Session::get('first_surname') }}</a>
                                </li> 
                                <li class="left-br">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="signin">
                                        Cerrar Sesion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>   
            </nav>
            <!-- End Navigation -->
            <div class="clearfix"></div>




