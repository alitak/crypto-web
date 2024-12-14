<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import Transactions from "@/Components/Transactions.vue"
import {usePage} from "@inertiajs/vue3"

const page = usePage()
</script>

<template>
    <DefaultLayout title="DashBoard">
        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-9">
            <!--            <TrendingStocks/>-->

            <div class="col-span-12 rounded-sm border border-stroke bg-white p-2 shadow-default sm:p-7.5 xl:col-span-7">
                <Transactions :transactions="page.props.transactions"/>
            </div>
        </div>
    </DefaultLayout>
</template>
