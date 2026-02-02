<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
import EyeIcon from "@/Components/Icons/EyeIcon.vue";

defineProps({
    workout: Object
})

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ workout.name }}
                </h2>
                <span class="text-sm text-gray-500 font-medium">
                    {{ formatDate(workout.created_at) }}
                </span>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="space-y-6">
                    <div
                        v-for="exercise in workout.workout_exercises"
                        :key="exercise.id"
                        class="overflow-hidden bg-white shadow-sm border border-gray-100 sm:rounded-xl p-6 transition hover:shadow-md"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">
                                {{ exercise.exercise?.name || 'Exercise' }}
                            </h3>
                            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600 bg-blue-50 px-2 py-1 rounded">
                                {{ exercise.sets.length }} Sets
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div
                                v-for="(set, index) in exercise.sets"
                                :key="set.id"
                                class="flex items-center justify-between p-3 rounded-lg bg-gray-50 border border-gray-100"
                            >
                                <span class="text-xs font-bold text-gray-400 uppercase">Set {{ index + 1 }}</span>
                                <div class="text-right">
                                    <span class="font-bold text-gray-800">{{ set.weight }} <small class="text-gray-400 font-normal">kg</small></span>
                                    <span class="mx-2 text-gray-300">×</span>
                                    <span class="font-bold text-blue-600">{{ set.reps }} <small class="text-gray-400 font-normal">reps</small></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="workout.workout_exercises.length === 0" class="text-center py-10 bg-white rounded-xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400">No exercises recorded for this workout.</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
