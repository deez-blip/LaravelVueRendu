<template>
    <MusicLayout>
        <template #title>
            <div>
                Playlists create
            </div>
        </template>

        <template #action>
            <Link v-if="$page.props.isAdmin" :href="route('tracks.index')">
            retour
            </Link>
        </template>
        <template #content>
            <p class="text-red-500">{{form.errors.tracks}}</p>
            <form @submit.prevent="submitForm">
                <!-- TITRE -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre :</label>
                    <input type="text" v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.title }">
                </div>

                <!-- TRACKS -->
                {{ form.tracks }}
                <div v-for="track in tracks" :key="track.uuid">
                    <input 
                        type="checkbox" 
                        name="tracks" 
                        :value="track.uuid"
                        :id="track.uuid"
                        v-model="form.tracks"
                    >
                    <label :for="track.uuid">
                        {{ track.title }}
                    </label>
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
        tracks: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                tracks: [],
            })
        }
    },
    methods: {
        submitForm() {
            this.form.post(route('playlists.store'), {
            });
        }
    }
}
</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>