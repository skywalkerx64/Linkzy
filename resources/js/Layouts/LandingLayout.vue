<script setup lang="ts">
</script>

<template>
    <body class="bg-white dark dark:bg-gray-900">
        <AppHeader />
        <slot />
        <AppFooter />
        <div class="fixed inset-x-6 bottom-6 z-40 mx-auto w-max">
        </div>
    </body>
</template>
