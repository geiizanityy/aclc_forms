<template>
  <v-row>
    <v-col>
      <v-sheet>
        <v-calendar
          ref="calendar"
          :now="today"
          :value="today"
          :events="events"
          color="primary"
          type="week"
        ></v-calendar>
      </v-sheet>
    </v-col>
  </v-row>
</template>


<script>
  export default {
    data: () => ({
      today: '2022-07-07',
      events: [
        {
          name: 'QUIZ',
          start: '2022-07-07 09:00',
          end: '2022-07-08 10:00',
          timed: false,
          color:'blue'

        },
        {
          name: `English Exam`,
          start: '2022-07-03',
           end: '2022-07-05 15:30',
           timed: true,
           color:'red'

        },
        {
          name: 'Math Quiz',
          start: '2022-08-09 12:30',
          end: '2022-08-10 12:40',
          timed: true,
          color:'green'

        },
      ],
    }),
    mounted () {
      this.$refs.calendar.scrollToTime('08:00')
    },
  }
</script>
<style scoped>
.my-event {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  border-radius: 2px;
  background-color: #1867c0;
  color: #ffffff;
  border: 1px solid #1867c0;
  font-size: 12px;
  padding: 3px;
  cursor: pointer;
  margin-bottom: 1px;
  left: 4px;
  margin-right: 8px;
  position: relative;
}

.my-event.with-time {
  position: absolute;
  right: 4px;
  margin-right: 0px;
}
</style>
