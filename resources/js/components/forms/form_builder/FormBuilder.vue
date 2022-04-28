<template>
  <v-container>
    {{datajson}}
    <v-row class="mb-5">
      <v-col cols="12" md="8" sm="6">
        
      </v-col>
      <v-col cols="6" md="4" sm="2">
        <div class="float-right">
          <v-btn
        color="info">
        Save Form
        </v-btn>
        </div>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <div id="surveyCreator"></div>
      </v-col>
      
    </v-row>
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
