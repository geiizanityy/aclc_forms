<template>
  <v-container>
      {{selectedForm}}
    <v-row class="mb-5">
      <v-col cols="12" md="8" sm="6"> </v-col>
      <v-col cols="6" md="4" sm="2">
        <div class="float-right">
          <v-btn @click="saveForm()" color="info"> Save Form </v-btn>
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
      datajson: null,
      text: "Form",
      formElements: {},
    };
  },
  computed:{
      selectedForm() {
          let data = this.$store.state.forms.selected_form
          for(let i = 0; i<data.length;i++) {
              return data[i].form_elements
          }
      }
  },
  watch:{
      datajson:function() {
          return this.datajson
      }
  },
  methods: {
    async addForm() {
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
    },
    saveForm() {
      let formObj = JSON.parse(this.datajson);
      this.formElements = formObj;
      if (formObj === null) {
        alert("Form is empty");
      } else if (formObj.pages === undefined) {
        alert("Form is empty");
      } else {
        this.addForm();
      }
    },
  },
  created() {
      this.$store.dispatch("getSelectedForm",this.$route.params.id)
  },
  mounted() {

    const creator = new SurveyCreator(creatorOptions)

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
      /* window.localStorage.setItem("survey-json", creator.text); */
      this.datajson = creator.text;
      callback(saveNo, true);
    };

    var defaultJSON = { pages: [{ name:'page1', elements: [{ type: 'text', name:"q1"}]}]};
    var kolera = this.selectedForm
    console.log(kolera)
    creator.text = JSON.stringify(defaultJSON);
    creator.render("surveyCreator");
  },
};
</script>
<style scoped>
#surveyCreator {
  height: 100vh;
  width: 80vw;
}
</style>
