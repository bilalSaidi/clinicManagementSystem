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
                Profile  Patient [{{$patient->firstName}} , {{$patient->lastName}}] 
                <a href="{{route('patients.destroy',['id'=>$patient->id])}}" class="btn btn-danger  confirm" data-toggle="tooltip" data-placement="top" title="Delete User ">
                    Delete This Patient 
                </a>
            </h3>
            

       
                <h4 class="text-primary">Personal Information</h4>
                
                <hr/>
                <div class="col-md-4">
                        <p><strong>first Name : </strong>{{$patient->firstName}}</p>
                </div>
                <div class="col-md-4">
                        
                    <p><strong>Last Name :</strong> {{$patient->lastName}}</p>
                        
                </div>
                <div class="col-md-4">
                        <p><strong> Father Name :</strong> {{$patient->fatherName}}</p>
                </div>
                <div class="col-md-4">
                        <p><strong> Date : </strong>{{$patient->birthDate}}</p>
                </div>
                <div class="col-md-4">
                        <p><strong> Age : </strong> {{$patient->age}}</p>
                </div>
                
                <div class="col-md-4">
                    <p> <strong> Gender : </strong> {{$patient->gender}}</p>
                </div>
                <div class="col-md-4">
                    <p> <strong> Social Id : </strong> {{$patient->socialId}}</p>
                </div>
                <div class="col-md-4">
                    <p> <strong> Id Type : </strong> {{$patient->idType}}</p>
                </div>
                <div class="clearfix"></div>
                <h4 class="text-primary">Contact</h4>
                <hr />
                @if ( ! empty($patient->email) > 0 )
                    <div class="col-md-4">
                            <p><strong> Email : </strong> {{$patient->email}}</p>
                    </div>
                @endif
                @if ( ! empty($patient->facebookAcount) > 0 )
                    <div class="col-md-4">
                            <p><strong> facebook Acount : </strong> {{$patient->facebookAcount}}</p>
                    </div>
                @endif
                <div class="col-md-4">
                    <p> <strong> phone : </strong> 0{{$patient->phone}}</p>
                </div>
                <div class="clearfix"></div>

                <h4 class="text-primary">Location</h4>
                <hr/>
                <div class="col-md-12">
                       <p> {{$patient->adress}}</p>
                </div>
                <div class="clearfix"></div>
                <h4 class="text-primary">All Appointment</h4>
                <hr/>
                @foreach ($dataAppointment as $data)
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <p> <strong> Start Date : </strong> {{$data->start}} </p>
                        </div>
                        <div class="col-md-4">
                                <p> <strong> End Date : </strong> {{$data->end}} </p>
                        </div>
                        <div class="col-md-4">
                            @if ( $data->status  == 0)
                                <p> <strong> Status : </strong> <span class="text-danger"> Absent </span> </p>
                            @else 
                                <p> <strong> Status : </strong> <span class="text-success"> Present </span> </p>
                            @endif
                                
                        </div>
                    </div>
                @endforeach
                
                

        </div>
    </div>
<!-- End Content -->

<!-- Start Footer -->

  @include('pagesDashReception.includes.footer')


<!-- End Footer --> 