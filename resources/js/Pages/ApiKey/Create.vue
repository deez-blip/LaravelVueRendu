<template>
    <MusicLayout>
        <template #title>
            Céer une clef API
        </template>

        <template #action>
            <Link :href="route('apikeys.index')">
                retour
            </Link>
        </template>
        <template #content>
            <form @submit.prevent="submitForm">
                <!-- Nom -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                    <input type="text" v-model="form.name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.name }">
                </div>
                <input type="submit" value="Envoyer"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </form>
        </template>

    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default {
    components: {
        MusicLayout,
    },
    props: {
        playlists: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                tracks: [],
            })
        }
    },
    methods: {
        submitForm() {
            this.form.post(route('apikeys.store'), {
            });
        }
    }
}
</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>