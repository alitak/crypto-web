<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import TrendingStocks from "@/Components/TrendingStocks.vue"
import LatestTransaction from "@/Components/LatestTransaction.vue"
</script>

<template>
    <DefaultLayout title="DashBoard">
        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-9">
            <TrendingStocks/>

            <LatestTransaction/>
        </div>
    </DefaultLayout>
</template>
