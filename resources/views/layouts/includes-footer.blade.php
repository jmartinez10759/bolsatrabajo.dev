	<!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
	<!-- Custom Js -->
	<script src="{{ asset('js/js/custom.js') }}"></script>
  <!-- script master vue -->
  <script type="text/javascript" src="{{asset('js/master_vue.js')}}"></script>
  <!-- activar class de login o registro -->
  <script type="text/javascript" >

      $('.signin').click(function(){
          var tab = $(this).attr('tabs');
          if( tab == "register"){
            $('#registrate').attr('class','active');
            $('#register').attr('class','tab-pane fade active in');
            $('#login').attr('class','tab-pane fade');
            $('#start_sesion').attr('class','');
          }
          if( tab == "start"){
            $('#registrate').attr('class','');
            $('#register').attr('class','tab-pane fade');
            $('#login').attr('class','tab-pane fade active in');
            $('#start_sesion').attr('class','active');
          }

      });

      // $('#start_sesion').removeAttr('class');
      // $('#start_sesion').removeAttr('class');
  </script>
  <!-- script desarrollador -->
  @stack('scripts')
