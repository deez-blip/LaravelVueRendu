<template>
    <li class="bg-white shadow hover:bg-gray-100 rounded p-4 transition-colors duration-300 ease-in-out"
        :class="{ 'border-blue-500 border-2 border-solid': active }">
        <div>
            <img :src="`/storage/${track.image}`" alt="aaa">
        </div>
        <div class="text-gray-700 font-semibold">Artist : {{ track.artist }}</div>
        <div class="text-gray-600">Titre : {{ track.title }}</div>
        <button @click="handleClick">
            Lire
        </button>
        <div class="w-full flex justify-between">
            <Link v-if="$page.props.isAdmin"
            :href="route('tracks.edit', { track: track })"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                as="button">
            Modifier
            </Link>
            <Link v-if="$page.props.isAdmin"
            :href="route('tracks.destroy', { track: track })" method="delete"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                as="button">
            Delete
            </Link>
        </div>
    </li>
</template>


<script>
export default {
    emits: ['played'],
    props: {
        track: Object,
        currentTrack: String,
        active: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        handleClick() {
            this.$emit('played', this.track)
        }
    }
}
</script>