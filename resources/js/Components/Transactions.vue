<script setup lang="ts">
import type Transaction from "@/Types/Models/Transaction"
import {WhenVisible} from "@inertiajs/vue3"

const props = defineProps<{
    transactions: Transaction[]
    currentPage: number
}>()
</script>

<template>
    <div class="flex flex-col gap-[25px]">
        <template v-for="(transaction, index) in props.transactions" :key="index">
            <div class="grid grid-cols-4 items-center gap-1 sm:gap-2 sm:grid-cols-12">
                <div class="col-span-4 sm:col-span-12 text-center">
                    <h5 class="font-medium text-black">{{ transaction.happened_at }}</h5>
                </div>
                <div class="col-span-1 h-11.5 w-11.5 items-center justify-center rounded-full bg-[#EEF2F8]">
                    <img :src="`/images/logo/${transaction.coin}.svg`" :alt="transaction.coin" class="object-cover"/>
                </div>

                <div class="col-span-1 sm:col-span-1">
                    <h5 class="font-bold text-black">{{ transaction.coin }}</h5>
                    <p class="text-xs font-medium">{{ transaction.event }}</p>
                </div>

                <div class="col-span-2 sm:block text-right">
                    <h5 class="font-bold text-black">price {{ transaction.price }}₮</h5>
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
                    <h5 class="font-medium text-black">pack {{ transaction.package_count }}</h5>
                    <h5 class="font-medium">acc {{ transaction.account }}₮</h5>
                </div>
            </div>
            <!-- Transaction item end -->
        </template>
        <WhenVisible
            always
            data="transactions"
            :params="{
                        data: {
                            page: currentPage + 1,
                        },
                        only: ['transactions'],
                        preserveUrl: false,
                    }"
        >
            <template #fallback>
                <div>Loading...</div>
            </template>
        </WhenVisible>
    </div>
</template>
