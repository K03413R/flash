<template>
    <div class="mt-1 flex rounded-md shadow-sm">
        <form v-on:submit.prevent="emitSearchEvent">
            <input
                type="text"
                id="company_website"
                class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5"
                placeholder="Search..."
                v-model="search"
                @submit="emitSearchEvent"
            >
        </form>
    </div>
</template>
<script>
export default {
    props: {
        search: ''
    },
    methods:{
        emitSearchEvent () {
            this.$emit('search', this.search)
        }
    }
}
</script>
