<script setup lang="ts">
import { Button } from "@/Components/ui/button";
import Badge from "../ui/badge/Badge.vue";
import { Check } from "lucide-vue-next";

interface Plan {
    name: string;
    price: string;
    description: string;
    popular: boolean;
    features: string[];
}
const plans: Plan[] = [
    {
        name: "Free",
        price: "Free",
        description: "Forever free",
        popular: false,
        features: ["5 links per month", "100 clicks", "Analitics"],
    },
    {
        name: "Starter",
        price: "$10",
        description: "All the basics for starting a new business",
        popular: true,
        features: ["100 links per month", "500 clicks", "Analitics"],
    },
    {
        name: "Professional",
        price: "$50",
        description: "Everything you need for a growing business",
        popular: false,
        features: ["1000 links per month", "Unlimited clicks", "Analitics"],
    },
];
</script>

<template>
    <!-- Pricing -->
    <div
        class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto"
        id="pricing"
    >
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2
                class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white"
            >
                Pricing
            </h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">
                Whatever your status, our offers evolve according to your needs.
            </p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div
            class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:items-center"
        >
            <div v-for="plan in plans">
                <!-- Card -->
                <div
                    v-if="!plan.popular"
                    class="flex flex-col border border-gray-200 text-center rounded-xl p-8 dark:border-neutral-800"
                >
                    <h4
                        class="font-medium text-lg text-gray-800 dark:text-neutral-200"
                    >
                        {{ plan.name }}
                    </h4>
                    <span
                        class="mt-7 font-bold text-5xl text-gray-800 dark:text-neutral-200"
                        >{{ plan.price }}</span
                    >
                    <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                        {{ plan.description }}
                    </p>

                    <ul class="mt-7 space-y-2.5 text-sm">
                        <li
                            v-for="feature in plan.features"
                            class="flex gap-x-2"
                        >
                            <Check class="size-4 text-primary" />
                            <span class="text-gray-800 dark:text-neutral-400">
                                {{ feature }}
                            </span>
                        </li>
                    </ul>

                    <Button class="mt-5" variant="outline" href="#">
                        Sign up
                    </Button>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    v-if="plan.popular"
                    class="flex flex-col border-2 border-primary text-center shadow-xl rounded-xl p-8 dark:border-primary"
                >
                    <div class="flex justify-center">
                        <Badge class="mb-3 w-fit dark:text-white"
                            >Most popular</Badge
                        >
                    </div>
                    <h4
                        class="font-medium text-lg text-gray-800 dark:text-neutral-200"
                    >
                        {{ plan.name }}
                    </h4>
                    <span
                        class="mt-7 font-bold text-5xl text-gray-800 dark:text-neutral-200"
                        >{{ plan.price }}</span
                    >
                    <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                        {{ plan.description }}
                    </p>

                    <ul class="mt-7 space-y-2.5 text-sm">
                        <li
                            v-for="feature in plan.features"
                            class="flex gap-x-2"
                        >
                            <Check class="size-4 text-primary" />
                            <span class="text-gray-800 dark:text-neutral-400">
                                {{ feature }}
                            </span>
                        </li>
                    </ul>

                    <Button
                        class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-primary text-white hover:bg-primary focus:outline-none focus:bg-primary disabled:opacity-50 disabled:pointer-events-none"
                        href="#"
                    >
                        Sign up
                    </Button>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Pricing -->
</template>
