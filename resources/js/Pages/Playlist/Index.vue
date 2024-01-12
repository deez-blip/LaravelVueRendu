<template>
    <MusicLayout>
        <template #title>
            <div>
                Playlists
            </div>
        </template>

        <template #action>
            <Link 
            v-if="$page.props.isAdmin"
            :href="route('playlists.create')">
            creer une playlist
            </Link>
        </template>
        <template #content>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Nombre de musiques</th>
                        <th>Crée le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody
                    v-for="(playlist, i) in playlists"
                    :key="playlist.uuid"
                >
                    <td>{{ i + 1 }}</td>
                    <td>{{ playlist.title }}</td>
                    <td>{{ playlist.tracks_count }}</td>
                    <td>{{ playlist.created_at }}</td>
                    <td>
                        <Link
                        :href="route('playlists.show', {playlist: playlist})"
                        class="bg-blue-500 hover:bg-nlue-800 text-white font-bold">
                        Show
                        </Link>
                    </td>
                </tbody>
            </table>
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