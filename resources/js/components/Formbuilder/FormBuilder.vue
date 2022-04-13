<template>
    <div id="surveyCreator"></div>
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
