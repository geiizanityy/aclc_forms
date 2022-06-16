<template>
  <v-container>
    <v-data-table
      :headers="formListTableHeader"
      :items="getSubjectContentList"
      sort-by="calories"
      class="elevation-1 text-uppercase"
      dense
    >
      <template v-slot:top>
        <v-toolbar flat color="info" dark>
          <v-toolbar-title>
            <v-icon>mdi-table-of-contents</v-icon>Contents</v-toolbar-title
          >
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>

          <!-- CREATE DIALOG -->
          <v-dialog v-model="dialog" max-width="80%">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="error" dark class="mb-2" v-bind="attrs" v-on="on">
                Create Content
                <v-icon size="18">mdi-plus-box</v-icon>
              </v-btn>
            </template>
            <v-card>
              <v-toolbar color="primary" dark>
                <span class="text-h5">{{ formTitle }}</span>
              </v-toolbar>

              <v-card-text>
                <v-container class="mt-5">
                  <v-row>
                    <v-col cols="12" sm="12" md="16">
                      <v-text-field
                        :value="getSelectedSubject.course"
                        disabled
                        outlined
                        dense
                        prepend-inner-icon="mdi-information-outline"
                      ></v-text-field>
                      <v-text-field
                        v-model="editedItem.topic_no"
                        label="Topic No."
                        outlined
                        dense
                        prepend-inner-icon="mdi-information-outline"
                      ></v-text-field>

                      <v-textarea
                        v-model="editedItem.topic_desc"
                        prepend-inner-icon="mdi-text"
                        filled
                        name="input-7-4"
                        label="Topic Description"
                        dense
                      >
                      </v-textarea>
                      <v-row>
                        <v-col md="6">
                          <v-text-field
                            v-model="editedItem.topic_slug"
                            label="Slug"
                            dense
                            outlined
                            prepend-inner-icon="mdi-information-outline"
                          ></v-text-field>
                        </v-col>
                        <v-col md="6">
                          <v-select
                            v-model="editedItem.topic_type"
                            dense
                            label="Topic Type"
                            outlined
                            prepend-inner-icon="mdi-format-list-checkbox"
                            :items="topicTypeItems"
                            :value="topicTypeItems"
                          >
                          </v-select>
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="default" @click="close"> Cancel </v-btn>
                <v-btn color="success" @click="save"
                  ><v-icon>mdi-content-save</v-icon> Save
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>

          <!-- DELETE CONFIRMATION DIALOG -->
          <v-dialog
            v-model="dialogDelete"
            max-width="600px"
            class="text-uppercase"
          >
            <v-toolbar color="error" dark>
              <v-icon>mdi-alert</v-icon
              ><span class="text-h5">Confirmation</span>
            </v-toolbar>
            <v-card>
              <v-card-title class="text-h6"
                >Are you sure you want to delete this item?</v-card-title
              >
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="default" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="error" @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>

      <template v-slot:item.actions="{ item }">
        <v-menu transition="slide-y-transition" bottom offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-icon v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
          </template>

          <v-list class="text-uppercase">
            <v-list-item link>
              <v-list-item-title @click="viewContent(item)">
                <v-icon size="18" color="success"> mdi-eye </v-icon
                ><span class="button-span"> View</span>
              </v-list-item-title>
            </v-list-item>
            <v-list-item link>
              <v-list-item-title @click="editContent(item)">
                <v-icon size="18" color="info"> mdi-pencil </v-icon>
                <span class="button-span"> Edit</span>
              </v-list-item-title>
            </v-list-item>
            <v-list-item link>
              <v-list-item-title @click="deleteItem(item)">
                <v-icon size="18" color="error"> mdi-delete </v-icon>
                <span class="button-span"> Delete</span>
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    dialog: false,
    dialogDelete: false,
    topicTypeItems: ["Discussion", "Assesment"],
    formListTableHeader: [
      {
        text: "Course",
        align: "start",
        sortable: false,
        value: "course",
      },
      /* { text: "Content_id", value: "subjectcontent_id", sortable: false }, */
      { text: "Topic No", value: "topic_no", sortable: false },
      { text: "Topic Description", value: "topic_desc", sortable: false },
      { text: "Type", value: "topic_type", sortable: false },
      { text: "Actions", value: "actions", sortable: false },
    ],
    forms: [],
    editedIndex: -1,
    editedItem: {
      subject_id: null,
      course_name: "Course Name",
      topic_no: "",
      topic_desc: "",
      topic_slug: "",
      topic_status: "Incomplete",
      topic_type: "",
    },
    defaultItem: {
      subject_id: null,
      course: "Course Name",
      form_name: "",
      topic_no: "",
      topic_desc: "",
      topic_slug: "",
      topic_status: "Incomplete",
      topic_type: "",
    },
  }),

  computed: {
    getSubjectContentList() {
      return this.$store.state.subject_contents.contents;
    },
    getSelectedSubject() {
      return this.$store.state.subjects.selected_subject;
    },
    subjectInfo() {
      const storage = localStorage.getItem("vuex", "subject_contents");
      return JSON.parse(storage);
    },
    formTitle() {
      return this.editedIndex === -1 ? "New Content" : "Edit Information";
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
      this.forms = this.getSubjectContentList;
    },

    viewContent(item) {
      this.$router.push({
        name: "subjectconent",
        query: {
          subjectcontent_id: item.id,
        },
      });
    },

    editContent(item) {
      this.$router.push({
        name: "editcontent",
        query: {
          subjectcontent_id: item.id,
        },
      });
    },

    deleteItem(item) {
      this.editedIndex = this.getSubjectContentList.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      this.getSubjectContentList.splice(this.editedIndex, 1);
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
      this.editedItem.subject_id = parseInt(this.$route.params.subject_id);
      if (this.editedIndex > -1) {
        Object.assign(
          this.getSubjectContentList[this.editedIndex],
          this.editedItem
        );
      } else {
        this.$store.dispatch("addContent", this.editedItem);
      }
      this.close();
    },
  },
};
</script>
<style scoped>
.button-span {
  font-size: 12px;
}
</style>
