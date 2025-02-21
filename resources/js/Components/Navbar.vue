<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import {
    NavigationMenu,
    NavigationMenuList,
    NavigationMenuItem,
} from "@/Components/ui/navigation-menu";
import ModeToggle from './ModeToggle.vue';
</script>

<template>
    <nav
        class="w-full p-4 border-b border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900"
    >
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                Test de Recrutement
            </h1>

            <NavigationMenu>
                <NavigationMenuList class="flex space-x-8">
                    <NavigationMenuItem>
                        <Link
                            href="/"
                            class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400"
                            >Home</Link
                        >
                    </NavigationMenuItem>
                    <NavigationMenuItem>
                        <Link
                            href="/calculator"
                            class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400"
                            >Calculator</Link
                        >
                    </NavigationMenuItem>
                    <NavigationMenuItem>
                        <ModeToggle />
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>
        </div>
    </nav>
</template>
