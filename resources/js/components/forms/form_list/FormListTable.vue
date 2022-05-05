<template>
  <v-container>
      {{forms}}
    <v-data-table
      :headers="formListTableHeader"
      :items="getFormList"
      sort-by="calories"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="info" dark>
          <v-toolbar-title>List of forms</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="100%">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                New Item
              </v-btn>
            </template>
            <v-card>
                 <v-toolbar color="primary" dark>
                  <span class="text-h5">{{ formTitle }}</span>
                </v-toolbar>

              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="12" md="16">
                      <v-text-field
                        v-model="editedItem.form_name"
                        label="Form Name"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="16">
                      <v-text-field
                        v-model="editedItem.form_category"
                        label="Form Category"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">
                  Cancel
                </v-btn>
                <v-btn color="blue darken-1" text @click="save"> Save </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h5"
                >Are you sure you want to delete this item?</v-card-title
              >
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete"
                  >Cancel</v-btn
                >
                <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                  >OK</v-btn
                >
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="initialize"> Reset </v-btn>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    dialog: false,
    dialogDelete: false,
    formListTableHeader: [
      {
        text: "Name",
        align: "start",
        sortable: false,
        value: "form_name",
      },
      { text: "Category", value: "form_category" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    forms: [],
    editedIndex: -1,
    editedItem: {
      form_name: "",
      form_category:"",
      form_id:null,
    },
    defaultItem: {
      form_name: "",
      form_category:"",
      form_id:null,
    },
  }),

  computed: {
    getFormList() {
      return this.$store.state.forms.form_list;
    },
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    initialize() {
      this.forms = this.getFormList
    },

    editItem(item) {
        this.$router.push({name: 'formbuilder', params: {id: item.form_id}})
    },

    deleteItem(item) {
      this.editedIndex = this.getFormList.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      this.getFormList.splice(this.editedIndex, 1);
      this.closeDelete();
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.getFormList[this.editedIndex], this.editedItem);
      } else {
        /* this.getFormList.push(this.editedItem); */
        this.$store.dispatch("addForm",this.editedItem)
      }
      this.close();
    },
  },
};
</script>
