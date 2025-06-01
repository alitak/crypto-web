<script setup lang="ts">
import type Wallet from '@/Types/Models/Wallet'
import {usePoll} from "@inertiajs/vue3"
import NumberLine from "@/Components/NumberLine.vue"
import {ref} from "vue"
import {route} from "ziggy-js";

const props = defineProps<{
    wallets: Wallet[]
}>()

const fields = ref<{ label: string; key: keyof Wallet; suffix: string }[]>([
    { label: "cost", key: "cost", suffix: "₮" },
    { label: "stock", key: "stock", suffix: "" },
    { label: "avg", key: "avg_price", suffix: "₮" },
    { label: "value", key: "current_value", suffix: "₮" },
    { label: "count", key: "package_count", suffix: "" },
    { label: "packet", key: "packet_price", suffix: "₮" },
    // { label: "Kezdőtőke", key: "start_account", suffix: "₮" },
    { label: "account", key: "account", suffix: "₮" },
    { label: "min", key: "min_threshold_percent_value", suffix: "%" },
    { label: "max", key: "max_threshold_percent_value", suffix: "%" },
])

const coinColor = (avgPrice: number, currentPrice: number, maxThreshold: number): string => {
    if (avgPrice < currentPrice) {
        return "text-purple-700"
    } else if (avgPrice < maxThreshold) {
        return "text-blue-500"
    }
    return "text-black"
}

usePoll(10000, {
    "only": ["wallets", "total"]
})
</script>

<template>
    <div class="col-span-12 w-full rounded-sm bg-white px-3 md:px-5 py-3 md:pt-7.5 shadow-default sm:px-7 xl:col-span-5">
        <template v-for="(item, index) in props.wallets" :key="index">
            <div class="grid grid-cols-6 gap-x-2 mb-5 pb-3 border-b border-bodydark1" :class="index == props.wallets.length - 1 ? 'border-none mb-0 pb-0' : ''">
                    <NumberLine class="mb-5 col-span-6" :min="item.min_threshold" :max="item.max_threshold" :variable="item.current_price" :fixed="item.trigger_price"></NumberLine>

                    <div class="col-span-1 flex flex-col items-center font-medium">
                        <div class="h-11.5 w-11.5 flex items-center rounded-full bg-[#EEF2F8]">
                            <a :href="`${route('home', {'coin': item.coin})}#transactions`">
                                <img :src="`/images/logo/${item.coin}.svg`" :alt="item.coin" class="h-full w-full object-contain"/>
                            </a>
                        </div>
                        <div class="mt-1 text-center text-base">
                            <h5 class="font-bold text-xl " :class="coinColor(item.avg_price, item.current_price, item.max_threshold)">
                                <a :href="`${route('home', {'coin': item.coin})}#transactions`">
                                    {{ item.coin }}
                                </a>
                            </h5>
                            <!-- <p>{{ item.current_value }}₮</p> -->
                            <p :class="item.current_pnl >= 0 ? 'text-meta-3' : 'text-red'">
                                {{ item.profit }}₮
                            </p>
                        </div>
                    </div>
                    <div class="col-span-5 flex flex-col items-center font-medium">
                        <div class="w-full grid grid-cols-3 gap-x-3 gap-y-2 font-sans text-base md:text-base mb-2 text-center">
                            <div v-for="field in fields" :key="field.key" class="flex flex-col items-center sm:flex-row sm:justify-between">
                                <div class="mr-0 md:mr-1">{{ field.label }}</div>
                                <div>{{ item[field.key] }}{{ field.suffix }}</div>
                            </div>
                        </div>
                    </div>
            </div>
        </template>
    </div>
</template>
