<script setup lang="ts">
import { ref, computed } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";

import Toaster from '@/Components/ui/toast/Toaster.vue'
import { useToast } from "@/Components/ui/toast/use-toast";

import { useDark } from "@vueuse/core";
import Navbar from "@/Components/Navbar.vue";

import { Input } from '@/Components/ui/input'
import { Label } from '@/Components/ui/label'
import { Button } from '@/Components/ui/button'

import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/Components/ui/card'

import {
  Select,
  SelectContent,
  SelectTrigger,
  SelectItem,
  SelectValue,
} from '@/Components/ui/select'

import {
  Table,
  TableCaption,
  TableHeader,
  TableBody,
  TableCell,
  TableHead,
  TableRow,
} from '@/Components/ui/table'
import { Calculation } from "@/types";

const props = defineProps<{
  history: Calculation[];
  operations: string[];
}>();

const page = usePage<{ history: Calculation[]; operations: string[] }>();
const history = ref<Calculation[]>(page.props.history);
const operations = ref<string[]>(page.props.operations);

const form = useForm({
  leftOperand: 0,
  rightOperand: 0,
  operation: operations.value[0],
});

const { toast } = useToast();

const submit = () => {
  form.post("/process", {
    onSuccess: () => {
      history.value = page.props.history;
      form.reset();
      toast({
        title: "Calculation Successful",
        description: "The calculation was successful.",
      });
    },
    onError: () => {
      toast({
        title: "Calculation Failed",
        description: "cant devide by 0",
        variant: "destructive",
      });
    },
  })
}

const isDark = useDark();
const variant = computed(() => (isDark.value ? "primary" : "secondary")); 
</script>

<template>
  <Navbar />
  <Toaster class="mt-3" />
  <div class="max-w-5xl mx-auto mt-6 md:flex gap-10">
    <!-- Calculator Section -->
    <Card class="w-full">
      <CardHeader>
        <CardTitle>Calculator</CardTitle>
        <CardDescription>Simple Calculator for 2 operands.</CardDescription>
      </CardHeader>
      <CardContent>
        <form>
          <div class="grid items-center w-full gap-4">
            <div class="flex flex-col space-y-1.5">
              <Label class="block text-gray-700">First Number</Label>
              <Input v-model.number="form.leftOperand" type="number" class="w-full p-2 border rounded" required />
            </div>
            <div class="flex flex-col space-y-1.5">
              <Label for="operation">operation</Label>
              <Select v-model="form.operation">
                <SelectTrigger id="operation">
                  <SelectValue>{{ form.operation }}</SelectValue>
                </SelectTrigger>
                <SelectContent position="popper">
                  <SelectItem v-for="operation in operations" :value="operation">
                    {{ operation }}
                  </SelectItem>
                </SelectContent>
              </Select>
            </div>
            <div class="flex flex-col space-y-1.5">
              <Label class="block text-gray-700">Second Number</Label>
              <Input v-model.number="form.rightOperand" type="number" class="w-full p-2 border rounded" required />
            </div>
          </div>
        </form>
      </CardContent>
      <CardFooter class="flex justify-between px-6 pb-6">
        <Button :variant="variant" @click="submit"> Calculate </Button>
      </CardFooter>
    </Card>

    <!-- History Section -->
    <Table>
      <TableCaption class="font-bold text-lg">A list of recent calculations.</TableCaption>
      <TableHeader>
        <TableRow>
          <TableHead>Left Operand</TableHead>
          <TableHead>Operation</TableHead>
          <TableHead>Right Operand</TableHead>
          <TableHead>Result</TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        <TableRow v-for="entry in history" :key="entry.id">
          <TableCell>{{ entry.left_operand }}</TableCell>
          <TableCell class="font-bonld">{{ entry.operation }}</TableCell>
          <TableCell>{{ entry.right_operand }}</TableCell>
          <TableCell>{{ entry.result }}</TableCell>
        </TableRow>
      </TableBody>
    </Table>

  </div>
</template>
