@include('pagesDashDoctor.includes.topPage')
    <!-- Start Navbar -->
    @include('pagesDashDoctor.includes.navbar')
    <!-- End Navbar -->

    <!-- Start Setting -->
    <div class="container">
        <div class="main-content">
                <!-- Show Error Uploads -->
                @if(count($errors) > 0 )
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>  {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <p style="color:red">If you do not want to change the password, leave the field blank</p>
            <form class="setting-site" method="POST" action="{{route('editProfiles.update')}}" >
                    {{ csrf_field()}}
                <!-- Start doctor profile -->
                <h4 class="title-setting">Docotr profile </h4>
                <div class="col-md-6">
                    <label >Email </label>
                <input type="email" class="form-control" name="emailDoctor"  value="{{$UserDoctor->email}}">
                </div>
                <div class="col-md-6">
                    <label >New Password  </label>
                    <input type="password" class="form-control" name="newpasswordDoctor" >
                </div>
                <!-- End Doctor Profile -->
                <div class="clearfix"></div>
                <!-- Start Reception Profile -->
                <hr />
                <h4 class="title-setting">Reception profile </h4>
                <div class="col-md-6">
                    <label >Email </label>
                <input type="email" class="form-control" name="EmailReception" value="{{$UserReception->email}}" >
                </div>
                <div class="col-md-6">
                    <label >New Password  </label>
                    <input type="password" class="form-control" name="newpasswordReception" >
                </div>
                <!-- End Reception Profile -->
                <div class="clearfix"></div>
                <!-- Start Save Information -->
                <hr />
                <h4 class="title-setting" >Save Information : </h4>
                <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Save </button>
                </div>
                <!-- End Save Information -->
            </form>
        </div>
    </div>
    <!-- End Setting -->


<!-- Start Footer -->
@include('pagesDashDoctor.includes.footer')
<!-- End Footer -->
