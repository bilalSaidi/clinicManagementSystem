<!DOCTYPE html>
<html>
        <head>
        <title> Fullcalandar </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}} />
        <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
        
        <script src={{asset("js/moment.min.js")}}></script>
        <link   href="{{asset('css/font-awesome.min.css')}}"  rel="stylesheet">
        <link rel="stylesheet" href={{asset("css/fullcalendar.min.css")}} />
        <script src={{asset("js/fullcalendar.min.js")}}></script>
        <link   href="{{asset('css/ClinicAppintment.css')}}"     rel="stylesheet">
        
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <link   href="{{asset('css/bootstrap-datetimepicker.min.css')}}"     rel="stylesheet">
        <script   src="{{asset('js/bootstrap-datetimepicker.min.js')}}" ></script>
        <script   src="{{asset('js/locales/bootstrap-datetimepicker.fr.js')}}" ></script>

        <!-- fonts  -->
         <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
       
        
        
        <script>
        
                $(document).ready(function() {
                        var calendar = $('#calendar').fullCalendar({
                                editable:true,
                                
                        header:{
                                left:'month,agendaWeek,agendaDay, basicWeek,basicDay',
                                center:'title',
                                right:'prev,next today'
                        },
                        dayClick:function(date,jsEvent,view){
                                $('#ModalNewAppointment').modal('show');
                                $('#date').val(date.format());
                                
                                
                        },

                        events : 'http://127.0.0.1:8000/ClinicAppointment/resaultAll',

                        eventClick:function(calEvent,jsEvent,view){
                               
                                $('#myModal').modal('show');
                                $("#idAppointment").val(calEvent.id);
                                $("#fullName").val(calEvent.firstName + ' ' + calEvent.lastName );
                                $("#phone").val('0'+calEvent.phone);
                                $("#idPatient").val(calEvent.patient_id);
                                calEvent.status == 0 ? $("#statusAbsent").attr("checked", "checked") :  $("#statusPresent").attr("checked", "checked");
                                
                                var start = $.fullCalendar.formatDate(calEvent.start, "HH:mm");
                                $("#startHourConfig").val(start);
                                var end = $.fullCalendar.formatDate(calEvent.end, "HH:mm");
                                $("#endHourConfig").val(end);
                                $("#color").val(calEvent.color);
                                $("#TextColor").val(calEvent.TextColor);
                                $("#dateUpdate").val($.fullCalendar.formatDate(calEvent.start, "Y-MM-DD"));
                                $("#FinalstartHourConfig").val($.fullCalendar.formatDate(calEvent.start, "Y-MM-DD HH:mm:ss"));
                                $("#FinalendHourConfig").val($.fullCalendar.formatDate(calEvent.end, "Y-MM-DD HH:mm:ss"));
                                
                                

                        },
                        editable:true,
                        eventResize: function(event) {
                                var id = event.id;
                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                
                                $.ajaxSetup({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                });
                                $.ajax({
                                        
                                        url : '{{route("ClinicAppointment.resize")}}',
                                        type :'POST',
                                        data:{id:id,start:start,end:end},
                                        success:function(){
                                                calendar.fullCalendar('refetchEvents');
                                                alert("updates Successfully");
                                        }

                                });
                               
                                

                        },
                        eventDrop:function(event){

                                var id = event.id;
                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                
                                $.ajaxSetup({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                });
                                $.ajax({
                                        
                                        url : '{{route("ClinicAppointment.resize")}}',
                                        type :'POST',
                                        data:{id:id,start:start,end:end},
                                        success:function(){
                                                calendar.fullCalendar('refetchEvents');
                                                alert("updates Successfully");
                                        }

                                });
                                
                                
                        },
                               
                        
                        
                        });
                });
                
                </script> 
              
        </head>
        <body>
        <!-- Start Navbar -->

        @if ($user == 1)
                @include('pagesDashDoctor.includes.navbar')
        @else
                @include('pagesDashReception.includes.navbar')
        @endif
        
        <!-- End Navbar -->
        
        <div class="container-fluid">

                @if (session()->has('successAppointment'))
                        <div class="alert alert-success">
                            {{session()->get('successAppointment')}}
                        </div>
                @endif
                @if (session()->has('successUpdateAppointment'))
                        <div class="alert alert-success">
                            {{session()->get('successUpdateAppointment')}}
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

                <div class="main-content">
                        <div id="calendar"></div>
                </div>

        </div>


        <!-- Start Modal  When Event Exist -->
       
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" >Configuration </h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('ClinicAppointment.update')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="idAppointment" />
                                <div class="col-md-6">
                                                <label>Patient Name </label>
                                                <input id="fullName" value="" disabled class="form-control"  />
                                </div>
                                <div class="clreafix"></div>
                                <div class="col-md-4">
                                        <label>Patient Id </label>
                                        <input id="idPatient" value="" disabled class="form-control" />
                                </div>
                                
                                <div class="col-md-4">
                                        <label>Phone </label>
                                        <input id="phone" value="" disabled class="form-control" />
                                </div>
                                <div class="col-md-4">
                                        
                                        <label style="margin-bottom:11px;margin-top:2px;display:block;">Status Appointment</label>
                                                <input type="radio" name="status" id="statusPresent" value="1" > 
                                                <label for="gender-male">Present</label>
                                                <input type="radio" name="status" id="statusAbsent" value="0" >
                                                <label for="gender-female" >absent </label>
                                
                                </div>
                                <div class="clearfix"></div>
                                
                                <div class="col-md-6">
                                                <label for="dtp_input3" >Start Hour  Appointment </label>
                                                <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                                        <input id="startHourConfig" name="startHourConfig" class="form-control" size="16" type="text" value="" readonly >
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input3" value="" /><br/>
                                </div>
                                <!-- Input Current Date Update -->
                                <input type="hidden" id="dateUpdate" />
                                <!-- End Input Current Date Update -->
                                <!-- Input Final Date Update [Start Hour]-->
                                <input type="hidden" id="FinalstartHourConfig" name="start" > 
                                <!-- Input Final Date  Update [Start  Hour]-->
                                <div class="col-md-6">
                                                <label for="dtp_input3" >End Hour  Appointment </label>
                                                <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                                        <input id="endHourConfig" name="endHourConfig" class="form-control" size="16" type="text" value="" readonly >
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input3" value="" /><br/>
                                </div>
                                <!-- Input Final Date Update [End Hour]-->
                                <input type="hidden" id="FinalendHourConfig" name="end" > 
                                <!-- Input Final Date  Update [End Hour]-->
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                        <label>Color </label>
                                        <input id="color" value="" type="color" name="color" />
                                </div>
                                <div class="col-md-6">
                                        <label>TextColor</label>
                                        <input id="TextColor" value="" type="color" name="TextColor" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                        <label>Update Appointment</label>
                                        <button type="submit" class="btn btn-success form-control" >Update</button>
                                </div>
                                <div class="clearfix"></div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                    </div>
                  </div>
                </div>
              </div>
        <!-- End Modal When Event Exist  -->

        <!-- Start Modal When Event Not Exist -->
        <div class="modal fade" id="ModalNewAppointment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="#">Add Appointment</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Start Our Information -->
                        
                        <form action="{{route('ClinicAppointment.create')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="container">
                                        <div class="col-md-6">
                                                <label>Patient Id   </label>
                                                
                                                <select name="patient_id" class="form-control">
                                                        @foreach ($patients as $patient)
                                                                <option value="{{$patient->id}}">{{$patient->id}}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- Start Select Current Date -->
                                                <input name="date" id="date" class="form-control" type="hidden">
                                        <!-- End Select Current Date -->
                                        <div class="col-md-6">
                                                <label for="dtp_input3" >Start Hour  Appointment </label>
                                                <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                                        <input id="startHour" class="form-control" size="16" type="text" value="" readonly >
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input3" value="" /><br/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                                <label>Final Start Date </label>
                                                <input name="start" id="start" class="form-control"  type="text">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                                <label for="dtp_input3" >End  Hour Appointment </label>
                                                <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                                        <input class="form-control" size="16" type="text" value="" readonly id="endHour">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input3" value="" /><br/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                                <label>Final End Date </label>
                                                <input name="end" id="end" class="form-control"  type="text">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                                <label>Color</label>
                                                <input type="color" name="color" class="form-control">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                                        <label>Text Color</label>
                                                        <input type="color" name="TextColor" class="form-control">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                                <label> Confirm Appointment</label>
                                                <button type="submit" class="btn btn-success form-control" >add</button>
                                        </div>
                                </div>
                        </form>
                        <!-- End Our  Inform ation -->
                    </div>
                    <div class="modal-footer">
                      
                      <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                    </div>
                  </div>
                </div>
              </div>
        <!-- End Modal When Event Not Exist -->

                <!-- Script For Date Time -->
                <script type="text/javascript">
                        $('.form_time').datetimepicker({
                                language:  'fr',
                                weekStart: 0,
                                todayBtn:  0,
                                autoclose: 1,
                                todayHighlight: 0,
                                startView: 1,
                                minView: 0,
                                maxView: 1,
                                forceParse: 0
                        });
                        $('#startHour').on('change',function(){
                                $('#start').val($('#date').val() + ' ' + $("#startHour").val() + ':00' );
                        });
                        $('#endHour').on('change',function(){
                                $('#end').val($('#date').val() + ' ' + $("#endHour").val() + ':00' );
                        });

                        $('#startHourConfig').on('change',function(){
                                $('#FinalstartHourConfig').val($('#dateUpdate').val() + ' ' + $("#startHourConfig").val() + ':00' );
                        });

                        $('#endHourConfig').on('change',function(){
                                $('#FinalendHourConfig').val($('#dateUpdate').val() + ' ' + $("#endHourConfig").val() + ':00' );
                        });
                        
                </script>
                <!-- End Script  Date Time -->

        </body>
</html>
