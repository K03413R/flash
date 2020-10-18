<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Route
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-10">
                        <form  @submit.prevent="submit">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                    Name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                        <input v-model="form.name" id="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    </div>
                                    <div v-if="errors.name" class="mt-1 text-red-600 text-sm font-medium">{{ errors.name[0] }}</div>
                                </div>
                            </div>

                            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="color" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                    Color
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                        <input v-model="form.color"id="color" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    </div>
                                    <div v-if="errors.color" class="mt-1 text-red-600 text-sm font-medium">{{ errors.color[0] }}</div>
                                </div>
                            </div>

                            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="grade" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                    Grade
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                        <input v-model="form.grade" id="grade" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    </div>
                                    <div v-if="errors.grade" class="mt-1 text-red-600 text-sm font-medium">{{ errors.grade[0] }}</div>
                                </div>
                            </div>
                            <div class="mt-8 border-t border-gray-200 pt-5">
                                <div class="flex justify-end">
                                    <span class="inline-flex rounded-md shadow-sm">
                                        <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                            <inertia-link href="/routes">Back</inertia-link>
                                        </button>
                                    </span>
                                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                            Save
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    props: {
        errors: Object,
        form: Object,
        routeId: Number,
    },
    data() {
        return {
            form: {
                name: null,
                grade: null,
                color: null,
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/routes/'+this.routeId, this.form)
        },
    },
}
</script>
