<script setup lang="ts">
import {Head, Link} from "@inertiajs/vue3"
import {route} from "ziggy-js";

defineProps<{
    title: string
}>()
</script>

<template>
    <Head :title="title"/>

    <div class="flex h-screen overflow-hidden">

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <main class="relative z-20 pt-4">

                <div class="mb-4 text-center">
                    <Link class="font-bold text-black text-2xl mb-4" :href="'/'">Home</Link>
                    <Link class="font-bold text-black text-2xl mb-4 ml-10 sm:hidden" :href="`${route('home')}#transactions`">Transactions</Link>
                </div>

                <div class="mx-auto max-w-screen-2xl px-4 md:px-6 2xl:px-10">
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>
