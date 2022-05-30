<template>

<v-row>
    {{subjectcontent.topic_content}}
    {{subjectcontent.subjectcontent_id}}
    <v-row class="mb-5">
      <v-col cols="12" md="8" sm="6"> </v-col>
      <v-col cols="6" md="4" sm="2">
        <div class="float-right">
          <v-btn color="info" @click="updateSubjectContent"> Save Form </v-btn>
        </div>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <div id="surveyCreator"></div>
      </v-col>
    </v-row>
    </v-row>

</template>

<script>
import { SurveyCreator } from "survey-creator-knockout";
import "survey-core/defaultV2.min.css";
import "survey-creator-core/survey-creator-core.min.css";

/* import * as SurveyKo from "survey-knockout";
import * as widgets from "surveyjs-widgets"; */

/* Object.filter = (obj, predicate) =>
  Object.keys(obj)
    .filter((key) => predicate(obj[key]))
    .reduce((res, key) => Object.assign(res, { [key]: obj[key] }), {});

const widgetsList = Object.filter(
  SurveyConfig.widgets,
  (widget) => widget === true
);

Object.keys(widgetsList).forEach(function (widget) {
  widgets[widget](SurveyKo);
}); */

const creatorOptions = {
  showLogicTab: true,
  isAutoSave: true,
  showJSONEditorTab: false,
};

export default {
  name: "survey-creator",
  data() {
    return {
        subjectcontent:{
            topic_content:null,
            subjectcontent_id:this.$route.params.subjectcontent_id,
        }

    };
  },
  computed: {
    getEditContent() {
      let data = this.$store.state.content_maker.editcontent;
      for (let i = 0; i < data.length; i++) {
        return data[i].topic_content;
      }
    },
    sample() {
        return "Sample"
    }
  },

  methods: {

    /* async addForm() {
      await axios
        .post("/api/addform", {
          formElement: this.formElements,
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(function () {
          console.log("success");
        });
    }, */
    updateSubjectContent() {
        this.subjectcontent.subjectcontent_id = this.$route.params.subjectcontent_id
        this.$store.dispatch("updateSubjectContent",this.subjectcontent)
    },

    saveForm() {
      /* let formObj = JSON.parse(this.datajson);
      this.formElements = formObj;
      if (formObj === null) {
        alert("Form is empty");
      } else if (formObj.pages === undefined) {
        alert("Form is empty");
      } else {
        this.addForm();
      } */
    },


   /*  async fetchFormData() {
      await axios
        .get("/api/geteditcontent/" + this.$route.params.id)
        .then((response) => {
          this.datajson = response.data[0].topic_content;
        })
        .catch((error) => {
          console.log(error.response.data);
        })
        .finally(function () {
          console.log("Selected form retrieved");
        });
    }, */
  },
  async mounted() {
      this.subjectcontent_id = parseInt(this.$route.params.subjectcontent_id)
    /* this.$store.dispatch("getSelectedForm", this.$route.params.id); */
        await axios.get('/api/geteditcontent/'+this.subjectcontent_id).then((response) => {
            const creator = new SurveyCreator(creatorOptions);
            const data = response.data
            creator.saveSurveyFunc = (saveNo, callback) => {
                this.subjectcontent.topic_content = creator.text
                this.updateSubjectContent()
                callback(saveNo, true);
            };

            creator.JSON = JSON.parse(data[0].topic_content);
            creator.render("surveyCreator");
        }).catch((error) => {
            console.log(error.response.data)
        }).finally(function() {
            console.log("Selected form retrieved")
        })
  },

    /* this.fetchFormData() */
      /* this.getEditForm()
      console.log(this.sample) */

};
</script>
<style scoped>
#surveyCreator {
  height: 100vh;
  width: 80vw;
}
</style>
