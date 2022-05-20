<template>

<v-container>
    <form-list-table></form-list-table>
</v-container>


</template>

<script>
import FormListTable from './FormListTable.vue'
export default {
    components:{FormListTable},
    created() {
        this.$store.dispatch("getFormList")
    }
}
</script>
