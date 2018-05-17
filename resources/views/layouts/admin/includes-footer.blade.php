	
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    	<script type="text/javascript" src="{{asset('js/app_admin.js')}}"></script>
    	
		<script src="{{ asset('plugins/js/jquery.metisMenu.js') }}"></script>
		<!-- Bootstrap Editor Js -->
		<script src="{{ asset('plugins/js/wysihtml5-0.3.0.js') }}"></script>
		<script src="{{ asset('plugins/js/bootstrap-wysihtml5.js') }}"></script>
		<!-- Scrollbar Js -->
		<script src="{{ asset('plugins/js/jquery.slimscroll.js') }}"></script>
		<!-- Dropzone Js -->
		<script src="{{ asset('plugins/js/dropzone.js') }}"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="{{ asset('plugins/js/custom.js') }}"></script>
		<!-- script master vue -->
    	<script type="text/javascript" src="{{asset('js/master_vue.js')}}"></script>
    <!-- script desarrollador -->
    @stack('scripts')