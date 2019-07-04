<!-- Start Header -->
@include('pagesDashReception.includes.header')

<!-- End Header -->

<!-- Start Navbar -->
@include('pagesDashReception.includes.navbar')

<!-- End Navbar -->


<!-- Start Content -->
    <!-- Start Setting -->
    <div class="container">
           
        <div class="main-content">
            <h3 class="text-center">
                <span class="glyphicon glyphicon-user text-primary"></span> 
                Edit  Patient [{{$patient->firstName}} , {{$patient->lastName}}] 
            </h3>
            @if (session()->has('adduser'))
                <div class="alert alert-success">
                    {{session()->get('adduser')}}
                </div>
            @endif
            <!-- Show Error Add Patient -->
            @if(count($errors) > 0 )
            
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li >  {{ $error }}</li>
                    </div>
                    @endforeach
                </ul>
            
            @endif

            <form action="{{route('patients.update',['id'=>$patient->id])}}" method="POST">
                {{ csrf_field() }}
                <h4 class="text-primary">Personal Information</h4>
                <hr/>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>first Name</label>
                    <input type="text" name="firstName" placeholder="Like : Bilal" class="form-control" value="{{$patient->firstName}}" />
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastName" placeholder="Like : Saidi" class="form-control" value="{{$patient->lastName}}" />
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>father Name</label>
                            <input type="text" name="fatherName" placeholder="Like : Saddek" class="form-control" value="{{$patient->fatherName}}" />
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>birth Date</label>
                        <input type="date" name="birthDate"  class="form-control" value="{{$patient->birthDate}}"/>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Age </label>
                            <input type="number" name="age"  class="form-control" placeholder="like : 22" value="{{$patient->age}}"/>
                        </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="margin-bottom:10px;display:block;">Gender</label>
                        <input type="radio" name="gender" id="gender-male" value="male" {{$patient->gender == 'male' ? 'checked' : ''}} > 
                        <label for="gender-male">Male</label>
                        <input type="radio" name="gender" id="gebder-female" value="female" {{$patient->gender == 'female' ? 'checked' : ''}}>
                        <label for="gender-female" >female </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Social Id </label>
                        <input type="text" name="socialId" placeholder="socialId"  class="form-control" value="{{$patient->socialId}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type Social Id </label>
                        <select name="idType" class="form-control">
                            <option value=""  >Select Type </option>
                            <option value="Passpoet"  {{$patient->idType == 'Passpoet' ? 'selected' : ''}}>Passport</option>
                            <option value="Driver License"  {{$patient->idType == 'Driver License' ? 'selected' : ''}} >Driver License</option>
                            <option value="National Id Card"  {{$patient->idType == 'National Id Card' ? 'selected' : ''}} >National Id Card</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <h4 class="text-primary">Contact</h4>
                <hr />
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="like:  bilalBatna05@gmail.com" class="form-control" value="{{$patient->email}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label>facebookAcount</label>
                            <input type="text" name="facebookAcount" placeholder="like: https://www.facebook.com/bilal.saidi.311" class="form-control"  value="{{$patient->facebookAcount}}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label>phone</label>
                            <input type="text" name="phone"  class="form-control" placeholder="like : 0668815130"  value="{{$patient->phone}}"/>
                    </div>
                </div>
                <div class="clearfix"></div>

                <h4 class="text-primary">Location</h4>
                <hr/>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea rows="3" cols="4" name="adress" class="form-control" placeholder="Like : Djezzar , Batna ">{{$patient->adress}}</textarea>
                    </div>
                </div>
                <div class="clearfix"></div>
                <h4 class="text-primary">Confirm </h4>
                <hr/>
                <button type="submit" class="btn btn-primary">Save change  Patient</button>
            </form>

        </div>
    </div>
<!-- End Content -->

<!-- Start Footer -->

  @include('pagesDashReception.includes.footer')


<!-- End Footer --> 