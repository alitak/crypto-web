<script setup lang="ts">
import {Head} from "@inertiajs/vue3"

defineProps<{
    title: string
}>()
</script>

<template>
    <Head :title="title"/>

    <div class="flex h-screen overflow-hidden">

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <main class="relative z-20">
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>
