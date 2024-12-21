<script setup lang="ts">
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from "@/Components/ui/accordion";

interface FAQProps {
    question: string;
    answer: string;
    id: number;
}

const FAQList: FAQProps[] = [
    {
        id: 1,
        question: "What is Linkzy?",
        answer: "Linkzy is a tool that helps you shorten long URLs, track their performance, and customize them for better branding.",
    },
    {
        id: 2,
        question: "Is Linkzy free to use?",
        answer: "Yes, Linkzy offers a free plan with basic features. We also have premium plans with advanced features like analytics and custom domains.",
    },
    {
        id: 3,
        question: "How do I shorten a URL?",
        answer: "Simply paste your long URL into the input field on our homepage or app, and click 'Shorten'. You'll instantly get a compact link to share.",
    },
    {
        id: 4,
        question: "Can I customize my shortened URLs?",
        answer: "Yes, you can create custom aliases for your shortened links, making them more memorable and branded.",
    },
    {
        id: 5,
        question: "Does Linkzy offer analytics for my links?",
        answer: "Absolutely! You can track clicks, geographic data, device types, and more through our analytics dashboard.",
    },
    // {
    //     id: 6,
    //     question: "Is Linkzy secure?",
    //     answer: "Yes, we prioritize user privacy and ensure secure handling of your URLs and data.",
    // },
    // {
    //     id: 7,
    //     question: "Can I integrate Linkzy into my application?",
    //     answer: "Yes, we provide an API for developers to integrate Linkzy's URL shortening and analytics into their own applications.",
    // },
    // {
    //     id: 8,
    //     question: "What happens if someone accesses an expired link?",
    //     answer: "If a link expires, users will be redirected to a customizable error page or the default error message.",
    // },
    // {
    //     id: 9,
    //     question: "Do you offer support for custom domains?",
    //     answer: "Yes, premium users can use their own domains for shortened links to maintain consistent branding.",
    // },
    // {
    //     id: 10,
    //     question: "How do I contact support?",
    //     answer: "You can reach out to us through our support page or email us at support@linkzy.io.",
    // },
];
</script>

<template>
    <section id="faq" class="container md:w-[700px] py-20 sm:py-24">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl text-center font-bold">
                Common Questions
            </h2>
        </div>

        <Accordion type="single" collapsible class="AccordionRoot">
            <AccordionItem
                v-for="{ question, answer, id } in FAQList"
                :key="id"
                :value="id.toString()"
            >
                <AccordionTrigger class="text-left">
                    {{ question }}
                </AccordionTrigger>

                <AccordionContent>{{ answer }}</AccordionContent>
            </AccordionItem>
        </Accordion>

        <h3 class="font-medium mt-4">
            Still have questions?
            <span href="#" class="text-muted-foreground">
                <a href="#" class="underline">Contact us</a>
            </span>
        </h3>
    </section>
</template>
