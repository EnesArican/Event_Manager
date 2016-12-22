/**
 * Created by enes on 22/12/2016.
 */



function add_book_button(){

    var event_id = $(this).find("td").eq(9).html();
    var last_date = $(this).find("td").eq(8).html().split("-");
    var tickets_remaining = $(this).find("td").eq(7).html();
    var sale_end_date = new Date(20 + last_date[2], last_date[1] -1 , last_date[0]);
    var today = new Date();



    if (tickets_remaining > 0 && sale_end_date > today){

        //alert("Book Tickets");


        $(this).find("td").eq(9).html("<input type=\"button\" value=\"Book Tickets\">");

    }else{//alert("Sale Ended")
         }




}



function add_ticekts_column(){

    // Get number of rows in table
    var rowcount = $('.table tr').length;

    //for(i = 1; i < rowcount; i++)

    $('.table tr').not(":first").each(add_book_button);

      //  var last_sale_date = $(this).find("td").eq(7).html();

        //alert(last_sale_date);



    //append("<td>" + rowcount + "</td>");

}





$(function(){


    add_ticekts_column()



});

