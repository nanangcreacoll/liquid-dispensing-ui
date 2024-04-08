import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true,
// });

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    wssPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echo.channel("dispensing-status").listen(
    "DispensingStatus",
    (event) => {
        console.log(event);
        const statusCircle = document.getElementById("status-circle");

        if (event.status) {
            statusCircle.classList.remove("bg-danger");
            statusCircle.classList.add("bg-success");
            console.log("Dispensing Status: true");
        } else {
            statusCircle.classList.remove("bg-success");
            statusCircle.classList.add("bg-danger");
            console.log("Dispensing Status: false");
        }
    }
);
