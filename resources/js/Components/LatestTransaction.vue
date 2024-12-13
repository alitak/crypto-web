<script setup lang="ts">
import {onMounted, ref} from 'vue'
import type Transaction from "@/Types/Models/Transaction"
import axios from "axios"
import {route} from "ziggy-js"

const transactions = ref<Transaction[]>([])

onMounted(async () => {
    try {
        const response = await axios.get(route('transactions.index'))
        transactions.value = response.data
    } catch (error) {
        console.log(error)
    }
});
</script>

<template>
    <div class="col-span-12 rounded-sm border border-stroke bg-white p-2 shadow-default dark:border-strokedark dark:bg-boxdark sm:p-7.5 xl:col-span-7">
        <div class="mb-10 flex flex-wrap items-center justify-between gap-2">
            <div>
                <h4 class="text-title-sm2 font-bold text-black dark:text-white">Latest Transaction</h4>
            </div>
        </div>

        <div class="flex flex-col gap-[25px]">
            <template v-for="(transaction, index) in transactions" :key="index">
                <div class="grid grid-cols-4 items-center gap-1 sm:gap-2 sm:grid-cols-12 mb-2">
                    <div class="col-span-4 sm:col-span-12 text-center">
                        <h5 class="font-medium text-black dark:text-white">{{ transaction.happened_at }}</h5>
                    </div>
                        <div class="col-span-1 h-11.5 w-11.5 items-center justify-center rounded-full bg-[#EEF2F8]">
                            <img :src="`/images/logo/${transaction.coin}.svg`" alt="brand" class="object-cover"/>
                        </div>


                        <div class="col-span-1 sm:col-span-1">
                            <h5 class="font-bold text-black dark:text-white">{{ transaction.coin }}</h5>
                            <p class="text-xs font-medium">{{ transaction.event }}</p>
                        </div>

                    <div class="col-span-2 sm:block text-right">
                        <h5 class="font-bold text-black dark:text-white">price {{ transaction.price }}₮</h5>
                        <h5 class="font-medium">avg {{ transaction.average }}₮</h5>
                    </div>

                    <div class="col-span-2 sm:block text-right">
                        <h5 class="font-medium">min {{ transaction.min_threshold }}₮</h5>
                        <h5 class="font-medium">max {{ transaction.max_threshold }}₮</h5>
                    </div>

                    <div class="col-span-2 sm:block text-right">
                        <h5 class="font-medium">stock {{ transaction.stock }}</h5>
                        <h5 class="font-medium">quant {{ transaction.quantity }}</h5>
                    </div>

                    <div class="col-span-2 sm:block text-right">
                        <h5 class="font-medium">cost {{ transaction.cost }}₮</h5>
                        <h5 class="font-medium">total {{ transaction.total }}₮</h5>
                    </div>

                    <div class="col-span-2 sm:block text-right">
                        <h5 class="font-medium text-black dark:text-white">pack {{ transaction.package_count }}</h5>
                        <h5 class="font-medium">acc {{ transaction.account }}₮</h5>
                    </div>
                </div>
                <!-- Transaction item end -->
            </template>
        </div>
    </div>
</template>
