<!-- Start Header -->
@include('pagesDashReception.includes.header')

<!-- End Header -->

<!-- Start Navbar -->
@include('pagesDashReception.includes.navbar')

<!-- End Navbar -->


<!-- Start Content -->
    <!-- Start Setting -->
    <div class="container-fluid">
           
       
                
            <h1 class="text-center listPatients"> <span class="glyphicon glyphicon-time text-primary"></span> Waiting List  </h1>
            <table class="table table-bordered display responsive nowrap text-center" style="width:100%;">
                <thead>
                <th>Full Name </th>
                <th>Phone </th>
                <th>Id Patient</th>
                <th>Options</th>
                </thead>
                <tbody>
                    @foreach ($waitingList as $list)
                        <tr>
                            <td>{{$list->firstName}} {{$list->LastName}}</td>
                            <td>{{$list->Phone}}</td>
                            <td>{{$list->idPatient}}</td>
                            <td>
                                <a href="{{route('patients.profile',['id'=>$list->idPatient])}}" class="btn btn-primary option" data-toggle="tooltip" data-placement="top" title="Profile"><i class="fa fa-file" aria-hidden="true"></i></a>
                                <a href="{{route('waitingList.destroy',['id'=>$list->id])}}" class="btn btn-danger option confirmDeleteAppointment" data-toggle="tooltip" data-placement="top" title="Delete Appointment "><i class="fa fa-trash" aria-hidden="true"></i></a>
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