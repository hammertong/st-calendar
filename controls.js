
function disableCalendarForm() {
    $("#calForm :input").attr("disabled","disabled")
    $("#evtDel").attr("disabled",null);    
    $("#calForm :submit").css("opacity", .3)
}

$( document ).ready(function() {
   
    //console.log( "ready!" );

    setTimeout((o) => {

        $("#calForm :input").attr("disabled","disabled")
        $("#evtDel").attr("disabled",null);
        $("#calForm :submit").css("opacity", .3)

        $('.calCell').on('click', function(o) {            
            try {

                disableCalendarForm();

                var d = parseInt(o.target.getAttribute('data-day'));
                if (isNaN(d)) return;

                var m = parseInt($('#calMonth').val());
                var y = parseInt($('#calYear').val());

                var day = "";
                day += y;
                day += '-';
                if (m < 10) day += '0';
                day += m;
                day += '-';
                if (d < 10) day += '0';
                day += d;
                
                $.ajax({
                    url: 'sw.php',
                    type: 'POST',
                    data: {
                        startTime: day + ' 08:30:00',
                        endTime: day + ' 17:20:00',
                        op: 1
                    },                    
                    xhrFields: {
                        withCredentials: true
                    },
                    crossDomain: true,                   
                    success: function(data) {
                        console.log("ok");
                        location.reload();
                    },
                    error: function(data) {
                        console.log("error");
                    }
                });
    
            }
            catch(e) {
                console.error(e);
            }            

        });
    }, 1000);

    // $('.calRowBack').on('click', function(data) {         
    //     debugger;
    //     console.log('aaaaaa'); 
    // } )


});