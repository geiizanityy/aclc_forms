<template>
  <v-container>
    <v-row>
      <h1 class="text-uppercase">
        <v-icon size="40">mdi-bookmark-outline</v-icon> Subjects
      </h1>
      <v-col
        cols="12"
        md="4"
        sm="6"
        v-for="(item, i) in fetchTeacherSubject"
        :key="i"
      >
        <v-card width="450" class="text-uppercase">
          <v-img
            height="200px"
            src="http://localhost:8000/images/bg4.jpg"
            class="subject-banner"
          >

            <v-app-bar flat color="rgba(0, 0, 0, 0)">
              <v-app-bar-nav-icon color="white"></v-app-bar-nav-icon>

              <router-link :to="item.link">
                <span class="text-h5 text-white"> {{ item.course }}</span>
              </router-link>

              <v-spacer></v-spacer>

              <v-btn color="white" icon>
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </v-app-bar>
            <div class="ma-4">
              <h6 class="text-white">{{ item.subject_code }}</h6>
            </div>

            <v-card-title class="white--text mt-8 justify-center">
              <v-avatar size="56">
                <img
                  alt="user"
                  src="http://localhost:8000/images/usericon.png"
                />
              </v-avatar>
            </v-card-title>
          </v-img>

          <v-card-text>
            <div class="font-weight-bold"></div>
            <v-list-item>
              <v-list-item-content>
                <v-list-item-title>Course </v-list-item-title>
                <v-list-item-subtitle>
                    <h6>{{item.course}}</h6>
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>

            <v-list-item two-line>
              <v-list-item-content>
                <v-list-item-title>Description</v-list-item-title>
                <v-list-item-subtitle><h6>{{item.subject_description}}</h6></v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>

            <v-list-item three-line>
              <v-list-item-content>
                <v-list-item-title>Teacher</v-list-item-title>
                <v-list-item-subtitle>
                  <h6>{{item.teacher_lname}} {{item.teacher_suffix}}, {{item.teacher_fname}} {{item.teacher_mname}}</h6>
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>


          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      disabled: false,
      readonly: false,
      link: {
        name: "subjectcontents",
        params: {
          subject_id: 1,
        },
      },
    };
  },
  computed: {
    fetchTeacherSubject() {
      const subject = this.$store.state.subjects.teacher_subjects;
      subject.forEach((element, index) => {
        element.link = {
          name: "subjectcontents",
          params: {
            subject_id: subject[index].id,
          },
        };
      });
      return subject;
    },
  },
  methods: {
    redirectSubjectContents(id) {
      this.$router.push({
        name: "subjectcontents",
        params: {
          subject_id: id,
        },
      });
    },
  },
  mounted() {
    this.$store.dispatch("getTeacherSubjects", 'e675a345');
  }
};
</script>
<style scoped>
.subject-banner {
  width: 100%;
  height: 100%;
  object-fit: contain;
}
</style>
