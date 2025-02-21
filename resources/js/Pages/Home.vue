<script setup lang="ts">
import { ref } from "vue";
import Navbar from "@/Components/Navbar.vue";
import {
    Accordion,
    AccordionItem,
    AccordionTrigger,
    AccordionContent,
} from "@/Components/ui/accordion";

const qaList = ref([
    {
        question:
            "Quel est le rôle des files d'attente et du traitement en arrière-plan dans les applications Laravel ?",
        answer: "Les files d'attente permettent de gérer les tâches en arrière-plan pour améliorer le performances de l'application.",
    },
    {
        question:
            "Comment configureriez-vous et géreriez-vous les files d'attente pour le traitement des tâches chronophages ?",
        answer: "Utilisez Laravel Queue avec un driver comme Redis, configurez `queue:work` et utilisez des jobs bien structurés avec `dispatch()`.",
    },
    {
        question:
            "Quels sont les avantages de l’utilisation de files d’attente par rapport au traitement synchrone ?",
        answer: "Les files d'attente réduisent le temps d'attente des requêtes,au lieu qu'un utilisateur attende une tâche coûteuse, à l'aide des files d'attente, elle est exécutée en arrière-plan, améliorent la scalabilité et permettent une meilleure gestion des ressources serveur.",
    },
    {
        question:
            "Expliquer le cycle de vie d'exécution d'une classe de travail dans un contexte Laravel.",
        answer: "Un job est dispatché, placé dans une file, récupéré par un worker, exécuté, puis supprimé ou réessayé en cas d'erreur.",
    },
    {
        question:
            "Quelle est la meilleure façon de récupérer une grande quantité d'enregistrements avec Eloquent ?",
        answer: "Utilisez `chunk()` ou `cursor()` pour éviter de charger toute la base en mémoire et améliorer les performances.",
    },
    {
        question:
            "Parlez-moi du projet le plus important sur lequel vous avez travaillé.",
        answer: "Je pense que le projet qui me tient le plus à cœur est un projet que j'ai réalisé avec un collègue lorsque je travaillais chez Pulse. Ce qui le rend spécial, c'est que j'ai travaillé dessus à plus de 65 %, car mon collègue avait d'autres projets à gérer. Nous plaisantions souvent (à moitié sérieusement) en disant que c'était - mon bébé -. Ce fut une expérience à la fois amusante, intense et terrifiante. J'ai beaucoup appris, notamment sur Laravel, Livewire, Vite, etc..",
    },
    {
        question: "Travaillez-vous avec une automatisation des tests ?",
        answer: "Oui bien sure, en utilisant PHPUnit et Pest pour les tests unitaires et fonctionnels.",
    },
]);
</script>

<template>
    <Navbar />
    <div class="px-8 py-5">
        <h1 class="text-2xl font-bold mb-4">Q A:</h1>

        <Accordion
            type="single"
            class="w-full"
            collapsible
            :default-value="defaultValue"
        >
            <AccordionItem
                v-for="item in qaList"
                :key="item.question"
                :value="item.answer"
            >
                <AccordionTrigger>{{ item.question }}</AccordionTrigger>
                <AccordionContent>
                    {{ item.answer }}
                </AccordionContent>
            </AccordionItem>
        </Accordion>
    </div>
</template>
