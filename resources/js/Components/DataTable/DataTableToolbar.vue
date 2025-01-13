<script setup lang="ts">
import type { Table } from "@tanstack/vue-table";
import type { Link } from "@/types";
import { Button } from "@/Components/ui/button";

import { Input } from "@/Components/ui/input";
import { Cross } from "lucide-vue-next";
import { computed } from "vue";
import DataTableFacetedFilter from "./DataTableFacetedFilter.vue";
import DataTableViewOptions from "./DataTableViewOptions.vue";

interface DataTableToolbarProps {
    table: Table<Link>;
}

const statuses = [
    {
        label: "Active",
        value: "active",
    },
    {
        label: "Drafted",
        value: "drafted",
    },
];

const props = defineProps<DataTableToolbarProps>();

const isFiltered = computed(
    () => props.table.getState().columnFilters.length > 0
);
</script>

<template>
    <div class="flex items-center justify-between">
        <div class="flex flex-1 items-center space-x-2">
            <Input
                placeholder="Filter tasks..."
                :model-value="(table.getColumn('title')?.getFilterValue() as string) ?? ''"
                class="h-8 w-[150px] lg:w-[250px]"
                @input="
                    table
                        .getColumn('title')
                        ?.setFilterValue($event.target.value)
                "
            />
            <DataTableFacetedFilter
                v-if="table.getColumn('status')"
                :column="table.getColumn('status')"
                title="Status"
                :options="statuses"
            />

            <Button
                v-if="isFiltered"
                variant="ghost"
                class="h-8 px-2 lg:px-3"
                @click="table.resetColumnFilters()"
            >
                Reset
                <Cross class="ml-2 h-4 w-4" />
            </Button>
        </div>
        <DataTableViewOptions :table="table" />
    </div>
</template>
