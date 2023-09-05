$(document).ready(function() {
    const form = $(".chat_input");
    const inputField = $("#msg");
    const sendBtn = $("button");
    const chatBox = $(".chat-box");

    form.on("submit", function(e) {
        e.preventDefault();
    });

    sendBtn.on("click", function() {
        let xhr = $.ajax({
            url: "/chat/insert_message.php",
            type: "POST",
            processData: false,
            contentType: false,
            data: new FormData(form),
        });

        xhr.done(function(data) {
            inputField.val("");
            scrollToBottom();
        });
    });

    chatBox.on("mouseenter", function() {
        chatBox.addClass("active");
    });

    chatBox.on("mouseleave", function() {
        chatBox.removeClass("active");
    });

    setInterval(function() {
        let xhr = $.ajax({
            url: "/chat/get_message.php",
            type: "POST",
            processData: false,
            contentType: false,
            data: new FormData(form),
        });

        xhr.done(function(data) {
            chatBox.html(data);
            if (!chatBox.hasClass("active")) {
                scrollToBottom();
            }
        });
    }, 500);

    function scrollToBottom() {
        chatBox.scrollTop(chatBox.prop("scrollHeight"));
    }
});
