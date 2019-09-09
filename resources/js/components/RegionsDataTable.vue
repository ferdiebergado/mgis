<template>
  <div>
    <div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Success!</strong>
      {{ success }}
    </div>
    <div v-if="error" class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Error!</strong>
      {{ error }}
    </div>

    <vue-bootstrap4-table
      :rows="rows"
      :columns="columns"
      :config="config"
      @refresh-data="refreshData()"
    >
      <template slot="active" slot-scope="props">
        <span v-show="props.cell_value == 1" class="text-success">
          <span class="mdi mdi-check-circle"></span>
        </span>
      </template>
      <template slot="area" slot-scope="props">
        <span v-if="props.cell_value == 'L'" class="badge badge-primary">LUZON</span>
        <span v-if="props.cell_value == 'V'" class="badge badge-info">VISAYAS</span>
        <span v-if="props.cell_value == 'M'" class="badge badge-dark">MINDANAO</span>
      </template>
      <template slot="task" slot-scope="props">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <a
            class="btn btn-primary"
            :href="url + '/' + props.row.id + '/edit'"
            role="button"
            title="Edit"
          >
            <span class="mdi mdi-file-document-edit-outline"></span>
          </a>
          <button
            type="button"
            class="btn btn-warning"
            @click="confirmDelete(props.row.id)"
            title="Delete"
          >
            <span class="mdi mdi-delete"></span>
          </button>
        </div>
      </template>
    </vue-bootstrap4-table>
    <div id="delModal" class="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              Are you sure you want to delete the record with
              <strong>id {{ activeRowId }}</strong>?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="deleteRecord()">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueBootstrap4Table from "vue-bootstrap4-table";
import axios from "axios";

export default {
  props: {
    // regions: String,
    url: String
  },
  data: function() {
    return {
      rows: [],
      columns: [
        {
          label: "id",
          name: "id",
          filter: {
            type: "simple",
            placeholder: "Enter id..."
          },
          sort: true,
          uniqueId: true
        },
        {
          label: "Name",
          name: "name",
          filter: {
            type: "simple",
            placeholder: "Enter region..."
          },
          sort: true
          //   sortCaseSensitive: false // "true" by default
        },
        {
          label: "No. of Divisions",
          name: "divisions_count",
          sort: true
        },
        {
          label: "No. of Districts",
          name: "districts_count",
          sort: true
        },
        {
          label: "No. of Schools",
          name: "schools_count",
          sort: true
        },
        {
          label: "No. of Teachers",
          name: "teachers_count",
          sort: true
        },
        {
          label: "Total Enrolment",
          name: "total_enrolment",
          sort: true
        },
        {
          label: "Active",
          name: "active",
          sort: true,
          filter: {
            type: "select",
            mode: "single",
            closeDropdownOnSelection: true,
            placeholder: "Select...",
            options: [
              {
                name: "Active",
                value: "true"
              },
              {
                name: "Inactive",
                value: "false"
              }
            ]
          }
        },
        {
          label: "Area",
          name: "area",
          sort: true,
          filter: {
            type: "select",
            mode: "single",
            closeDropdownOnSelection: true,
            placeholder: "Select...",
            options: [
              {
                name: "Luzon",
                value: "L"
              },
              {
                name: "Visayas",
                value: "V"
              },
              {
                name: "Mindanao",
                value: "M"
              }
            ]
          }
        },
        {
          label: "Task(s)",
          name: "task"
        }
      ],
      config: {
        card_mode: false,
        selected_rows_info: false,
        pagination: true,
        pagination_info: true,
        num_of_visibile_pagination_buttons: 7,
        per_page: 5,
        checkbox_rows: false,
        highlight_row_hover: true,
        rows_selectable: false,
        multi_column_sort: true,
        highlight_row_hover_color: "grey",
        card_title: "",
        global_search: {
          placeholder: "Search...",
          visibility: true,
          case_sensitive: false
        },
        per_page_options: [5, 10, 25, 50, 100],
        show_refresh_button: true,
        show_reset_button: true,
        server_mode: false,
        preservePageOnDataChange: true,
        loaderText: "Updating..."
      },
      activeRowId: "",
      success: "",
      error: ""
    };
  },
  created() {
    this.refreshData();
  },
  methods: {
    refreshData() {
      this.success = "";
      this.error = "";
      axios
        .get(this.url)
        .then(res => {
          this.rows = res.data;
        })
        .catch(e => {
          this.error = e.response.data.message;
        });
    },
    confirmDelete(id) {
      this.activeRowId = id;
      $("#delModal").modal();
    },
    deleteRecord() {
      $("#delModal").modal("toggle");
      axios
        .delete(this.url + "/" + this.activeRowId)
        .then(res => {
          this.success = "Record deleted.";
          this.refreshData();
        })
        .catch(e => {
          this.error = e.respose.data.message;
        });
    }
  },
  components: {
    VueBootstrap4Table
  }
};
</script>
