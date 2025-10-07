 <script setup>
    defineProps({
        user: String
    })
 </script>

<template>
    <Head title="About"/>
    <div>
        About {{ user }}
    </div>
</template>

