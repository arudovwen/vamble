<template>
  <div>
    <full-calendar
      :events="events"
      :config="config"
      @event-selected="eventSelected"
    ></full-calendar>
  </div>
</template>
<script>
import { FullCalendar } from "vue-full-calendar";

import "fullcalendar/dist/fullcalendar.css";

export default {
  props: {
    calendar: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      config: {
        eventClick: (event) => {
          this.selected = event;
        },
      },
      selected: {},
    };
  },

  components: {
    FullCalendar,
  },
  methods: {
    eventSelected(event) {
      this.selected = event;
    },
  },
  computed: {
    events() {
      return this.$props.calendar.map((item) => {
        var obj = {};
        obj.title = `${item.room.flat_name.toUpperCase()} / ${item.room.room_name.toUpperCase()}  - reserved for ${
          item.user ? item.user.name.toUpperCase() : "Unknown"
        }`;
        if (item.reservation) {
          obj.start = item.reservation.check_in;
        }
        if (item.reservation) {
          obj.end = item.reservation.check_out;
        }

        return obj;
      });
    },
  },
};
</script>