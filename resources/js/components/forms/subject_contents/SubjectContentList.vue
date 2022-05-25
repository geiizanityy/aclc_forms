<template>

<v-container>
    <subject-content-table></subject-content-table>
</v-container>


</template>

<script>
import SubjectContentTable from './SubjectContentTable.vue'
export default {
    components:{SubjectContentTable},
    created() {
        this.$store.dispatch("getSubjectContentsList")
    }
}
</script>
