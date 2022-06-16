<template>
  <v-container>
    <!-- {{quiz2}} -->
    <v-divider></v-divider>
    <!--     {{formData}} -->
    <div id="surveyElement" style="display: inline-block; width: 100%">
      <survey :survey="survey" />
    </div>
    <div id="surveyResult"></div>
  </v-container>
</template>

<script>
import * as Survey from "survey-vue";

import "survey-vue/modern.css";

Survey.StylesManager.applyTheme("modern");

export default {
  name: "surveyjs-component",
  data() {
    return {
      survey: new Survey.Model(),
      formData: null,
      quiz2: {
        logoPosition: "right",
        completedHtml:
          "Your score is {correctedAnswers} out of {questionCount}",
        pages: [
          {
            name: "page1",
            elements: [
              {
                type: "panel",
                name: "panel1",
                elements: [
                  {
                    type: "html",
                    name: "question1",
                    html: "<h1>Mathematics Quiz</h1>",
                  },
                ],
              },
            ],
          },
          {
            name: "page2",
            elements: [
              {
                type: "panel",
                name: "panel2",
                elements: [
                  {
                    type: "radiogroup",
                    name: "question2",
                    title: "1+1",
                    correctAnswer: "item3",
                    choices: [
                      { value: "item1", text: "5" },
                      { value: "item2", text: "3" },
                      { value: "item3", text: "2" },
                    ],
                  },
                ],
              },
            ],
            title: "Test 1",
            description: "Addition Question ",
          },
        ],
        firstPageIsStarted: true,
        maxTimeToFinish: 120,
        showTimerPanel: "top",
      },
    };
  },
  methods: {
    async loadForm() {
      const survey = new Survey.Model();
      this.survey = survey;
      await axios
        .get("/api/viewsubjectcontent/" + this.$route.query.subjectcontent_id)
        .then((response) => {
          console.log(response.data);
          this.formData = response.data;
          const form = response.data.data[0].topic_content;
          const survey = new Survey.Model(form);
          this.survey = survey;
          survey.onComplete.add(function (sender) {
            document.querySelector("#surveyResult").textContent =
              "Result JSON:\n" + JSON.stringify(sender.data, null, 3);
            const score = survey.getCorrectAnswerCount(survey);
            if (score < 1) {
              console.log("Failed");
            } else {
              console.log("Passed");
            }
          });
          this.survey = survey;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(function () {});
    },
  },
  async mounted() {
    this.loadForm();
  },
};
</script>

<style scoped>
</style>
