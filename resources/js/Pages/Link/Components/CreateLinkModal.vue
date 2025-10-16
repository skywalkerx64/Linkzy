<script setup lang="ts">
import { Button } from '@/Components/ui/button'
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@/Components/ui/form'
import { useForm } from '@inertiajs/vue3';

import { Input } from '@/Components/ui/input'
import { h, ref } from 'vue'

const isLinkValid = ref(null)

const createLinkForm = useForm({
  original_url: '',
})

function onSubmit(values: any) {
  createLinkForm.post(route('links.store'), {
    onSuccess: () => {
      createLinkForm.reset()
    },
  });
}
</script>

<template>
  <Form v-slot="{ handleSubmit }">
    <Dialog>
      <DialogTrigger as-child>
        <Button>
          Create Link
        </Button>
      </DialogTrigger>
      <DialogContent class="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>Create Link</DialogTitle>
          <DialogDescription>
            Make changes to your profile here. Click save when you're done.
          </DialogDescription>
        </DialogHeader>

        <form id="dialogForm" @submit="handleSubmit($event, onSubmit)">
          <FormField name="url">
            <FormItem>
              <FormLabel>URL</FormLabel>
              <FormControl>
                <Input type="text" v-model="createLinkForm.original_url" placeholder="https://example.com/my-very-long-link"/>

              </FormControl>
              <FormDescription>
                Paste your link here
              </FormDescription>
              <FormMessage />
            </FormItem>
          </FormField>
        </form>

        <DialogFooter>
          <Button type="submit" form="dialogForm">
            Save changes
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </Form>
</template>
