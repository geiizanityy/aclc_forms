<template>
    <v-tabs
      v-model="tab"
      :background-color="tabbg"
      centered
      dark
      icons-and-text
    >
      <v-tabs-slider></v-tabs-slider>

      <v-tab v-for="item in tabproperty" :key="item.tabname" :href="item.href">
        {{item.tabname}}
        <v-icon v-text="item.tabicon"></v-icon>
      </v-tab>
      <v-tabs-items v-model="tab">
      <v-tab-item
        v-for="i in tabproperty.length"
        :key="i"
        :value="'tab-' + i"
      >
      <div v-if="i === 1">
        <v-card flat>
          <v-card-text>Stream Tab</v-card-text>
        </v-card>
      </div>
      <div v-else-if="i === 2">
        <v-card flat>
          <v-card-text>Classwork Tab</v-card-text>
        </v-card>
      </div>
      <div v-else>
        <v-card flat>
          <v-card-text>People Tab</v-card-text>
        </v-card>
      </div>

      </v-tab-item>
    </v-tabs-items>
    </v-tabs>
</template>

<script>
  export default {
    props:["tabproperty"],
    data () {
      return {
        tabitem:this.tabproperty.href,
        tabbg: "#1F7087",
        tab: null,
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      }
    },

  }
</script>
