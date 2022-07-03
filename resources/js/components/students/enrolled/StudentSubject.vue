<template>
  <v-container fluid>
    <v-row>
      <v-container fluid>
        <v-row justify="space-around">
          <v-card>
            <v-img
              height="250"

              src="http://localhost:8000/images/bg4.jpg"
            >
              <v-app-bar flat color="rgba(0, 0, 0, 0)">
                <v-app-bar-nav-icon color="white"></v-app-bar-nav-icon>

                <v-toolbar-title class="text-h6 white--text pl-0">
                  I.T MAJOR 1
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn color="white" icon>
                  <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
              </v-app-bar>
            </v-img>
            <tab :tabproperty="tabproperty"></tab>
          </v-card>
        </v-row>
      </v-container>
    </v-row>
  </v-container>
</template>
<script>
import Tab from "./Tab.vue";
import SubjectList from "./SubjectList.vue";
export default {
  components: {
    SubjectList,
    Tab,
  },
  data() {
    return {
      tabproperty: [
        {
          tabname: "Stream",
          tabicon: "mdi-bullhorn",
          href: "#tab-1",
          content: [
            {
              title: "title1",
            },
          ],
        },
        {
          tabname: "Classwork",
          tabicon: "mdi-google-classroom",
          href: "#tab-2",
          content: [
            {
              title: "title2",
            },
          ],
        },
        {
          tabname: "People",
          tabicon: "mdi-account-group-outline",
          href: "#tab-3",
          content: [
            {
              title: "title3",
            },
          ],
        },
      ],
    };
  },
};
</script>
