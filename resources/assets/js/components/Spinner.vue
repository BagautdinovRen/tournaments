<template>
    <div class="spinner-border text-light" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</template>

<script>
export default {
    name: "Spinner"
}
</script>

<style scoped>
    .spinner-border{
        position: absolute;
        left: calc(50% - 1rem);
        top: calc(50% - 1rem);
    }
</style>
