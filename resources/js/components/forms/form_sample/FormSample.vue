<template>
  <survey :survey="survey" />
</template>

<script>
import * as Survey from "survey-vue";

import "survey-vue/modern.css";

Survey.StylesManager.applyTheme("modern");

export default {
  name: "surveyjs-component",
  data() {


      var quiz = { 
          "logoPosition": "right", 
          "pages": [ 
              { 
                  "name": "page1", 
                  "elements": [ 
                      { "type": "html", "name": "question1", "html": "<h1>IT PRACTICUM QUIZ 1 </h1>" 
                      } 
                      ] 
                }, 
                { 
                    "name": "page2", 
                    "elements": [ 
                        { 
                            "type": "text", 
                            "name": "question2", 
                            "title": "What is your name?" 
                        } 
                        ] 
                } 
                ], 
                "showProgressBar": "top", 
                "firstPageIsStarted": true, 
                "maxTimeToFinish": 10, 
                "showTimerPanel": "top", 
                "showTimerPanelMode": "page"
                 }
      var json = { 
        "title": "Title",
        "description": "Desc", 
        "logoPosition": "right", 
        "pages": [ 
            { "name": "page1",
                "elements": [ 
                        { 
                            "type": "text",
                            "name": "question1",
                            "title": "What is your name?", 
                            "description": "This is question", 
                            "correctAnswer": "Giejie",
                            "autoComplete": "email", 
                            "placeHolder": "Enter your answer" 
                        } 
                    ],
                "questionsOrder": "random" 
            } 
        ], 
        "progressBarType": "questions", 
        "maxTimeToFinish": 10, 
        "showTimerPanel": "top" 
        }
       
    const survey = new Survey.Model(JSON.stringify(quiz));

    return {
      survey: survey,
    };
  },
};
</script>

<style scoped>
</style>
