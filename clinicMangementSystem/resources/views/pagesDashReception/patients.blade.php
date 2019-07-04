<!-- Start Header -->
@include('pagesDashReception.includes.header')

<!-- End Header -->

<!-- Start Navbar -->
@include('pagesDashReception.includes.navbar')

<!-- End Navbar -->


<!-- Start Content -->
    <!-- Start Setting -->
    <div class="container-fluid">
           
       
                
            <h1 class="text-center listPatients"> <i class="fa fa-users text-primary " aria-hidden="true"></i> List patients  </h1>
            <a  href="{{route('patients.create')}}" class="btn btn-info addnewPatient">Add New Patient </a>
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
                                <a href="{{route('patients.profile',['id'=>$patient->id])}}" class="btn btn-primary option" data-toggle="tooltip" data-placement="top" title="Profile"><i class="fa fa-file" aria-hidden="true"></i></a>
                                <a href="{{route('patients.edit',['id'=>$patient->id])}}" class="btn btn-success option" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{route('patients.destroy',['id'=>$patient->id])}}" class="btn btn-danger option confirm" data-toggle="tooltip" data-placement="top" title="Delete User "><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

   

        
    </div>
<!-- End Content -->

<!-- Start Footer -->

  @include('pagesDashReception.includes.footer')


<!-- End Footer --> 