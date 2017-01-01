/**
 * Created by enes on 22/12/2016.
 */


$(function(){

    // Handle submit request
    $('#form').on('submit',  request_search_results);

    // Book ticket
    $('body').on('click', '.ticket-button', request_ticket_booking);

});


function request_search_results(event){

    // Prevent form being submitted
    event.preventDefault();

    // Put form values into format
    // that can be passed though url
    var parameters = $('form').serialize();

    //make ajax call
    $.ajax({
        dataType: "html",
        url: "../controllers/browser-search.php",
        data: parameters,
        success: (function (responseText) {
            $('#search-results').html(responseText);
            add_tickets_column()
        }),
        error: (function(){
            $('#search-results').html("<h1>ERROR - Could not return any results</h1>");
        })
    });
}


function add_tickets_column(){

    // Get number of rows in table
    $('.result-table tr').not(":first").each(add_book_button);
}


function add_book_button(){

    var event_id = $(this).find("td").eq(9).html();
    var last_date = $(this).find("td").eq(8).html().split("-");
    var tickets_remaining = $(this).find("td").eq(7).html();
    var sale_end_date = new Date(20 + last_date[2], last_date[1] -1 , last_date[0]);
    var today = new Date();


    if (tickets_remaining > 0 && sale_end_date > today){
        $(this).find("td").eq(9).html("<input type=\"button\" id=" + event_id +
                                      " class='ticket-button' value=\"Book Ticket\">");
    }else{
        $(this).find("td").eq(9).html("<p>Tickets Unavailable</p>");
    }
}


function request_ticket_booking(event) {

    var event_id = $(this).attr('id');
    var parameters = "event_id=" + event_id;

    //display confirmation message
    var check = confirm("Do you want to book tickets for this event?");

    if (check == true)book_tickets(parameters);

}

function book_tickets(parameters){

    //ajax call
    $.ajax({
        dataType: "text",
        url: "../controllers/book-tickets.php",
        data: parameters,
        success: (function (responseText) {

            // display message ticket booked.
            alert(responseText);

           //dynamically update displayed table

        }),
        error: (function(){
            alert("could not book ticket - ajax request failed");
        })
    });

}














