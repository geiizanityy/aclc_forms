<template>
  <v-container>
    {{quiz2}}
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
    /* var quiz2 = {
      logoPosition: "right",
      completedHtml: "Your score is {correctedAnswers} out of {questionCount}",
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
    }; */
    /* var quiz = {
      logoPosition: "right",
      pages: [
        {
          name: "page1",
          elements: [
            {
              type: "html",
              name: "question1",
              html: "<h1>IT PRACTICUM QUIZ 1 </h1>",
            },
          ],
        },

        {
          name: "page2",
          elements: [{ type: "text", name: "r", title: "What is your name?" }],
        },
      ],
      showProgressBar: "top",
      firstPageIsStarted: true,
      maxTimeToFinish: 10,
      showTimerPanel: "top",
      showTimerPanelMode: "page",
    }; */

    /* var json = {
      title: "Title",
      description: "Desc",
      logoPosition: "right",
      pages: [
        {
          name: "page1",
          elements: [
            {
              type: "text",
              name: "question1",
              title: "What is your name?",
              description: "This is question",
              correctAnswer: "Giejie",
              autoComplete: "email",
              placeHolder: "Enter your answer",
            },
          ],
          questionsOrder: "random",
        },
      ],
      progressBarType: "questions",
      maxTimeToFinish: 10,
      showTimerPanel: "top",
    };
    var formElements = localStorage.getItem("selected_form");
    var qq = JSON.parse(formElements);
    var data = qq[0].form_elements;
    const survey = new Survey.Model(data);
    survey.onComplete.add(function (sender) {
      document.querySelector("#surveyResult").textContent =
        "Result JSON:\n" + JSON.stringify(sender.data, null, 3);
      console.log(survey.getCorrectAnswerCount(formElements));
    });
 */

    return {
      survey: new Survey.Model(),
      formData: {},
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
  /* created() {
    this.$store.dispatch("getSelectedForm", this.$route.params.id)
    const formElements = this.$store.state.forms
   console.log(this.data)
    var qq = JSON.stringify(formElements)
     const survey = new Survey.Model(this.quiz2);
            survey.onComplete.add(function (sender) {
              document.querySelector("#surveyResult").textContent =
                "Result JSON:\n" + JSON.stringify(sender.data, null, 3);
              console.log(survey.getCorrectAnswerCount(formElements));
            });
            this.survey = survey


  }, */
  /* computed: {
    computedForms() {
      this.data = this.$store.state.forms.selected_form;
      return this.data
      let data = Object.assign({}, JSON.stringify(this.$store.state.forms.forms[0]));
    },
  }, */
  methods: {
    setForm() {
      this.forms = this.computedForms;
    },
    async loadForm() {
      const survey = new Survey.Model();
      survey.onComplete.add(function (sender) {
        document.querySelector("#surveyResult").textContent =
          "Result JSON:\n" + JSON.stringify(sender.data, null, 3);
        console.log(survey.getCorrectAnswerCount(formElements));
      });
      this.survey = survey;
      await axios
        .get("/api/getselectedform/" + this.$route.params.id)
        .then((response) => {
          console.log(response.data);
          this.formData = response.data[0].form_elements;
          const form = response.data[0].form_elements;
          this.survey = new Survey.Model(form);
          this.survey.onComplete.add(function (sender) {
            document.querySelector("#surveyResult").textContent =
              "Result JSON:\n" + JSON.stringify(sender.data, null, 3);
            console.log(this.survey.getCorrectAnswerCount(form));
          });

          /* localStorage.setItem("selected_form",JSON.stringify(response.data)) */
        })
        .catch((error) => {
          console.log(error.response.data);
        })
        .finally(function () {});
    },
  },
  async created() {
    this.loadForm();
  },
};
</script>

<style scoped>
</style>
