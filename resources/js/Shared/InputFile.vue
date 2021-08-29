<template>
    <!-- <input type="text" v-model="form.name" />
        <input type="file" @input="form.avatar = $event.target.files[0]" />

        <button type="submit">Submit</button> -->

    <form @submit.prevent="submit">
        <div class="flex items-center justify-end m-4">
            <input
                name="filename"
                class="m-4 inline-flex items-center px-4 py-1"
                disabled
                type="text"
                v-model="form.name"
            />
            <label
                class="
                    inline-flex
                    items-center
                    px-4
                    py-1
                    bg-white
                    rounded-md
                    shadow-md
                    uppercase
                    border border-blue
                    cursor-pointer
                    hover:bg-purple-600 hover:text-white
                    text-purple-600
                    ease-linear
                    transition-all
                    duration-150
                "
            >
                <!-- <i class="fas fa-cloud-upload-alt fa-3x"></i> -->
                <span class="mt-1 text-base leading-normal">Select a file</span>
                <input
                    type="file"
                    @input="form.file = setname($event.target.files[0])"
                    class="hidden"
                />
            </label>

            <progress
                v-if="form.progress"
                :value="form.progress.percentage"
                max="100"
            >
                {{ form.progress.percentage }}%
            </progress>

            <jeta-button
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                UPLOAD
            </jeta-button>
        </div>
    </form>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import JetaButton from "@/Jetstream/Button.vue";
export default {
    components: { JetaButton },
    setup() {
        const form = useForm({
            file: null,
            name: "*name of file*",
        });

        function submit() {
            form.post("/csvload", {
                forceFormData: true,
            });
        }

        function setname(file) {
            this.form.name = file.name;
            console.log(file);
            return file;
        }

        return { form, submit, setname };
    },
};
</script>
