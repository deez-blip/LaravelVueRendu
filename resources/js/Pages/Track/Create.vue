<template>
    <MusicLayout>
        <template #title>
            Créer une musique
        </template>

        <template #action>
            <Link :href="route('tracks.index')">
            Retour
            </Link>
        </template>

        <template #content>
            <form action="" class="max-w-lg mx-auto p-4 shadow-md rounded" @submit.prevent="submitForm">

                <!-- TITRE -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre :</label>
                    <input type="text" v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.title }">
                </div>

                <!-- Artiste -->
                <div class="mb-4">
                    <label for="artist" class="block text-gray-700 text-sm font-bold mb-2">Artiste :</label>
                    <input type="text" v-model="form.artist"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.artist }">
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Miniature :</label>
                    <input type="file" @input="form.image = $event.target.files[0]" name="image" id="image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.image }">
                </div>

                <!-- Audio -->
                <div class="mb-4">
                    <label for="music" class="block text-gray-700 text-sm font-bold mb-2">Audio :</label>
                    <input type="file" @input="form.music = $event.target.files[0]" name="music" id="music"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-800': form.errors.music }">
                </div>

                <!-- <div class="mb-4">
                    {{ form }}
                </div> -->

                <!-- Afficher -->
                <div class="mb-4">
                    <label for="display">Afficher</label>

                    <select name="display" id="display" v-model="form.display">
                        <option :value="true">Oui</option>
                        <option :value="false">Non</option>
                    </select>
                </div>

                <div class="mb-4">
                    <input type="submit" value="Envoyer"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
            </form>

            <div class="max-w-lg mx-auto p-4">
                <span class="font-bold">Titre :</span> {{ form.title }} /
                <span class="font-bold">Artiste :</span> {{ form.artist }}
            </div>

        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
export default {
    components: {
        MusicLayout,
    },
    data() {
        return {
            test: '',
            form: this.$inertia.form({
                title: '',
                artist: '',
                image: null,
                music: null,
                display: true
            })
        }
    },
    methods: {
        submitForm() {
            this.form.post(route('tracks.store'), {
            });
        }
    }
}
</script>