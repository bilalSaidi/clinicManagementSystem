@include('pagesDashDoctor.includes.topPage')
    
    
    <!-- Start Navbar -->
    @include('pagesDashDoctor.includes.navbar')
    <!-- End Navbar -->



  <!-- Start Content -->
    <!-- Start Setting -->
    <div class="container-fluid">
           
       
                
        <h1 class="text-center listPatients"> <i class="fa fa-users text-primary " aria-hidden="true"></i> List patients  </h1>
        <table class="table table-bordered display responsive nowrap text-center" style="width:100%;">
            <thead>
            <th>Id Patient</th>
            <th>Full Name </th>
            <th>Social Id </th>
            <th>Type Social Id </th>
            <th>Birth Date </th>
            <th>Phone </th>
            <th>Options</th>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{$patient->id}}</td>
                        <td>{{$patient->firstName}} {{$patient->lastName}}</td>
                        <td>{{$patient->socialId}}</td>
                        <td>{{$patient->idType}}</td>
                        <td>{{$patient->birthDate}}</td>
                        <td>0{{$patient->phone}}</td>
                        <td>
                            <a href="{{route('patientNote',['id'=>$patient->id])}}" class="btn btn-success option" data-toggle="tooltip" data-placement="top" title="Note & Patient">
                              <span class="glyphicon glyphicon-user "></span> 
                            </a>
                            <a href="{{route('ClinicAppointment')}}" class="btn btn-info option " data-toggle="tooltip" data-placement="top" title="Take Future  Appointment">
                                <span class="glyphicon glyphicon-calendar "></span> 
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    
</div>
<!-- End Content -->

<!-- Start Footer -->
@include('pagesDashDoctor.includes.footer')
<!-- End Footer -->