<template>
    <InputFile />
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
                    <th class="border px-4 py">Birth_Date</th>
                    <th class="border px-4 py">Phone</th>
                    <th class="border px-2 py">Address</th>
                    <th class="border px-2 py">credit_card</th>
                    <th class="border px-4 py">Last 4 numbers</th>
                    <th class="border px-4 py">Franchise</th>
                    <th class="border px-4 py">Email</th>
                    <th class="border px-4 py">Csv File ID</th>
                    <th class="border px-4 py">created_at</th>
                    <th class="border px-4 py">Updated at</th>
                </tr>
            </thead>
            <tbody v-for="data in datacsv" :key="data.id">
                <tr>
                    <td class="border px-4 py">{{ data.id }}</td>
                    <td class="border px-4 py">{{ data.name }}</td>
                    <td class="border px-4 py">{{ data.birth_date }}</td>
                    <td class="border px-4 py">{{ data.phone }}</td>
                    <td class="border px-2 py">{{ data.address }}</td>
                    <td class="border px-2 py">{{ data.credit_card }}</td>
                    <td class="border px-4 py">{{ data.four_numbers }}</td>
                    <td class="border px-4 py">{{ data.franchise }}</td>
                    <td class="border px-4 py">{{ data.email }}</td>
                    <td class="border px-4 py">{{ data.csv_file_id }}</td>
                    <td class="border px-4 py">{{ data.created_at }}</td>
                    <td class="border px-4 py">{{ data.updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Input from "@/Jetstream/Input.vue";
import Icon from "@/Shared/Icon";
import InputFile from "@/Shared/InputFile.vue";
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
            data: {
                id: null,
                name: null,
                url: null,
                email: null,
                phone: null,
                address: null,
                city: null,
                region: null,
                country: null,
                postal_code: null,
            },
            data2: {},
        };
    },
    setup() {
        function toload(dat) {
            this.data2 = dat;
            console.log(this.data);
        }
        return { toload };
    },
};
</script>
