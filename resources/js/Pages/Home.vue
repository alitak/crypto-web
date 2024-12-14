<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import Transactions from "@/Components/Transactions.vue"
import {onMounted} from "vue"
import {initializeApp} from "firebase/app"
import {getMessaging, getToken} from "firebase/messaging"
import type Transaction from "@/Types/Models/Transaction"
import axios from "axios";
import {route} from "ziggy-js";

const props = defineProps<{
    transactions: {
        data: Transaction[]
    }
}>()

onMounted(() => {
    if (Notification.permission === "default") {
        const app = initializeApp({
            apiKey: import.meta.env.VITE_FIREBASE_API_KEY,
            authDomain: import.meta.env.VITE_FIREBASE_AUTH_DOMAIN,
            projectId: import.meta.env.VITE_FIREBASE_PROJECT_ID,
            messagingSenderId: import.meta.env.VITE_FIREBASE_MESSAGING_SENDER_ID,
            appId: import.meta.env.VITE_FIREBASE_APP_ID,
        })
        const messaging = getMessaging(app)

        getToken(messaging, {vapidKey: import.meta.env.VITE_VAPID_PUBLIC_KEY}).then((currentToken) => {
            if (currentToken) {
                axios.post(route("fcm-tokens.store"), {fcm_token: currentToken})
            }
        })

        // messaging.onMessage((payload) => {
        //     console.log("Message received. ", payload)
        // })
    }
})
</script>

<template>
    <DefaultLayout title="DashBoard">
        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-9">
            <!--            <TrendingStocks/>-->

            <div class="col-span-12 rounded-sm border border-stroke bg-white p-2 shadow-default sm:p-7.5 xl:col-span-7">
                <Transactions :transactions="props.transactions"/>
            </div>
        </div>
    </DefaultLayout>
</template>
