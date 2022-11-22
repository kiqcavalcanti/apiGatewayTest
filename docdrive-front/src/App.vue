<template>
  <div id="app">
    <div class="flex flex-col">
      <div class="my-2 overflow-x-auto sm:-max-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b border-gray-200 m-4 sm:rounded-lg"
          >
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Nome
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Data
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Tamanho
                  </th>
                </tr>
              </thead>

              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="./assets/folder.png"
                          alt="Some"
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Sebastian Luna
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                    Admin
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                    Admin
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "app",
  props: ["keycloak"],
  created() {
    const request = axios.create({
      headers: {
        Accept: "application/json",
        Authorization: "Bearer " + this.keycloak.token,
      },
    });

    const req = request.post("http://localhost:8082/api/v1/folders", {
      foldersIds: ["5fda61f0484f607731849850"],
    });
    console.log(req);
  },
  data() {
    return {
      msg: "Welcome to Your Secured Vue.js App with Keycloak",
    };
  },
};
</script>

<style>
body {
  background: #d1d5db;
}
</style>
