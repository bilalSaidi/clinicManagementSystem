@include('pagesDashDoctor.includes.topPage')
    
    
    <!-- Start Navbar -->
    @include('pagesDashDoctor.includes.navbar')
    <!-- End Navbar -->


<!-- Start Content -->
<div class="container">
        @if (session()->has('AddNote'))
        <div class="alert alert-success">
            {{session()->get('AddNote')}}
        </div>
        @endif
    <h3 class="text-center">Add New Note </h3>
    <!-- Start  Form Add Note -->
    <form  action="{{route('patientNoteAdd')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{$patient->id}}"  name="idPatient"/>
        <div class="form-group">
            <textarea  class="form-control" id="summernote"  name="Note" style="height:400px;"></textarea>

        </div>
        <div class="form-group">
            
            <button type="submit" class="btn btn-success">Add Note </button>
        </div>
    </form>
    <!-- End Form Add Note -->
    <hr  style="background: #337ab7; display: block; padding: 1px;"/>
    @if (session()->has('deleteNote'))
        <div class="alert alert-danger">
            {{session()->get('deleteNote')}}
        </div>
    @endif
    <!-- Start Table Show Old Note And Option -->
    <h3 class="text-center">Show All Old Note </h3>
    <table class="table table-bordered display responsive nowrap text-center" style="width:100%; ">
            <thead>
            <th>Id Note</th>
            <th>Note</th>
            <th>Date Create Note</th>
            <th>Options</th>
            </thead>
            <tbody>
                @foreach ($notesPatient as $notePatient)
                    <tr>
                        <td>{{ $notePatient->id }}</td>
                        <td>{!! $notePatient->Note !!}</td>
                        <td>{{ $notePatient->created_at }}</td>
                        <td>
                            <a href="{{route('patientpdf',['id'=>$notePatient->id])}}" class="btn btn-primary option" data-toggle="tooltip" data-placement="top" title="Generate Pdf">
                                <i class="fa fa-file-pdf-o " aria-hidden="true"></i>
                            </a>
                            <a href="{{route('patientNoteedit',['id'=>$notePatient->id])}}" class="btn btn-info option " data-toggle="tooltip" data-placement="top" title="Update Note">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </a>
                            <a href="{{route('patientNotedestroy',['id'=>$notePatient->id])}}" class="btn btn-danger option confirm " data-toggle="tooltip" data-placement="top" title="Delete Note">
                                <i class="fa fa-trash-o " aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <!-- End  Table Show Old Note And Option -->
</div>
<!-- End Content -->

<!-- Start Footer -->
@include('pagesDashDoctor.includes.footer')
<!-- End Footer -->