<script setup lang="ts">
import AppHeader from '@/Components/Landing/AppHeader.vue';
import AppFooter from '@/Components/Landing/AppFooter.vue';
import { Toaster } from '@/Components/ui/sonner'
</script>

<template>
    <body class="">
        <AppHeader />
        <slot />
        <Toaster />
        <AppFooter />
    </body>
</template>
