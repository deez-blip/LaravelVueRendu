<template>
    <MusicLayout>
        <template #title>
            ApiKeys
        </template>

        <template #action>
            <Link :href="route('apikeys.create')">
                Créer une clef API
            </Link>
        </template>
        <template #content>
            <ul class="list-none grid grid-cols-1 md:grid-cols-4 gap-4 p-4">
                <li v-for="apikey in apikeys" 
                    :key="apikey.uuid" >
                    Nom: {{ apikey.name }}
                    Clef: {{ apikey.key }}
                    <Link 
                    :href="route('apikeys.destroy', { apikey: apikey.id })" method="delete" as="button"
                    >
                    delete
                    </Link>
                </li>
            </ul>
            {{ apikeys }}
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
        apikeys: Array
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