<template>
    <MusicLayout>
        <template #title>
            <div>
                Ma Playlist
            </div>
        </template>

        <template #action>
            <Link 
            v-if="$page.props.isAdmin"
            :href="route('playlists.index')">
            retour
            </Link>
        </template>
        <template #content>
            <ul class="list-none grid grid-cols-1 md:grid-cols-4 gap-4 p-4">
                <TrackCard 
                    v-for="track in playlist.tracks" 
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
import TrackCard from '@/Components/Track/TrackCard.vue'

export default {
    components: {
        MusicLayout,
    },
    props: {
        playlist: Object
    },
    data() {
        return {
            'search': '',
            'audio': null,
            'currentTrack': null
        }
    }
}
</script>

<script setup>
import TrackCard from '@/Components/Track/TrackCard.vue'
</script>