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
  isAutoSave: true,
  showJSONEditorTab: false
  
};

export default {
  name: "survey-creator",
  data() {
    return {
      datajson:null,
      text:'Form'
    }
  },
  mounted() {
    const creator = new SurveyCreator(creatorOptions);

/*     var defaultJSON = {
    pages: [
        {
            name: 'page1',
            elements: [
                {
                    type: 'text',
                    name: "q1"
                }
            ]
        }
    ]
  } */
    creator.saveSurveyFunc = (saveNo, callback) => {
      window.localStorage.setItem("survey-json", creator.text);
      this.datajson = creator.text
      callback(saveNo, true);
    
    };
    /* var defaultJSON = { pages: [{ name:'page1', elements: [{ type: 'text', name:"q1"}]}]};
    creator.text = JSON.stringify(defaultJSON); */
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
