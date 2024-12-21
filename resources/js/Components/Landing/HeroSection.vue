<script setup lang="ts">
import { useColorMode } from "@vueuse/core";
const mode = useColorMode();

import { Button } from "@/Components/ui/button";
import { ArrowRight } from "lucide-vue-next";
</script>

<template>
  <section class="container">
    <div
      class="grid place-items-center lg:max-w-screen-xl gap-8 mx-auto pt-16 md:pt-28"
    >
      <div class="text-center space-y-8">

        <div
          class="max-w-screen-md mx-auto text-center text-5xl md:text-6xl font-bold"
        >
          <h1>
            Your Long Links,
            <span
              class="text-transparent bg-gradient-to-r from-[#D247BF] to-primary bg-clip-text"
              >Shortened
            </span>
            with Style.
          </h1>
        </div>

        <p class="max-w-screen-sm mx-auto text-xl text-muted-foreground">
            Welcome to Linkzy, the ultimate tool for shortening your URLs and making them shareable and manageable! 🚀
        </p>

        <div class="space-y-4 md:space-y-0 md:space-x-4">
          <Button class="w-5/6 md:w-1/4 font-bold group/arrow">
            Get Started
            <ArrowRight
              class="size-5 ml-2 group-hover/arrow:translate-x-1 transition-transform"
            />
          </Button>

          <Button
            as-child
            variant="secondary"
            class="w-5/6 md:w-1/4 font-bold"
          >
            <a
              href="#pricing"
              >Explore Plans</a
            >
          </Button>
        </div>
      </div>

      <div class="relative group mt-14">

      </div>
    </div>
  </section>
</template>

