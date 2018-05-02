  <!-- Sign Up Window Code -->
    <div class="modal fade vue-candidate" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body ">
                    <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Ingresar</a></li>
                        <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Registrarse</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">
                            <img src="{{ asset('images/img/logo.png') }}" class="img-responsive" alt="" />
                                @include('auth.auth')
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="register" style="overflow-y:scroll; height:530px;">
                        	<img src="{{ asset('images/img/logo.png') }}" class="img-responsive" alt="" />
                            @include('auth.register')
                        </div>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>   
    <!-- End Sign Up Window -->