<!-- Title Header Start -->
      @foreach($datos as $data) 
      <section class="inner-header-title" style="background-image:url(https://pixabay.com/get/ea36b70c2ff31c22d2524518a33219c8b66ae3d01bb212499cf7c679/home-office-336377_1280.jpg);">
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
                <h4>{{ $data->title }}</h4>
                <span class="designation">Empresa | Área {{ $data->departament }}</span>
                <p>{{ $data->description_short }}</p>
                <ul>
                  <li><i class="fa fa-briefcase"></i><span>Full time</span></li>
                  <li><i class="fa fa-flask"></i><span>3 años de Experiencia</span></li>
                </ul>
              </div>
            </div>
            
            <div class="col-md-4 col-sm-4">
              <div class="get-touch">
                <h4>Estar en contacto</h4>
                <ul>
                  <li><i class="fa fa-map-marker"></i><span>Menlo Park, CA</span></li>
                  <li><i class="fa fa-envelope"></i><span>{{ $data->email }}</span></li>
                  <li><i class="fa fa-globe"></i><span>microft.com</span></li>
                  <li><i class="fa fa-phone"></i><span>0 123 456 7859</span></li>
                  <li><i class="fa fa-money"></i><span>${{ $data->salary_min}} -${{ $data->salary_max}}/Mensual</span></li>
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
                  <a  href="javascript:void(0)"  data-toggle="modal" data-target="#apply-job" class="footer-btn grn-btn" title="">Aplicarme</a>
                  <a href="#" class="footer-btn blu-btn" title="">Guardar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Job Detail End -->

      <!-- Job full detail Start -->
      <section class="full-detail-description full-detail">
        <div class="container">
          <div class="row row-bottom">
            <h2 class="detail-title">Responsabilidades Laborales</h2>
            <p>{{ $data->requirements}}</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          
          <div class="row row-bottom">
            <h2 class="detail-title">Habilidades Requeridas</h2>
            <p>{{ $data->other_details}}</p>
            <ul class="detail-list">
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
            </ul>
          </div>
          
          <div class="row row-bottom">
            <h2 class="detail-title">Calificación</h2>
            <p>{{ $data->description_short }}</p>
            <ul class="detail-list">
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
            </ul>
          </div>
          
        </div>
      </section>
      <!-- Job full detail End -->
      

      <div class="modal fade" id="apply-job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="apply-job-box">
                <img src="img/com-1.jpg" class="img-responsive" alt="">
                <h4>{{ $data->title}}</h4>
                <p>Área {{ $data->departament }}</p>
              </div>
              <div class="apply-job-form">
                <form class="form-inline" method="post">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="text"  name="name" class="form-control" placeholder="Nombre" required="">
                      <input type="email"  name="email" class="form-control" placeholder="Correo" required="">
                      <textarea class="form-control" placeholder="Mensaje (opcional)"></textarea>
                      <div class="fileUpload">
                        <span>Subir CV</span>
                        <input type="file" class="upload" />
                      </div>
                      <div class="center">
                      <button type="submit" id="subscribe" class="submit-btn"> Aplicarme </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>   
       
       @endforeach