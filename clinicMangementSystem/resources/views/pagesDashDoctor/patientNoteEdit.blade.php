@include('pagesDashDoctor.includes.topPage')
    
    
    <!-- Start Navbar -->
    @include('pagesDashDoctor.includes.navbar')
    <!-- End Navbar -->


<!-- Start Content -->
<div class="container">
        @if (session()->has('UpdateNote'))
        <div class="alert alert-success">
            {{session()->get('UpdateNote')}}
        </div>
        @endif
    <h3 class="text-center">Edit  Note </h3>
    <!-- Start  Form Add Note -->
    <form  action="{{route('patientNoteUpdate',['id'=>$note->id])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
        <textarea  class="form-control" id="summernote"  name="Note" style="height:400px;">{{$note->Note}}</textarea>

        </div>
        <div class="form-group">
            
            <button type="submit" class="btn btn-success">Update  </button>
            <a href="{{route('patientNote',['id'=>$note->idPatient])}}" class="btn btn-primary">Show Notes Pateint</a>
        </div>
    </form>
    <!-- End Form Add Note -->

</div>
<!-- End Content -->

<!-- Start Footer -->
@include('pagesDashDoctor.includes.footer')
<!-- End Footer -->