<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <DataTableHeading
                            v-for="column in columns"
                            :key="column.name"
                            v-bind="column"
                            :sort="sort"
                            @sort="$emit('sort', $event)"
                        >
                            {{ column.label }}
                        </DataTableHeading>
                        <tbody>
                        <tr v-for="(row, index) in rows" :key="index" :class="{'bg-white': index % 2 === 0, 'bg-gray-50': index % 2 !== 0 }">
                            <slot v-for="column in columns" :name="`column-wrapper.${column.name}`">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    <slot
                                        :name="`column-${column.name}`"
                                        :value="row[column.name]"
                                        :row="row"
                                    >
                                        {{row[column.name]}}
                                    </slot>
                                </td>
                            </slot>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Button from "../../Jetstream/Button";
import DataTableHeading from "./DataTableHeading";
export default {
    components: {
        Button,
        DataTableHeading,
    },
    props: {
        columns: {
            type: Array,
            required: true
        },
        rows: {
            type: Array,
            required: true
        },
        sort: {
            type: String,
            default: ''
        }
    },
}
</script>
