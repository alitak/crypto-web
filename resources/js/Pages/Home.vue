<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import TrendingStocks from "@/Components/TrendingStocks.vue"
import LatestTransaction from "@/Components/LatestTransaction.vue"
import {Link} from "@inertiajs/vue3"
</script>

<template>
    <DefaultLayout title="DashBoard">
        <div class="mb-4 text-center">
            <Link class="font-bold text-black text-2xl mb-4" :href="'/'">Home</Link>
        </div>

        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-9">
<!--            <TrendingStocks/>-->

            <LatestTransaction/>
        </div>
    </DefaultLayout>
</template>
