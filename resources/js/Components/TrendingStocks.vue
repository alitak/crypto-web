<script setup lang="ts">
import type Wallet from '@/Types/Models/Wallet'
import {usePoll} from "@inertiajs/vue3"

const props = defineProps<{
    wallets: {
        data: Wallet[]
    }
}>()

usePoll(10000)
</script>

<template>
    <div class="col-span-12 w-full rounded-sm border border-stroke bg-white px-3 md:px-5 pb-10 pt-3 md:pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7 xl:col-span-5">
        <template v-for="(item, index) in props.wallets" :key="index">
            <div class="grid grid-cols-4 gap-3 rounded-[5px] border border-stroke p-3 md:p-5 dark:border-strokedark">
                <!-- Oszlop 1 -->
                <div class="col-span-1 flex flex-col items-center font-medium">
                    <div class="h-11.5 w-11.5 flex items-center rounded-full bg-[#EEF2F8]">
                        <img :src="`/images/logo/${item.coin}.svg`" :alt="item.coin" class="h-full w-full object-contain"/>
                    </div>
                    <div class="mt-3 text-center text-xs">
                        <h5 class="font-bold text-base text-black dark:text-white">
                            {{ item.coin }}
                        </h5>
                        <p>{{ item.current_value }}₮</p>
                        <p class="mt-3" :class="item.current_pnl >= 0 ? 'text-meta-3' : 'text-red'">
                            <span v-text="item.current_pnl >= 0 ? '+' : ''"></span> {{ item.current_pnl }}%
                        </p>
                        <p :class="item.current_pnl >= 0 ? 'text-meta-3' : 'text-red'">
                            <span v-text="item.current_pnl >= 0 ? '+' : ''"></span> {{ item.profit }}₮
                        </p>
                    </div>
                </div>
                <!-- Oszlop 2 -->
                <div class="col-span-2 flex flex-col items-center">
                    <div class="text-left font-mono text-sm md:text-base">
                        <p>avg {{ item.avg_price }}₮</p>
                        <p :class="{'font-bold text-md': item.min_percent < item.max_percent, 'text-green-500': item.min_percent < 0.5}">min {{ item.min_threshold }}₮ | {{ item.min_percent }}%</p>
                        <p>cur {{ item.current_price }}₮</p>
                        <p :class="{'font-bold text-md': item.max_percent < item.min_percent, 'text-green-500': item.max_percent < 0.5}">max {{ item.max_threshold }}₮ | {{ item.max_percent }}%</p>
                        <p>stock {{ item.stock }}</p>
                        <p>cost {{ item.cost }}₮</p>
                    </div>
                </div>
                <!-- Oszlop 3 -->
                <div class="col-span-1 flex flex-col items-center">
                    <div class="text-left font-mono text-xs md:text-sm font-medium">
                        <p>c {{ item.package_count }}</p>
                        <p>acc {{ item.account }}₮</p>
                        <p>cur {{ item.current_price }}₮</p>
                        <p>pac {{ item.packet_price }}₮</p>
                        <p>min {{ item.min_threshold_percent_value }}%</p>
                        <p>max {{ item.max_threshold_percent_value }}%</p>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
