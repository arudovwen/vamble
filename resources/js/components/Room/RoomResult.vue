<template>
  <div class="card">
    <div class="card-header">List</div>
    <div class="card-body p-0">
      <div class="d-flex justify-content-between align-items-center p-2">
        <div class="d-flex align-items-center"></div>
        <div class="form-group m-0">
          <input
            type="seacrh"
            class="form-control form-control-sm"
            name=""
            id=""
            aria-describedby="helpId"
            placeholder="Search name"
          />
        </div>
      </div>
      <table class="table table-bordered bg-white mb-0" v-if="rooms.length">
        <thead>
          <tr>
            <th>Short Name</th>
            <th>Name</th>
            <th>Description</th>
            <th>Floor</th>
            <th>Max Occupancy</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in rooms" :key="item.id">
            <td scope="row" class="text-capitalize">
              {{ item.room.short_name }}
            </td>
            <td scope="row" class="text-capitalize">{{ item.room.name }}</td>
            <td>{{ item.room.description }}</td>
            <td>{{ item.room.floor }}</td>
            <td>{{ item.room.occupancy }}</td>
            <td>{{ item.room.price | currencyFormat }}</td>

            <td scope="row">
              <button
                type="button"
                class="btn btn-info btn-sm mr-2"
                style="font-size: 0.65rem"
              >
                Book room
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div
      class="
        card-footer
        text-muted
        d-flex
        justify-content-between
        align-items-center
      "
    >
      <div v-if="rooms.length">Showing {{ rooms.length }} entries</div>
      <div></div>
    </div>
  </div>
</template>
<script>
import { bus } from "../../app.js";
export default {
  data() {
    return {
      rooms: [],
    };
  },
  created() {
    bus.$on("search-room", (data) => {
      this.rooms = data;
    });
  },
};
</script>