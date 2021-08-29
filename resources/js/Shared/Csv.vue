<template>
    <InputFile />
    <p class="m-4 bg-red-400">
        First select the file, an click on the upload button. Then Click on the
        blue Load button to start the loading process.
    </p>
    <div class="relative">
        <table
            v-if="showfiles"
            class="
                w-full
                whitespace-no-wrapw-full whitespace-no-wrap
                table-auto
            "
        >
            <thead>
                <tr class="bg-purple-200 text-center font-bold">
                    <th class="border px-4 py">Id</th>
                    <th class="border px-4 py">Name</th>
                    <th class="border px-4 py">Url</th>
                    <th class="border px-4 py">User Id</th>
                    <th class="border px-4 py">State</th>
                    <th class="border px-4 py">Created at</th>
                    <th class="border px-4 py">Updated at</th>
                    <th class="border px-4 py">With error</th>
                    <th class="border px-4 py">Load to DB</th>
                </tr>
            </thead>
            <tbody v-for="data in datacsv" :key="data.id">
                <tr>
                    <td class="border px-4 py">{{ data.id }}</td>
                    <td class="border px-4 py">{{ data.name }}</td>
                    <td class="border px-4 py">{{ data.url }}</td>
                    <td class="border px-4 py">{{ data.user_id }}</td>
                    <td class="border px-4 py">{{ data.state }}</td>
                    <td class="border px-4 py">{{ data.created_at }}</td>
                    <td class="border px-4 py">{{ data.updated_at }}</td>
                    <td class="border px-4 py">{{ data.with_error }}</td>
                    <td
                        @click="sendcsv(data.id)"
                        class="bg-blue-400 text-white- border px-4 py"
                    >
                        Load
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="relative" v-if="showfile">
        <p class="m-4 bg-blue-400">
            Please validate your information. Link each column with the correct
            value. For better performance it only shows 1 row.
        </p>
        <table
            class="
                w-full
                whitespace-no-wrapw-full whitespace-no-wrap
                table-auto
            "
        >
            <!-- <tbody v-for="item in datacsv[0]">
                <tr>
                    <td class="border px-4 py">{{ item[0] }}</td>
                    <td class="border px-4 py">{{ item[1] }}</td>
                    <td class="border px-4 py">{{ item[2] }}</td>
                    <td class="border px-4 py">{{ item[3] }}</td>
                    <td class="border px-4 py">{{ item[4] }}</td>
                    <td class="border px-4 py">{{ item[5] }}</td>
                </tr>
            </tbody> -->

            <tbody>
                <tr>
                    <td class="border px-4 py">{{ datacsv[0][0][0] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][0][1] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][0][2] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][0][3] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][0][4] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][0][5] }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py">{{ datacsv[0][1][0] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][1][1] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][1][2] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][1][3] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][1][4] }}</td>
                    <td class="border px-4 py">{{ datacsv[0][1][5] }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py">
                        <select v-model="dataa.name">
                            <option>name</option>
                            <option>birth_date</option>
                            <option>phone</option>
                            <option>address</option>
                            <option>credit_card</option>
                            <option>email</option>
                        </select>
                    </td>
                    <td class="border px-4 py">
                        <select v-model="dataa.birth_date">
                            <option>name</option>
                            <option>birth_date</option>
                            <option>phone</option>
                            <option>address</option>
                            <option>credit_card</option>
                            <option>email</option>
                        </select>
                    </td>
                    <td class="border px-4 py">
                        <select v-model="dataa.phone">
                            <option>name</option>
                            <option>birth_date</option>
                            <option>phone</option>
                            <option>address</option>
                            <option>credit_card</option>
                            <option>email</option>
                        </select>
                    </td>
                    <td class="border px-4 py">
                        <select v-model="dataa.address">
                            <option>name</option>
                            <option>birth_date</option>
                            <option>phone</option>
                            <option>address</option>
                            <option>credit_card</option>
                            <option>email</option>
                        </select>
                    </td>
                    <td class="border px-4 py">
                        <select v-model="dataa.credit_card">
                            <option>name</option>
                            <option>birth_date</option>
                            <option>phone</option>
                            <option>address</option>
                            <option>credit_card</option>
                            <option>email</option>
                        </select>
                    </td>
                    <td class="border px-4 py">
                        <select v-model="dataa.email">
                            <option>name</option>
                            <option>birth_date</option>
                            <option>phone</option>
                            <option>address</option>
                            <option>credit_card</option>
                            <option>email</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <button
            @click="loadtodb(dataa)"
            class="bg-purple-400 text-white- border px-4 py-4"
        >
            Load the file to DB
        </button>
    </div>
</template>

<script>
import Input from "@/Jetstream/Input.vue";
import Icon from "@/Shared/Icon";
import InputFile from "@/Shared/InputFile.vue";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Input,
        Icon,
        InputFile,
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
    data() {
        return {
            sending: false,
            dataa: {
                name: "",
                birth_date: "",
                phone: "",
                address: "",
                credit_card: "",
                email: "",
            },

            data2: {},
            idfile: null,
        };
    },
    setup() {
        const form = useForm({
            idcsv: null,
            dataa: {},
        });
        function toload(dat) {
            this.data2 = dat;
            console.log(this.data);
        }
        function sendcsv(id) {
            var _this = this;
            _this.form.idcsv = id;
            form.post("/validatefield", {
                forceFormData: true,
            });
        }
        function loadtodb(dataa) {
            this.form.dataa = dataa;
            form.post("/todb", {
                forceFormData: true,
            });
        }
        return { form, toload, sendcsv, loadtodb };
    },
};
</script>
