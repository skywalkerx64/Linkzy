<script setup lang="ts">
import AppHeader from '@/Components/Landing/AppHeader.vue';
import AppFooter from '@/Components/Landing/AppFooter.vue';
</script>

<template>
    <body class="">
        <AppHeader />
        <slot />
        <AppFooter />
    </body>
</template>
