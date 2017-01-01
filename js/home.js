/**
 * Created by enes on 22/12/2016.
 */


$(function(){

    // retrieve table on button click
    $('body').on('click', '.btn',  request_data);

    // View Participants
    $('body').on('click', '.participants-button', request_view_participants);

});


function request_data(event){


    //clear participant list
    $('#participants').html("");

    event.preventDefault();

    var btn_id = $(this).attr('id');
    var parameters = "btn_id=" + btn_id;


    //make ajax call
    $.ajax({
        dataType: "html",
        url: "../controllers/home-page.php",
        data: parameters,
        success: (function (responseText) {
            $('#request-results').html(responseText);

            if(btn_id == "btn-booked-events") {
                $('#request-results').prepend("<h1>Booked Events</h1>");
            }

            if(btn_id == "btn-hosted-events"){
                $('#request-results').prepend("<h1>Hosted Events</h1>");
                add_participants_column()
            }

        }),
        error: (function(){
            $('#request-results').html("<h1>ERROR - Could not return any results</h1>");
        })
    });

}


function add_participants_column(){
    // Get number of rows in table
    $('.result-table tr').not(":first").each(add_participants_button);
}

function add_participants_button(){

    var event_id = $(this).find("td").eq(8).html();

    $(this).find("td").eq(8).html("<input type=\"button\" id=" + event_id +
        " class='participants-button' value=\"View Participants\">");
}


function request_view_participants(event) {

    var event_id = $(this).attr('id');
    var parameters = "event_id=" + event_id;

    //ajax call
    $.ajax({
        dataType: "text",
        url: "../controllers/view-participants.php",
        data: parameters,
        success: (function (responseText) {

            $('#participants').html(responseText);
            // display message ticket booked.
            //alert(responseText);



        }),
        error: (function(){
            alert("could not book ticket - ajax request failed");
        })
    });


}















