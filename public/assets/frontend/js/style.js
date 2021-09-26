  $(".main").slice(0,6).show();
  $(".load-more").on("click",function(){
    $(".main:hidden").slice(0,6).show();


    if($(".main:hidden").length==0){
        $(".load-more").fadeOut();
    }
  })




    var content1= document.getElementById("content1");
    var content2= document.getElementById("content2");
    var btn1 = document.getElementById("btn1");
    var btn2= document.getElementById('btn2');

    function openbtn1(){
        content1.style.transform= "translateX(0)";
        content2.style.transform= "translateX(1000%)";
        btn1.style.color="tomato";
        btn2.style.color="white";
        content1.style.transitionDelay="0.3s"
        content2.style.transitionDelay="0s"

    }
    function openbtn2(){
        content1.style.transform= "translateX(1000%)";
        content2.style.transform= "translateX(0)";
        btn2.style.color="tomato";
        btn1.style.color="white";
        content1.style.transitionDelay="0s"
        content2.style.transitionDelay="0.3s"
    }


    // Show hide section

    var a;
    function show_hide(){
        if(a==1){
            document.getElementById("single").style.display="none";

            return a=0 ;
        }else{
            document.getElementById("single").style.display="inline";
        }

    }
    // End show hide section


    // smooth scrolling

    window.scrollBy({ top: -100, behavior: 'smooth' });

    $(document).ready(function(){

        $(document).on("click","#showWorkDetails",function(){
           var id = $(this).attr("work_id");
           $.ajax({
               type:'GET',
               data:{id:id},
               url:'/getWorkDetails/'+id,
               success:function(data){
                 $('#btn1').html(data.heading1);
                 $('#btn2').html(data.heading2);
                 $('#details1').html(data.details1);
                 $('#details2').html(data.details2);
                 $('#link').html(data.link);


               },
               error:function(){
                   alert("Error");
               }
           });

        });
    });
