<template>
  <v-container>
    {{datajson}}
    <h1>Form Builder</h1>
    <div id="surveyCreator"></div>
  </v-container>
</template>

<script>
import { SurveyCreator } from "survey-creator-knockout";
import "survey-core/defaultV2.min.css";
import "survey-creator-core/survey-creator-core.min.css";

const creatorOptions = {
  showLogicTab: true,
  isAutoSave: false,
  showJSONEditorTab: false
};

export default {
  name: "survey-creator",
  data() {
    return {
      datajson:null
    }
  },
  mounted() {
    const creator = new SurveyCreator(creatorOptions);
    
    creator.saveSurveyFunc = (saveNo, callback) => {
      window.localStorage.setItem("survey-json", creator.text);
      this.datajson = creator.text
      callback(saveNo, true);
    
    };
    creator.render("surveyCreator");
  }
};
</script>
<style scoped>
#surveyCreator {
  height: 100vh;
  width: 80vw;
}
</style>
