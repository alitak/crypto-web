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
    transactions: Transaction[]
    transactionCurrentPage: number
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
        total_potential_profit: string
        total_potential_pnl: string
        potential_monthly_interest: string
        potential_yearly_interest: string
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
                    <div class="col-span-1 flex items-center justify-evenly font-medium py-3 sm:py-0 sm:px-10 border-b sm:border-b-0 sm:border-r border-stroke ">
                        <div class="h-10.5 w-10.5 overflow-hidden rounded-full sm:mr-10">
                            <img :src="Chart" alt="chart"/>
                        </div>
                        <div class="text-left">
                            <h4 class="text-xl font-bold">{{ props.total.total_starting_balance }}₮</h4>
                            <h4 class="text-xl font-bold">{{ props.total.total_balance }}₮ ({{ props.total.total_account }}₮)</h4>
                        </div>
                    </div>
                    <div class="col-span-1 flex items-center justify-evenly font-medium py-3 sm:py-0 sm:px-10 border-b sm:border-b-0 sm:border-r border-stroke ">
                        <div class="h-10.5 w-10.5 overflow-hidden rounded-full sm:mr-10">
                            <img :src="Profit" alt="profit"/>
                        </div>
                        <div class="text-right">
                            <h4 class="text-xl font-bold">
                                {{ props.total.total_profit }}₮
                                ({{ props.total.total_potential_profit }}₮)
                            </h4>
                            <h4 class="text-xl font-bold">
                                {{ props.total.total_pnl }}
                                ({{ props.total.total_potential_pnl }})
                            </h4>
                        </div>
                    </div>
                    <div class="col-span-1 flex items-center justify-evenly font-medium py-3 sm:py-0 sm:px-10">
                        <div class="h-10.5 w-10.5 overflow-hidden rounded-full sm:mr-10">
                            <img :src="Interest" alt="interest"/>
                        </div>
                        <div class="text-right">
                            <h4 class="text-xl font-bold">
                                {{ props.total.monthly_interest }}
                                ({{ props.total.potential_monthly_interest }})
                            </h4>
                            <h4 class="text-xl font-bold">
                                {{ props.total.yearly_interest }}
                                ({{ props.total.potential_yearly_interest }})
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <TrendingStocks :wallets="props.wallets"/>

            <div class="col-span-12 rounded-sm border border-stroke bg-white p-2 shadow-default sm:p-7.5 xl:col-span-7">
                <Transactions :transactions="props.transactions" :current-page="props.transactionCurrentPage"/>
            </div>
        </div>
    </DefaultLayout>
</template>
