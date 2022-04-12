<template>
<v-app>
    <v-container>
      <v-container>
        <v-row>
           <v-col cols="12" md="2" sm="4">
            <h1>Side Panel</h1>
          </v-col>
          <v-col cols="12" md="10" sm="12">
            
            <h1>Forms</h1>
            <div id="surveyContainer">

              <div id="surveyCreator"></div>
            </div>
          </v-col>
         
         
        </v-row>
      </v-container>
    </v-container>
</v-app>
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
  mounted() {
    const creator = new SurveyCreator(creatorOptions);
    
    // ...
    creator.saveSurveyFunc = (saveNo, callback) => {
      // If you use localStorage:
      window.localStorage.setItem("survey-json", creator.text);
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
