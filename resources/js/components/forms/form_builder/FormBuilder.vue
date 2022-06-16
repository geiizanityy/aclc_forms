<template>

    <v-row>
      <v-col cols="12">
        <div id="surveyCreator"></div>
      </v-col>
    </v-row>

</template>

<script>
import { SurveyCreator } from "survey-creator-knockout";
import "survey-core/defaultV2.min.css";
import "survey-creator-core/survey-creator-core.min.css";


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

    updateSubjectContent() {
        this.subjectcontent.subjectcontent_id = this.$route.params.subjectcontent_id
        this.$store.dispatch("updateSubjectContent",this.subjectcontent)
    },




  },
  async mounted() {
      this.subjectcontent_id = this.$route.query.subjectcontent_id
    /* this.$store.dispatch("getSelectedForm", this.$route.params.id); */
        await axios.get('/api/geteditcontent/'+this.subjectcontent_id).then((response) => {
            const creator = new SurveyCreator(creatorOptions);
            const data = response.data.data
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

};
</script>
<style scoped>
#surveyCreator {
  height: 100vh;
  width: 80vw;
}
</style>
