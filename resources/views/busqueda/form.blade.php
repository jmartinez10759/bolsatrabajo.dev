<!-- Title Header Start -->
      <section class="inner-header-title" style="background-image:url(https://pixabay.com/get/ef3cb10f20f01c22d2524518a33219c8b66ae3d01bb2134890f2c07c/tie-690084_1280.jpg);">
        <div class="container">
          <h1>Detalles del trabajo</h1>
        </div>
      </section>
      <div class="clearfix"></div>
      <!-- Title Header End -->
      
      <!-- Job Detail Start -->
      <section class="detail-desc">
        <div class="container white-shadow">
        
          <div class="row">
          
            <div class="detail-pic">
              <img src="http://via.placeholder.com/150x150" class="img" alt="" />
              <a href="#" class="detail-edit" title="edit" ><i class="fa fa-pencil"></i></a>
            </div>
            
            <div class="detail-status">
              <span>Hace 2 días</span>
            </div>
            
          </div>
          
          <div class="row bottom-mrg">
            <div class="col-md-8 col-sm-8">
              <div class="detail-desc-caption">
                <h4>Twitter</h4>
                <span class="designation">Empresa de desarrollo de software</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <ul>
                  <li><i class="fa fa-briefcase"></i><span>Full time</span></li>
                  <li><i class="fa fa-flask"></i><span>3 Year Experience</span></li>
                </ul>
              </div>
            </div>
            
            <div class="col-md-4 col-sm-4">
              <div class="get-touch">
                <h4>Estar en contacto</h4>
                <ul>
                  <li><i class="fa fa-map-marker"></i><span>Menlo Park, CA</span></li>
                  <li><i class="fa fa-envelope"></i><span>danieldax704@gmail.com</span></li>
                  <li><i class="fa fa-globe"></i><span>microft.com</span></li>
                  <li><i class="fa fa-phone"></i><span>0 123 456 7859</span></li>
                  <li><i class="fa fa-money"></i><span>$1000 -$1200/Month</span></li>
                </ul>
              </div>
            </div>
            
          </div>
          
          <div class="row no-padd">
            <div class="detail pannel-footer">
              <div class="col-md-5 col-sm-5">
                <ul class="detail-footer-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
              
              <div class="col-md-7 col-sm-7">
                <div class="detail-pannel-footer-btn pull-right">
                  <a href="#" class="footer-btn grn-btn" title="">Aplicarme</a>
                  <a href="#" class="footer-btn blu-btn" title="">Guardar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Job Detail End -->

        @foreach($datos as $data) 
          {{ $data->name }}<br>
          {{ $data->email }}<br>
          {{ $data->password }}<br>
          {{ $data->curp }}<br>
          {{ $data->nss }}
        @endforeach 
      <!-- Job full detail Start -->
      <section class="full-detail-description full-detail">
        <div class="container">
          <div class="row row-bottom">
            <h2 class="detail-title">Responsabilidades Laborales</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          
          <div class="row row-bottom">
            <h2 class="detail-title">Habilidades Requeridas</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <ul class="detail-list">
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
            </ul>
          </div>
          
          <div class="row row-bottom">
            <h2 class="detail-title">Calificación</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <ul class="detail-list">
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            </ul>
          </div>
          
        </div>
      </section>
      <!-- Job full detail End -->