<script setup>
const model = defineModel({
    type: null,
    required: true
})

defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    message: String,
})
</script>

<template>
    <div>
        <label>{{ name }}</label>
        <input :type="type" v-model="model">
        <small v-if="message">{{ message }}</small>
    </div>
</template>

