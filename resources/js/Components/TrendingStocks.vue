<script setup lang="ts">
import type Wallet from '@/Types/Models/Wallet'

const props = defineProps<{
    wallets: {
        data: Wallet[]
    }
}>()
</script>
<!--PAC  MIN  MAX-->
<template>
    <div class="col-span-12 w-full rounded-sm border border-stroke bg-white px-3 md:px-5 pb-10 pt-3 md:pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7 xl:col-span-5">
        <template v-for="(item, index) in props.wallets" :key="index">
            <div class="grid grid-cols-4 gap-3 rounded-[5px] border border-stroke p-3 md:p-5 dark:border-strokedark">
                <!-- Oszlop 1 -->
                <div class="col-span-1 flex flex-col items-center justify-center">
                    <div class="h-11.5 w-11.5 flex items-center justify-center rounded-full bg-[#EEF2F8]">
                        <img :src="`/images/logo/${item.coin}.svg`" :alt="item.coin" class="h-full w-full object-contain"/>
                    </div>
                    <div class="mt-3 text-center">
                        <h5 class="font-bold text-black dark:text-white">
                            {{ item.coin }}
                        </h5>
                        <p class="text-xs font-medium">{{ item.current_value }}₮</p>
                        <p class="text-xs font-medium mt-3" :class="item.current_pnl >= 0 ? 'text-meta-3' : 'text-red'">
                            <span v-text="item.current_pnl >= 0 ? '+' : '-'"></span> {{ item.current_pnl }}%
                        </p>
                        <p class="text-xs font-medium" :class="item.current_pnl >= 0 ? 'text-meta-3' : 'text-red'">
                            <span v-text="item.current_pnl >= 0 ? '+' : '-'"></span> {{ item.profit }}₮
                        </p>
                    </div>
                </div>
                <!-- Oszlop 2 -->
                <div class="col-span-2 flex flex-col items-center justify-center">
                    <div class="text-left font-mono">
                        <p class="text-xs font-medium">avg {{ item.avg_price }}₮</p>
                        <p class="text-xs font-medium">min {{ item.min_threshold }}₮ | {{ item.min_percent }}%</p>
                        <p class="text-xs font-medium">cur {{ item.current_price }}₮</p>
                        <p class="text-xs font-medium">max {{ item.max_threshold }}₮ | {{ item.max_percent }}%</p>
                        <p class="text-xs font-medium">stock {{ item.stock }}</p>
                        <p class="text-xs font-medium">cost {{ item.cost }}₮</p>
                    </div>
                </div>
                <!-- Oszlop 3 -->
                <div class="col-span-1 flex flex-col items-center justify-center">
                    <div class="text-left font-mono">
                        <p class="text-xs font-medium">c {{ item.package_count }}</p>
                        <p class="text-xs font-medium">acc {{ item.account }}₮</p>
                        <p class="text-xs font-medium">cur {{ item.current_price }}₮</p>
                        <p class="text-xs font-medium">pac {{ item.packet_price }}₮</p>
                        <p class="text-xs font-medium">min {{ item.min_threshold_percent_value }}%</p>
                        <p class="text-xs font-medium">max {{ item.max_threshold_percent_value }}%</p>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
