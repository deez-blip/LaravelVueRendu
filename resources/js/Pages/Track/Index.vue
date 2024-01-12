<template>
    <MusicLayout>
        <template #title>
            <div>
                Musiques
            </div>
        </template>

        <template #action>
            <Link 
            v-if="$page.props.isAdmin"
            :href="route('tracks.create')">
            creer une musique
            </Link>
        </template>
        <template #content>
            <div class="search-div p-4 bg-gray-100 rounded-lg shadow mb-4">
                <label for="search" class="block text-gray-700 font-semibold mb-2">Filtres</label>
                <input type="search" name="search" id="search" v-model="search"
                    class="w-full p-2 border rounded focus:outline-none focus:shadow-outline">
            </div>

            <ul class="list-none grid grid-cols-1 md:grid-cols-4 gap-4 p-4">
                <TrackCard 
                    v-for="track in filteredTracks" 
                    :key="track.uuid"
                    :track="track" 
                    :active="currentTrack === track.uuid"
                    @played="play"
                />
            </ul>
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
            'search': '',
            'audio': null,
            'currentTrack': null
        }
    },
    computed: {
        filteredTracks() {
            return this.tracks.filter(track => track.title.toLowerCase().includes(this.search.toLowerCase()) || track.artist.toLowerCase().includes(this.search.toLowerCase()));
        }
    },
    methods: {
        play(track) {
            const url = '/storage/' + track.music;

            if (!this.currentTrack) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else if (!this.audio.paused) {
                this.audio.pause();
            } else {
                this.audio.play();
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener('ended', () => this.currentTrack = null)
        }
    }
}
</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>