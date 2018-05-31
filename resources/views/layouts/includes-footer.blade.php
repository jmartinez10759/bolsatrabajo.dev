<!-- jQuery -->
<script src="{{asset('templates/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('templates/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

	<!-- Custom Js -->
	<script src="{{ asset('js/js/custom.js') }}"></script>
  <!-- script master vue -->
  <script type="text/javascript" src="{{asset('js/master_vue.js')}}"></script>
  <!-- activar class de login o registro -->
  <script type="text/javascript" >

      jQuery('.signin').click(function(){
          var tab = $(this).attr('tabs');
          if( tab == "register"){
            jQuery('#registrate').attr('class','active');
            jQuery('#register').attr('class','tab-pane fade active in');
            jQuery('#login').attr('class','tab-pane fade');
            jQuery('#start_sesion').attr('class','');
          }
          if( tab == "start"){
						jQuery('#registrate').attr('class','');
            jQuery('#register').attr('class','tab-pane fade');
            jQuery('#login').attr('class','tab-pane fade active in');
            jQuery('#start_sesion').attr('class','active');
          }

      });

      // $('#start_sesion').removeAttr('class');
      // $('#start_sesion').removeAttr('class');
  </script>
  <!-- script desarrollador -->
  @stack('scripts')
