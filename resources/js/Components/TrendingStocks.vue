<script setup lang="ts">
import {ref} from 'vue'

const stocksItems = ref([
    {
        name: 'Netflix',
        gross: '12,453.00',
        price: '1,984.00',
        returnRate: 0.14
    },
    {
        name: 'Apple Inc.',
        gross: '132,453.00',
        price: '2,634.00',
        returnRate: 1.03
    },
    {
        name: 'Meta',
        gross: '31,428.00',
        price: '2,432.00',
        returnRate: 0.08
    }
])
</script>

<template>
    <div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-10 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7 xl:col-span-5">
        <div class="flex flex-col gap-5">
            <template v-for="(item, index) in stocksItems" :key="index">
                <!-- stock item start -->
                <div class="rounded-[5px] border border-stroke p-5 dark:border-strokedark">
                    <div class="mb-5.5 flex items-center justify-between">
                        <div class="flex items-center gap-4.5">
                            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-[#EEF2F8]">
                                <img :src="item.image" alt="brand"/>
                            </div>

                            <div>
                                <h5 class="font-bold text-black dark:text-white">
                                    {{ item.name }}
                                </h5>
                                <p class="text-xs font-medium">$ {{ item.gross }}</p>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="mb-0.5 flex items-center justify-end gap-1 text-xs font-medium" :class="item.returnRate >= 0 ? 'text-meta-3' : 'text-red'">
                                {{ item.returnRate }} %
                            </p>
                            <p class="text-xs font-medium" :class="item.returnRate >= 0 ? 'text-meta-3' : 'text-red'">
                                <span v-text="item.returnRate >= 0 ? '+' : '-'"></span> ${{ item.price }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- stock item end -->
            </template>
        </div>
    </div>
</template>
