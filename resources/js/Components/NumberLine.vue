<script setup lang="ts">
import {computed} from "vue"

const props = defineProps<{
    min: number
    max: number
    // fixed: number
    variable: number
}>()

const variableLeftPercent = computed(() => {
    return (((props.variable - props.min) / (props.max - props.min)) * 100) + "%"
})
// const fixedLeftPercent = computed(() => {
//     return (((props.fixed - props.min) / (props.max  - props.min)) * 100) + "%"
// })
</script>

<template>
    <div class="relative w-full h-12 py-8 px-1">
        <!-- Számegyenes -->
        <div class="relative h-1 bg-bodydark1">
            <!-- Minimum érték -->
            <div class="absolute top-0 left-0 transform -translate-y-3 flex flex-col items-center">
                <span class="absolute text-sm text-meta-10 -top-5 -left-2" v-text="min"></span>
                <div class="h-10 w-[2px] bg-meta-10"></div>
            </div>

<!--            &lt;!&ndash; Fix érték (arányos helyzetben) &ndash;&gt;-->
<!--            <div-->
<!--                class="absolute top-0 flex flex-col items-center transform -translate-y-3"-->
<!--                :style="{ left:fixedLeftPercent }"-->
<!--                <div class="h-10 w-[1px] bg-black"></div>-->
<!--                <span class="text-sm text-black-2">3899,99</span>-->
<!--            </div>-->

            <!-- Változó érték (arányos helyzetben) -->
            <div
                class="absolute top-0 flex flex-col items-center transform -translate-y-3"
                :style="{ left: variableLeftPercent }">
                <div class="h-10 w-[2px] bg-red"></div>
                <span class="absolute text-sm text-red font-bold top-10" v-text="variable"></span>
            </div>

            <!-- Maximum érték -->
            <div class="absolute top-0 right-0 transform -translate-y-3 flex flex-col items-center">
                <span class="absolute text-sm text-violet -top-5 -right-2" v-text="max"></span>
                <div class="h-10 w-[2px] bg-violet"></div>
            </div>
        </div>
    </div>
</template>
