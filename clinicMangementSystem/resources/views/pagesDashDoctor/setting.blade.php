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
            <form class="setting-site" method="POST" action="{{route('dashDocotor.create')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                <!-- Start Opening clinic -->
                <h4 class="title-setting">Opening clinic : </h4>
                <div class="col-md-6">
                    <label >Start Day </label>
                    <input type="text" class="form-control" name="startday"  value="{{$setting->startday}}">
                </div>
                <div class="col-md-6">
                    <label >End Day </label>
                    <input type="text" class="form-control" name="endday" value="{{$setting->endday}}">
                </div>
                <div class="col-md-6">
                        <label >Start Morning Hour  </label>
                        <input type="text" class="form-control" name="StartMorningHour" value="{{$setting->StartMorningHour}}">
                </div>
                <div class="col-md-6">
                        <label >End Morning Hour </label>
                        <input type="text" class="form-control" name="EndMorningHour" value="{{$setting->EndMorningHour}}">
                </div>
                <div class="col-md-6">
                        <label >Start Evening Hour </label>
                        <input type="text" class="form-control" name="StartEveningHour" value="{{$setting->StartEveningHour}}">
                </div>
                <div class="col-md-6">
                        <label >End Evening Hour </label>
                        <input type="text" class="form-control" name="EndEveningHour" value="{{$setting->EndEveningHour}}">
                </div>
                <!-- End Opening clinic -->    
                <div class="clearfix"></div>
                <!-- Start Doctor Information -->
                <hr/>
                <h4 class="title-setting" >Doctor Information : </h4>
                <div class="col-md-4">
                    <label >Name </label>
                    <input type="text" class="form-control" name="name" value="{{$setting->name}}">
                </div>
                <div class="col-md-4">
                    <label >Experinces </label>
                    <input type="text" class="form-control" name="Experinces" value="{{$setting->Experinces}}">
                </div>
                <div class="col-md-4">
                    <label >Phone </label>
                    <input type="text" class="form-control" name="Phone" value="{{$setting->Phone}}">
                </div>
                <div class="col-md-4">
                        <label >Adress </label>
                        <input type="text" class="form-control" name="Adress" value="{{$setting->Adress}}">
                </div>
                <div class="col-md-4">
                        <label >Fax </label>
                        <input type="text" class="form-control" name="Fax" value="{{$setting->Fax}}">
                </div>
                <div class="col-md-4">
                        <label >Email </label>
                        <input type="text" class="form-control" name="Email" value="{{$setting->Email}}">
                </div>
                <div class="col-md-4">
                        <label >Your Image</label>
                        <input type="file" name="srcProfileImage">     
                </div>
                <div class="col-md-12">
                        <label >More Information</label>
                        <textarea class="form-control" name="MoreInformation" rows="5" >{{$setting->MoreInformation}}</textarea>
                </div>
                <!-- End Doctor Information -->  
                <div class="clearfix"></div>  
                <!-- Start Services Clinic -->
                <hr/>
                <h4 class="title-setting" >Services Clinic : </h4>
                
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService1" value="{{$setting->titleService1}}">
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService1"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService2" value="{{$setting->titleService2}}">
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService2"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService3" value="{{$setting->titleService3}} ">
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService3"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService4" value="{{$setting->titleService4}} " >
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService4"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService5" value="{{$setting->titleService5}}" >
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService5"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService6" value="{{$setting->titleService6}}" >
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService6"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService7" value="{{$setting->titleService7}} " >
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService7"> 
                </div>
                <div class="clearfix"></div> 
                <div class="col-md-6">
                        <label >Name Service </label>
                        <input type="text" class="form-control" name="titleService8" value="{{$setting->titleService8}}">
                </div>
                <div class="col-md-6">
                        <label >Image</label>
                        <input type="file" name="srcService8"> 
                </div>
                
                <!-- End  Services Clinic -->
                <div class="clearfix"></div>
                <!-- Start Notes on taking an appointment -->
                <hr />
                <h4 class="title-setting" >Notes on taking an appointment : </h4>
                <div class="col-md-12">
                        <label >Note 1 </label>
                        <textarea class="form-control" name="note1" rows="3" >{{$setting->note1}} 
                        </textarea>
                </div>
                <div class="col-md-12">
                        <label >Note 2 </label>
                        <textarea class="form-control" name="note2" rows="3" >{{$setting->note2}} 
                        </textarea>
                </div>
                <div class="col-md-12">
                        <label >Note 3 </label>
                        <textarea class="form-control" name="note3" rows="3" >{{$setting->note3}} 
                        </textarea>
                </div>
                <!-- End Notes on taking an appointment -->
                <div class="clearfix"></div>
                <!-- Start Location -->
                <hr />
                <h4 class="title-setting" >Location : </h4>
                <div class="col-md-12">
                    <label >Your Location [Upload Photo Map  Location ] </label>
                    <input type="file" form-control" name="location"/>
                </div>
                <!-- End Location -->
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

