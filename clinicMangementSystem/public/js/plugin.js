$('document').ready(function(){

    var heightHome = $('home');

    $('.home').height($(window).height());

    $(window).resize(function(){

        $('.home').height($(window).height());

    });



    // scroll to element
    $('.navbar-default .thisPage').click( function (e) {
        e.preventDefault();
        $('html,body').animate({
           scrollTop : $('#' + $(this).data('scroll')).offset().top - 80
        },1000);

    });

    $('.takeDate').click( function (e) {
        e.preventDefault();
        window.console.log();
        $('html,body').animate({
           scrollTop : $('#' + $(this).data('scroll')).offset().top - 100 
        },1000);

    });


    // Start DataTable 

    // Search By Full Name 
   
    $('.table').DataTable({
        "ordering" : false
    });


    // Start  tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // Show Message Confirm Before Delete User 

    $('.confirm').on('click',function(){
        return confirm('Are You Sure To Delete This User ? ');
    });
    $('.confirmDeleteAppointment').on('click',function(){
        return confirm('Are You Sure To Delete This Appointment ? ');
    });


    //SummerNote 
    
        $('#summernote').summernote();
        $(".note-insert").remove();
        $(".note-table").remove();
        $(".btn-codeview").remove();


});