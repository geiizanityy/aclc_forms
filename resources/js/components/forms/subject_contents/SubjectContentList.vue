<template>

<v-container>
    <h1 class="text-uppercase"><v-icon>mdi-bookmark-outline</v-icon> {{subjectInfo.subject_name}}</h1>
    <subject-content-table></subject-content-table>
</v-container>


</template>

<script>
import SubjectContentTable from './SubjectContentTable.vue'
export default {
    components:{SubjectContentTable},
    computed:{

    },
    computed:{
        subjectInfo() {
            return this.$store.state.subjects.selected_subject
        }
    },
    created() {
        this.$store.dispatch("getTeacherSubjects",3)
        this.$store.dispatch("getSelectedSubject",this.$route.params.subject_id)
    }
}
</script>
