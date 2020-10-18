<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Routes
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
                <div class="flex justify-between items-center">
                    <div class=" flex items-center space-x-2 w-1/4">
                        <TextInput
                            :search="search"
                            @search="updateSearch"
                        />
                        <Delete @click="clearQuery">Clear</Delete>
                    </div>

                    <inertia-link href="/routes/create">Create</inertia-link>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <Table
                        :columns="columns"
                        :rows="routes"
                        :sort="sort"
                        @sort="updateSort"

                    >
                        <template #column-color="{ row }">
                            <span class="bg-red-500 py-1 px-2 rounded-full">{{row.color}}</span>
                        </template>
                        <template #column-actions="{ row }">
                            <div class="space-x-2">
                                <inertia-link :href="`/routes/edit/${row.id}`" class="bg-blue-200 py-1 px-2 rounded-full">Edit</inertia-link>
                                <inertia-link :href="`/routes/${row.id}`" :data="{id: row.id}" method="delete" class="bg-red-400 text-white py-1 px-2 rounded-full">Delete</inertia-link>
                            </div>
                        </template>
                    </Table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../Layouts/AppLayout'
import Welcome from './../Jetstream/Welcome'
import Table from "../Components/table/Table";
import Button from "../Jetstream/Button";
import { Inertia } from '@inertiajs/inertia'
import TextInput from "../Components/Form/TextInput";
import Delete from "../Components/Buttons/Delete";
import PrimaryButton from "../Components/Buttons/PrimaryButton";

export default {

    components: {
        PrimaryButton,
        Delete,
        TextInput,
        Button,
        Table,
        AppLayout,
        Welcome,
    },
    props: {
        routes: Array,
    },
    data: function () {
        return {
            defaultSort: 'name',
            columns: [
                {name: 'id', label: 'Id', sortable: true},
                {name: 'name', label: 'Name', sortable: true},
                {name: 'color', label: 'Color'},
                {name: 'grade', label: 'Grade', sortable: true},
                {name: 'actions', label: ''},
            ]
        }
    },
    computed: {
        sort () {
            return this.stripParams('sort') || this.defaultSort
        },
        search () {
            return this.stripParams('search') || null
        }
    },
    methods: {
        updateSort(sort) {
            let query = this.buildQueryObject();
            query.sort = sort;
            Inertia.get('/routes', query, { replace: true })
        },
        updateSearch(search) {
            let query = this.buildQueryObject();
            if(search){
                query.search = search;
            } else {
                delete query.search;
            }
            Inertia.get('/routes', query, { replace: true })
        },
        stripParams(name){
            const parsedUrl = new URL(window.location.href);
            return parsedUrl.searchParams.get(name);
        },
        buildQueryObject(){
            let query = {};
            if(this.search){
                query.search = this.search;
            }
            if(this.sort){
                query.sort = this.sort;
            }
            return query;
        },
        clearQuery(){
            Inertia.get('/routes', {}, { replace: true })
        }
    }
}
</script>
