/**
 * Created by enes on 15/01/2017.
 */


$(function(){

    get_event_names();
    get_feedback();

    // Handle submit request
    $('#comment-form').on('submit',  submit_comment);


});



function get_event_names(){

    //make ajax call
    $.ajax({
        dataType: "html",
        url: "../controllers/get-user-events.php",
        success: (function (responseText) {
            document.getElementById('event_name').innerHTML = responseText

        }),
        error: (function(){
        })
    });

}

function get_feedback() {
    //make ajax call
    $.ajax({
        dataType: "html",
        url: "../controllers/feedback.php",
        success: (function (responseText) {
            document.getElementsByTagName("ol")[0].innerHTML = responseText

        }),
        error: (function(){
        })
    });
}

function submit_comment(event) {

    event.preventDefault();


    var eventname = document.getElementById('event_name').innerHTML;

    if(eventname.includes("<select name=")){

        var parameters = $('form').serialize();

        //make ajax call
        $.ajax({
            dataType: "html",
            url: "../controllers/submit-comment.php",
            data: parameters,
            success: (function (responseText) {

                alert("comment posted \nThank you for your feedback!");
                location.reload();

            }),
            error: (function(){
                alert("ERROR - could not post comment")
               })
        });


    }else{
        alert("Comment not submitted \nNo event has been selected ");
    }





}