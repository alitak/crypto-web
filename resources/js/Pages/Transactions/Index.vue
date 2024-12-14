<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import Transactions from "@/Components/Transactions.vue"
</script>

<template>
    <DefaultLayout title="DashBoard">
        <div class="col-span-12 rounded-sm border border-stroke bg-white p-2 shadow-default sm:p-7.5 xl:col-span-7">
            <Transactions/>
        </div>
    </DefaultLayout>
</template>
