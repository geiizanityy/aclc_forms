<template>
  <v-card>
    <v-app-bar dark :color="cardbg" height="35">
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-toolbar-title class="text-h6 text-uppercase">My Classes</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>

    <v-container>
      <v-row dense>

  <v-card
    max-width="380"
    class="mb-15 ml-5"
    v-for="(item,i) in subjects" :key="i"
  >
    <v-img
      class="white--black text-uppercase"
      height="240px"
      :src="item.course_banner"
    >

      <v-card-title>{{item.course_name}}</v-card-title>
      <p class="ml-4">
              {{item.course_code}}
            </p>
       <v-card-title class="white--text mt-8">
            <v-avatar size="70">
              <img
                alt="user"
                src="http://localhost:8000/images/usericon.png"
              >
            </v-avatar>
          </v-card-title>
    </v-img>

    <v-card-subtitle class="pb-0">
      {{item.course_desc}}
    </v-card-subtitle>

    <v-card-text class="text--primary">
      <div>{{item.ins_name}}</div>
    </v-card-text>

    <v-card-actions>
      <v-btn
      :to="item.path"
        color="blue"
        text
      >
        Enter Class
      </v-btn>
    </v-card-actions>
  </v-card>

      </v-row>
    </v-container>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      cardheader: "#8e0202",
      cardbg: "#1F7087",
      subjects:[
        {
            course_name:"Introduction to Programming",
            course_code:"IT4-100-5502",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner.jpg",
            path:{name:'student-enrolled-subject'}
        },
        {
            course_name:"Introduction to Information System",
            course_code:"IT3-101-6643",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner2.jpg",
            path:{name:'student-enrolled-subject'}
        },
        {
            course_name:"Introduction to Software Engineering",
            course_code:"IT3-100-5523",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner2.jpg",
            path:{name:'student-enrolled-subject'}
        },
        {
            course_name:"Physical Education 4",
            course_code:"GE-101-2223",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner.jpg",
            path:{name:'student-enrolled-subject'}
        },
        {
            course_name:"Introduction to information system",
            course_code:"GE-200-6723",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner2.jpg",
            path:{name:'student-enrolled-subject'}
        },
        {
            course_name:"IT Major elective 3",
            course_code:"IT4-100-5523",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner.jpg",
            path:{name:'student-enrolled-subject'}
        },
        {
            course_name:"Free Elective 3",
            course_code:"IT4-600-6969",
            course_desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et xercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            ins_name:"John Doe Smith",
            course_banner:"http://localhost:8000/images/subjectbanner2.jpg",
            path:{name:'student-enrolled-subject'}
        }
      ]
    };
  },
};
</script>
