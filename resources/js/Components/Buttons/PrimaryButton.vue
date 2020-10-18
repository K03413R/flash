<template>
    <button v-on="$listeners" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script>
export default {
}
</script>
