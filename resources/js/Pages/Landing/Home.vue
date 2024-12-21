<script setup lang="ts">
import LandingLayout from '@/Layouts/LandingLayout.vue';
import HeroSection from '@/Components/Landing/HeroSection.vue';
import FaqSection from '@/Components/Landing/FaqSection.vue';
import UrlShortener from '@/Components/Landing/UrlShortener.vue'
import PricingSection from '@/Components/Landing/PricingSection.vue';
import { Head } from '@inertiajs/vue3'


</script>

<template>
    <Head title="Linkzy Url Shortener" />
    <LandingLayout>
        <HeroSection/>
        <UrlShortener/>
        <PricingSection/>
        <FaqSection/>
    </LandingLayout>
</template>
