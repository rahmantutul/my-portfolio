$(document).ready(function(){

    var $j = jQuery.noConflict();

    $(document).on("keyup","#Old", function(){
       var Old = $("#Old").val();
       $.ajax({
           type: 'POST',
           url: '/admin/check-password',
           data: { Old:Old },
           success:function(resp){
               if(resp=="false"){
                   $("#checkPassword").html("<font color='red'>Password does not match!<font>");
               }else{
                   $("#checkPassword").html("<font color='green'>Password correct! <font>");
               }
           },
           error:function(){
              alert("Error!");
           }
       });
    });
    var $j = jQuery.noConflict();
     $(document).on("click",".updateLinkStatus",function(){
        var status = $(this).children('i').attr('status');
        var link_id=$(this).attr('link_id');
        $.ajax({
            type: "post",
            url: "/admin/updateLinkStatus",
            data: {status:status, link_id:link_id},
            success:function(resp){
                // alert(resp);
                if(resp['status']==0){
                    $('#link-'+link_id).html("<i class='mdi mdi-toggle-switch-off' title='Status Off' status='Disabled'></i>");
                }else if(resp['status']==1){
                   $('#link-'+link_id).html("<i class='mdi mdi-toggle-switch'  title='Status On' status='Active'></i>");
               }
            },
            error:function(){
                alert("Error");
            }
        });
     });
     var $j = jQuery.noConflict();
    //  Meet status on off
    $(document).on("click",".updateMeetStatus",function(){
        var status = $(this).children('i').attr('status');
        var meet_id=$(this).attr('meet_id');
        $.ajax({
            type: "post",
            url: "/admin/updateMeetStatus",
            data: {status:status, meet_id:meet_id},
            success:function(resp){
                if(resp['status']==0){
                    $('#meet'+meet_id).html("<i class='mdi mdi-toggle-switch-off' title='Status Off' status='Disabled'></i>");
                }else if(resp['status']==1){
                   $('#meet-'+meet_id).html("<i class='mdi mdi-toggle-switch'  title='Status On' status='Active'></i>");
               }
            },
            error:function(){
                alert("Error");
            }
        });
     });


//   Confirm Delete with SweetAlert 2
//  pagination problem solve
// $(".confirmDelete").click(function()){
    $(document).on("click",".confirmDelete",function(){


    var record =$(this).attr("record");
    var recordid =$(this).attr("recordid");
    // alert(record);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="/admin/delete-"+record+"/"+recordid;
        }
        })
    });
   //  Work status on off
   var $j = jQuery.noConflict();
   $(document).on("click",".updateWorkStatus",function(){
    var status = $(this).children('i').attr('status');
    var work_id=$(this).attr('work_id');
    $.ajax({
        type: "post",
        url: "/admin/updateWorkStatus",
        data: {status:status, work_id:work_id},
        success:function(resp){
            if(resp['status']==1){
                $('#work-'+work_id).html("<i class='mdi mdi-toggle-switch'  title='Status On' status='Active'></i>");

            }else{
                $('#work'+work_id).html("<i class='mdi mdi-toggle-switch-off' title='Status Off' status='Disabled'></i>");
           };
        },
        error:function(){
            alert("Error");
        }
    });
 });

  //  Logo status on off
  var $j = jQuery.noConflict();
  $(document).on("click",".updateLogoStatus",function(){
    var status = $(this).children('i').attr('status');
    var logo_id=$(this).attr('logo_id');
    $.ajax({
        type: "post",
        url: "/admin/updateLogoStatus",
        data: {status:status, logo_id:logo_id},
        success:function(resp){
            if(resp['status']==0){
                $('#logo'+logo_id).html("<i class='mdi mdi-toggle-switch-off' title='Status Off' status='Disabled'></i>");
            }else if(resp['status']==1){
               $('#logo-'+logo_id).html("<i class='mdi mdi-toggle-switch'  title='Status On' status='Active'></i>");
           };
        },
        error:function(){
            alert("Error");
        }
    });
 });


   //  Meet status on off
   $(document).on("click",".updateSeenStatus",function(){
    var status = $(this).children('i').attr('status');
    var seen_id=$(this).attr('seen_id');
    $.ajax({
        type: "post",
        url: "/admin/updateSeenStatus",
        data: {status:status, seen_id:seen_id},
        success:function(resp){
            if(resp['status']==0){
                $('#seen'+seen_id).html("<i class='mdi mdi-toggle-switch-off' title='Status Off' status='Disabled'></i>");
            }else if(resp['status']==1){
               $('#seen-'+seen_id).html("<i class='mdi mdi-toggle-switch'  title='Status On' status='Active'></i>");
           };
        },
        error:function(){
            alert("Error");
        }
    });
 });
});
