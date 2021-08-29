<template>
    <app-layout title="Contacts Page">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Log v-bind:datacsv="datacsv" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Log from "@/Shared/Logs.vue";

export default {
    components: {
        AppLayout,
        Log,
    },
    props: {
        datacsv: Object,
    },
};
</script>
