<template>
  <div class="q-pa-md">
    <q-markup-table>
      <thead>
        <tr>
          <th class="text-left">Nome</th>
          <th class="text-left">E-mail</th>
          <th class="text-left">Endereco</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(client, index) in clients"
          :key="index"
        >
          <td class="text-left">{{ client.name }}</td>
          <td class="text-left">{{ client.email }}</td>
          <td class="text-left">{{ client.address }}</td>
        </tr>
      </tbody>
    </q-markup-table>
  </div>
</template>

<script>
export default {
  name: 'Clients',
  async created() {
    const response = await this.$axios.get('/clients')
    this.clients = response.data
  },
  data() {
    return {
      clients: this.clients
    }
  }
}
</script>
