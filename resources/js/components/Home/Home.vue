<template>
  <v-container>
    <v-row justify="space-around">
      <v-col cols="12" md="4" sm="6" v-for="(item,i) in fetchTeacherSubject" :key="i">
        
        <v-card width="450" class="text-uppercase">
          <v-img
            height="200px"
            src="http://localhost:8000/images/bg4.jpg"
            class="subject-banner"
          >
            <v-app-bar flat color="rgba(0, 0, 0, 0)">
              <v-app-bar-nav-icon color="white"></v-app-bar-nav-icon>

              <router-link :to="item.link">
                <v-toolbar-title class="text-h5 white--text pl-0">
                  {{item.subject_name}}
                </v-toolbar-title>
              </router-link>

              <v-spacer></v-spacer>

              <v-btn color="white" icon>
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </v-app-bar>

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
            <v-expansion-panels focusable :disabled="disabled" multiple>
              <v-expansion-panel>
                <v-expansion-panel-header
                  >Subject Name:</v-expansion-panel-header
                >
                <v-expansion-panel-content> {{item.subject_name}} </v-expansion-panel-content>
              </v-expansion-panel>
              <v-expansion-panel>
                <v-expansion-panel-header
                  >Subject Code:</v-expansion-panel-header
                >
                <v-expansion-panel-content> {{item.subject_code}} </v-expansion-panel-content>
              </v-expansion-panel>
              <v-expansion-panel>
                <v-expansion-panel-header
                  >Course Name:</v-expansion-panel-header
                >
                <v-expansion-panel-content>
                  {{item.course}}
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-header>Teacher:</v-expansion-panel-header>
                <v-expansion-panel-content>
                  {{item.firstname}} {{item.lastname}}
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>

            <!-- <v-timeline
            align-top
            dense
          >
            <v-timeline-item
              v-for="message in messages"
              :key="message.time"
              :color="message.color"
              small
            >
              <div>
                <div class="font-weight-normal">
                  <strong>{{ message.from }}</strong> @{{ message.time }}
                </div>
                <div>{{ message.message }}</div>
              </div>
            </v-timeline-item>
          </v-timeline> -->
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
      link:{
        name:'subjectcontents',
        params:{
          subject_id:1
        }
      },
    };
  },
  computed:{
    fetchTeacherSubject() {
      const subject = this.$store.state.subjects.teacher_subjects
       subject.forEach((element,index) => {
          element.link = {
            name:'subjectcontents',
            params:{
              subject_id:subject[index].subject_id
            }
          }
       })
       return subject
    }
  
  },
  methods:{
    redirectSubjectContents(id) {
      this.$router.push(
        {
          name:'subjectcontents',
        params:{
          subject_id:id
        }
        })
        
    }
  },
  mounted() {
    this.$store.dispatch("getTeacherSubjects",3)
   
  }
  /* data: () => ({
      messages: [
        {
          from: 'You',
          message: `Sure, I'll see you later.`,
          time: '10:42am',
          color: 'deep-purple lighten-1',
        },
        {
          from: 'John Doe',
          message: 'Yeah, sure. Does 1:00pm work?',
          time: '10:37am',
          color: 'green',
        },
        {
          from: 'You',
          message: 'Did you still want to grab lunch today?',
          time: '9:47am',
          color: 'deep-purple lighten-1',
        },
      ],
    }), */
};
</script>
<style scoped>
.subject-banner {
  width: 100%;
  height: 100%;
  object-fit: contain;
}
</style>