<template>
<v-container>
    <h1>Subjects</h1>
    <v-row>
        <v-col cols="12" md="2" sm="4">
            <subject-list></subject-list>
        </v-col>
        <v-col cols="12" md="8" sm="10">
            Subject Table
        </v-col>
        <v-col cols="12" md="2" sm="4">
            Subject Info
        </v-col>
    </v-row>
</v-container>
</template>
<script>
import SubjectList from './SubjectList.vue'
export default {
    components:{
        SubjectList
    }
}
</script>
