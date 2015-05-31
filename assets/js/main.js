
$(function() {
    $(".submit_button").click(function() {
        $.ajax({
            url:'send_email.php',
            data :{
                email:$("#email").val(),
                name : $("#name").val(),
                message : $("#message").val()
            },
            type :"POST",
            success: function() {
                $('.contact_form').html("<div id='message_after'></div>");
                $('#message_after').html("<h2>Your response has been submitted!</h2>").append("<p>We will be in touch soon.</p>");
            },
            error: function() {
                alert("Something is wrong in your form. Please check the details again.");
            }
        });

        return false;
    });
});
