<template>
    <app-layout title="Csv Page">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Csv
                        v-bind:datacsv="datacsv"
                        :showfile="showfile"
                        :showfiles="showfiles"
                    />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Csv from "@/Shared/Csv.vue";

export default {
    components: {
        AppLayout,
        Csv,
    },
    props: {
        datacsv: Object,
        showfiles: {
            default: true,
        },
        showfile: {
            default: false,
        },
    },
};
</script>
