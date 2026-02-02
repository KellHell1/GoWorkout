<script setup>
import {Head, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EyeIcon from '@/Components/Icons/EyeIcon.vue';

defineProps({
    workouts: Array
});

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        month: 'short',
        day: 'numeric',
        year: 'numeric'
    });
};
</script>

<template>
    <Head title="Workouts" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Workouts
            </h2>
        </template>

        <div class="max-w-4xl mx-auto p-6">

<!--        Create New Workout-->
<!--            <div class="flex justify-between items-center mb-6">-->
<!--                <h1 class="text-2xl font-bold">My Workouts</h1>-->
<!--                <Link href="/workouts/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg">-->
<!--                    New Workout-->
<!--                </Link>-->
<!--            </div>-->

<!--        If workouts empty -->
            <div v-if="workouts.length === 0" class="text-center py-10 bg-gray-50 rounded">
                <p class="text-gray-500">No workouts found. Time to hit the gym!</p>
            </div>

<!--        Workouts List-->
            <div class="grid gap-4">
                <div v-for="workout in workouts" :key="workout.id" class="border p-4 rounded-xl hover:bg-gray-50 transition shadow-sm bg-white">
                    <div class="flex justify-between items-start">



                        <div>
                            <h2 class="font-bold text-lg text-blue-700">
                                {{ workout.name || 'Unnamed Workout' }}
                            </h2>
                            <p class="text-sm text-gray-500">{{ formatDate(workout.created_at) }}</p>
                        </div>

                        <div class="text-right">
                        <span class="text-xs font-medium bg-gray-100 px-2 py-1 rounded">
                            {{ workout.workout_exercises_count }} exercises
                        </span>

                            <Link
                                :href="route('workouts.show', workout.id)"
                                class="text-gray-400 hover:text-blue-600 p-2 hover:bg-blue-50 rounded-full transition-all"
                            >
                                <EyeIcon /> </Link>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
