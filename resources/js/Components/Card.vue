<script setup>
const props = defineProps({
    padding: {
        type: Number,
        default: 4,
    }
});
</script>

<template>
    <div :class="'my-12 bg-white sm:rounded-lg shadow p-' + props.padding + ' sm:p-' + (props.padding * 2)">
        <slot />
    </div>
</template>