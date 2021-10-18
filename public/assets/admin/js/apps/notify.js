Pusher.logToConsole = true;

var pusher = new Pusher("7d6787c857c7aa6aa4d0", {
    cluster: "ap1"
});

var channel = pusher.subscribe("NotificationEvent");
channel.bind("send-message", function(data) {
    var newNotificationHtml = `
    <a href="${data["link"]}" class="text-decoration-none">
        <div class="nk-notification-item dropdown-inner">
            <div class="nk-notification-icon">
                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
            </div>
            <div class="nk-notification-content">
                <div class="nk-notification-text">
                    <p><strong>${data["user"]} </strong>
                    ${data["title"]}</p>
                </div>
                <div class="nk-notification-time">${data["content"]}</div>
            </div>
        </div>
    </a>
            `;

    $("div.nk-notification").prepend(newNotificationHtml);
});

// import Echo from 'laravel-echo';

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: "7d6787c857c7aa6aa4d0",
//     cluster: "ap1",
//     forceTLS: true
// });

// var channel = Echo.channel("NotificationEvent");
// channel.listen(".send-message", function(data) {
//     var newNotificationHtml = `
//     <a href="${data["link"]}" class="text-decoration-none">
//         <div class="nk-notification-item dropdown-inner">
//             <div class="nk-notification-icon">
//                 <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
//             </div>
//             <div class="nk-notification-content">
//                 <div class="nk-notification-text">
//                     <p><strong>${data["user"]} </strong>
//                     ${data["title"]}</p>
//                 </div>
//                 <div class="nk-notification-time">${data["content"]}</div>
//             </div>
//         </div>
//     </a>
//             `;

//     $("div.nk-notification").prepend(newNotificationHtml);
// });
