<script setup lang="ts">
import {ref} from 'vue'

const stocksItems = ref([
    {
        name: 'Apple Inc.',
        interestRate: 3.8,
        returnRate: +3.69,
        price: 9346.0,
        date: '20 Sep, 27'
    },
    {
        name: 'Amazon',
        interestRate: 2.7,
        returnRate: +3.69,
        price: 6879.0,
        date: '20 Sep, 27'
    },
    {
        name: 'Netflix',
        interestRate: 2.5,
        returnRate: -3.69,
        price: 1439.0,
        date: '20 Sep, 27'
    },
    {
        name: 'IBM',
        interestRate: 1.8,
        returnRate: -3.69,
        price: 2329.0,
        date: '20 Sep, 27'
    },
    {
        name: 'Meta',
        interestRate: 3.7,
        returnRate: +3.69,
        price: 1026.0,
        date: '20 Sep, 27'
    },
    {
        name: 'Microsoft',
        interestRate: 3.7,
        returnRate: +3.69,
        price: 3226.0,
        date: '20 Sep, 27'
    },
    {
        name: 'Tesla',
        interestRate: 3.7,
        returnRate: -1.24,
        price: 6426.0,
        date: '20 Sep, 27'
    }
])
</script>

<template>
    <div class="col-span-12 rounded-sm border border-stroke bg-white p-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:p-7.5 xl:col-span-7">
        <div class="mb-10 flex flex-wrap items-center justify-between gap-2">
            <div>
                <h4 class="text-title-sm2 font-bold text-black dark:text-white">Latest Transaction</h4>
            </div>
        </div>

        <div class="flex flex-col gap-[25px]">
            <template v-for="(item, index) in stocksItems" :key="index">
                <!-- Transaction item start -->
                <div class="grid grid-cols-2 items-center gap-5 xsm:grid-cols-3 sm:grid-cols-8">
                    <div class="flex items-center gap-4.5 sm:col-span-3 2xl:col-span-2">
                        <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-[#EEF2F8]">
                            <img :src="item.image" alt="brand" class="object-cover"/>
                        </div>

                        <div class="hidden sm:block">
                            <h5 class="font-bold text-black dark:text-white">{{ item.name }}</h5>
                            <p class="text-xs font-medium">Buy Stock</p>
                        </div>
                    </div>

                    <div class="hidden sm:col-span-2 sm:block">
                        <h5 class="font-bold text-black dark:text-white">Interest rate</h5>
                        <p class="text-xs font-medium">{{ item.interestRate }}%</p>
                    </div>

                    <div class="hidden xsm:block sm:col-span-1 2xl:col-span-2">
                        <p class="mb-0.5 flex items-center gap-[5px] text-sm font-bold leading-6" :class="item.returnRate >= 0 ? 'text-meta-3' : 'text-red'"> {{ item.returnRate }}%
                        </p>
                        <p class="text-xs">Ratio</p>
                    </div>

                    <div class="text-right sm:col-span-2">
                        <h5 class="font-bold text-black dark:text-white">
                            <span v-text="item.returnRate >= 0 ? '+' : '-'"></span> ${{ item.price }}
                        </h5>
                        <p class="text-xs font-medium">{{ item.date }}</p>
                    </div>
                </div>
                <!-- Transaction item end -->
            </template>
        </div>
    </div>
</template>
