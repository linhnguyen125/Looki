Pusher.logToConsole = true;

var pusher = new Pusher("7d6787c857c7aa6aa4d0", {
    cluster: "ap1"
});

var channel = pusher.subscribe("NotificationEvent");
channel.bind("send-message", function(data) {
    var newNotificationHtml = `
            <a class="dropdown-item" href="#">
                <span>${data.title}</span><br>
                <small>${data.content}</small>
            </a>
            `;

    $(".menu-notification").prepend(newNotificationHtml);
});
