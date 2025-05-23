import Echo from "laravel-echo"
import Pusher from "pusher-js"

declare global {
    interface Window {
        Pusher: typeof Pusher
    }
}

window.Pusher = Pusher

export const echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    cluster: import.meta.env.VITE_REVERB_APP_CLUSTER ?? "mt1",
    wsHost: import.meta.env.VITE_REVERB_HOST ? import.meta.env.VITE_REVERB_HOST : `ws-${import.meta.env.VITE_REVERB_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
})
