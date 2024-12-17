<script setup lang="ts">
import {onMounted} from "vue"
import axios from "axios"
import {route} from "ziggy-js"
import {router} from "@inertiajs/vue3"
import {initializeApp} from "firebase/app"
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import {getMessaging, getToken, onMessage} from "firebase/messaging"
import type Transaction from "@/Types/Models/Transaction"
import type Wallet from "@/Types/Models/Wallet"
import Chart from "@/assets/images/chart.png"
import Profit from "@/assets/images/profit.png"
import Interest from "@/assets/images/interest.png"
import TrendingStocks from "@/Components/TrendingStocks.vue"
import Transactions from "@/Components/Transactions.vue"

const props = defineProps<{
    transactions: {
        data: Transaction[]
    }
    wallets: {
        data: Wallet[]
    }
    total: {
        total_starting_balance: string
        total_balance: string
        total_account: string
        total_profit: string
        total_pnl: string
        monthly_interest: string
        yearly_interest: string
    }
}>()

onMounted(() => {
    const app = initializeApp({
        apiKey: import.meta.env.VITE_FIREBASE_API_KEY,
        authDomain: import.meta.env.VITE_FIREBASE_AUTH_DOMAIN,
        projectId: import.meta.env.VITE_FIREBASE_PROJECT_ID,
        messagingSenderId: import.meta.env.VITE_FIREBASE_MESSAGING_SENDER_ID,
        appId: import.meta.env.VITE_FIREBASE_APP_ID,
    })
    const messaging = getMessaging(app)

    onMessage(messaging, () => {
        router.reload()
    })

    if (Notification.permission === "default") {
        getToken(messaging, {vapidKey: import.meta.env.VITE_VAPID_PUBLIC_KEY}).then((currentToken) => {
            if (currentToken) {
                axios.post(route("fcm-tokens.store"), {fcm_token: currentToken})
            }
        })
    }
})
</script>

<template>
    <DefaultLayout title="DashBoard">
        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-9">
            <div class="relative col-span-12 rounded-sm bg-white shadow-default">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 rounded-[5px] p-3">
                    <div class="col-span-1 flex flex-col items-center font-medium py-3 sm:py-0 px-10 border-b sm:border-b-0 sm:border-r border-stroke ">
                        <div class="flex items-center">
                            <div class="h-10.5 w-10.5 overflow-hidden rounded-full mr-10">
                                <img :src="Chart" alt="chart"/>
                            </div>
                            <div class="text-left">
                                <h4 class="text-xl font-bold">{{ props.total.total_starting_balance }}₮</h4>
                                <h4 class="text-xl font-bold">{{ props.total.total_balance }}₮ ({{ props.total.total_account }}₮)</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 flex flex-col items-center font-medium py-3 sm:py-0 px-10 border-b sm:border-b-0 sm:border-r border-stroke ">
                        <div class="flex items-center">
                            <div class="h-10.5 w-10.5 overflow-hidden rounded-full mr-10">
                                <img :src="Profit" alt="profit"/>
                            </div>
                            <div class="text-right">
                                <h4 class="text-xl font-bold">{{ props.total.total_profit }}₮</h4>
                                <h4 class="text-xl font-bold">{{ props.total.total_pnl }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 flex flex-col items-center font-medium py-3 sm:py-0 px-10">
                        <div class="flex items-center">
                            <div class="h-10.5 w-10.5 overflow-hidden rounded-full mr-10">
                                <img :src="Interest" alt="interest"/>
                            </div>
                            <div class="text-right">
                                <h4 class="text-xl font-bold">{{ props.total.monthly_interest }}</h4>
                                <h4 class="text-xl font-bold">{{ props.total.yearly_interest }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <TrendingStocks :wallets="props.wallets"/>

            <div class="col-span-12 rounded-sm border border-stroke bg-white p-2 shadow-default sm:p-7.5 xl:col-span-7">
                <Transactions :transactions="props.transactions"/>
            </div>
        </div>
    </DefaultLayout>
</template>
