<template>

<v-container>
    <h1 class="text-uppercase"><v-icon size="40">mdi-bookmark-outline</v-icon> {{subjectInfo.subject_name}}</h1>
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
    async created() {
        this.$store.dispatch("getTeacherSubjects",3)
        this.$store.dispatch("getSubjectList")
        this.$store.dispatch("getSubjectContentsList")
        this.$store.dispatch("getSelectedSubject",this.$route.params.subject_id)
        this.$store.dispatch("getSubjectContents",this.$route.params.subject_id)
    }
}
</script>
