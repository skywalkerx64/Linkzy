<script setup lang="ts">
import AppHeader from '@/Components/Landing/AppHeader.vue';
</script>

<template>
    <body class="">
        <AppHeader />
        <slot />
        <AppFooter />
    </body>
</template>
